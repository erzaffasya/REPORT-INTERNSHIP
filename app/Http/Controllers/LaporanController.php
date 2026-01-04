<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index($divisi)
    {
        $laporan = Laporan::where('user_id', Auth::user()->id)
            ->where('divisi_id', $divisi)
            ->orderBy('week_start_date', 'DESC')
            ->orderBy('id', 'DESC')
            ->get();
        $divisi = Divisi::find($divisi);

        // Cek apakah sudah ada laporan untuk minggu ini
        $weekStart = Laporan::getMondayOfWeek();
        $hasCurrentWeekReport = Laporan::existsForWeek(Auth::id(), $divisi->id, $weekStart);

        return view('magang.laporan.index', compact('laporan', 'divisi', 'hasCurrentWeekReport', 'weekStart'));
    }

    /**
     * Buat laporan mingguan secara manual
     */
    public function createManual($divisi)
    {
        $divisiModel = Divisi::findOrFail($divisi);
        $weekStart = Laporan::getMondayOfWeek();

        // Cek apakah user terdaftar di divisi ini
        $isRegistered = $divisiModel->akses_divisi()
            ->wherePivot('user_id', Auth::id())
            ->exists();

        if (!$isRegistered) {
            return redirect()->back()
                ->with('error', 'Anda tidak terdaftar di divisi ini.');
        }

        // Cek apakah program masih aktif
        $program = $divisiModel->program;
        $today = Carbon::now();

        if ($today < Carbon::parse($program->periode_mulai) || $today > Carbon::parse($program->periode_berakhir)) {
            return redirect()->back()
                ->with('error', 'Program magang tidak aktif.');
        }

        // Buat laporan jika belum ada
        $laporan = Laporan::createIfNotExists(Auth::id(), $divisi, $weekStart);

        if ($laporan) {
            return redirect()->back()
                ->with('success', 'Laporan minggu ini berhasil dibuat!');
        } else {
            return redirect()->back()
                ->with('info', 'Laporan untuk minggu ini sudah ada.');
        }
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);

        // Pastikan user hanya bisa lihat laporan sendiri (kecuali admin)
        if ($laporan->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('magang.laporan.view', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $Laporan = Laporan::findOrFail($id);

        // Update laporan harian
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        foreach ($days as $day) {
            if ($request->has($day) && $request->$day != NULL) {
                $Laporan->$day = $request->$day;
            }
        }

        // Update laporan mingguan dan ubah status ke submitted
        if ($request->has('mingguan') && $request->mingguan != NULL) {
            $Laporan->mingguan = $request->mingguan;
            $Laporan->isVerif = Laporan::STATUS_SUBMITTED;
        }

        // Jika status masih NEW dan ada isian, ubah ke NEW (tetap 4)
        // Status akan berubah ke SUBMITTED hanya saat submit mingguan

        $Laporan->save();

        return redirect()->back()
            ->with('success', 'Laporan berhasil disimpan!');
    }

    public function veriflaporan(Request $request, $id)
    {
        $Laporan = Laporan::findOrFail($id);

        if ($request->isVerif == 'on') {
            // Approve
            $Laporan->isVerif = Laporan::STATUS_APPROVED;
            $Laporan->komentar = NULL;
        } elseif ($request->komentar != NULL) {
            // Revisi
            $Laporan->isVerif = Laporan::STATUS_REVISION;
            $Laporan->komentar = $request->komentar;
        }

        $Laporan->save();

        return redirect()->back()
            ->with('success', 'Verifikasi berhasil dikirim!');
    }
}
