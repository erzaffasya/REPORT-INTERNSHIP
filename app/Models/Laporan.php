<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $fillable = [
        'senin',
        'selasa',
        'rabu',
        'kamis',
        'jumat',
        'mingguan',
        'isVerif',
        'komentar',
        'user_id',
        'divisi_id',
        'week_start_date',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'divisi_id' => 'integer',
        'week_start_date' => 'date',
    ];

    protected $primaryKey = 'id';

    /**
     * Status Constants
     */
    const STATUS_NEW = 4;        // Baru dibuat, belum diisi
    const STATUS_REVISION = 0;   // Perlu revisi
    const STATUS_APPROVED = 1;   // Disetujui
    const STATUS_SUBMITTED = 2;  // Sudah submit, menunggu verifikasi

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return match ($this->isVerif) {
            self::STATUS_APPROVED => 'Disetujui',
            self::STATUS_SUBMITTED => 'Menunggu Verifikasi',
            self::STATUS_REVISION => 'Perlu Revisi',
            self::STATUS_NEW => 'Belum Diisi',
            default => 'Unknown',
        };
    }

    /**
     * Get status color class
     */
    public function getStatusClassAttribute()
    {
        return match ($this->isVerif) {
            self::STATUS_APPROVED => 'approved',
            self::STATUS_SUBMITTED => 'pending',
            self::STATUS_REVISION => 'draft',
            self::STATUS_NEW => 'empty',
            default => 'empty',
        };
    }

    /**
     * Hitung jumlah hari yang sudah terisi
     */
    public function getFilledDaysCountAttribute()
    {
        $days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
        return collect($days)->filter(fn($day) => $this->$day != null)->count();
    }

    /**
     * Cek apakah semua hari sudah terisi
     */
    public function getIsCompleteAttribute()
    {
        return $this->filled_days_count === 5;
    }

    /**
     * Get week end date (Minggu)
     */
    public function getWeekEndDateAttribute()
    {
        return $this->week_start_date
            ? Carbon::parse($this->week_start_date)->addDays(6)
            : $this->created_at->addDays(6);
    }

    /**
     * Get Senin minggu ini
     */
    public static function getMondayOfWeek(Carbon $date = null)
    {
        $date = $date ?? Carbon::now();
        return $date->copy()->startOfWeek(Carbon::MONDAY);
    }

    /**
     * Cek apakah laporan sudah ada untuk user, divisi, dan minggu tertentu
     */
    public static function existsForWeek($userId, $divisiId, Carbon $weekStart)
    {
        return self::where('user_id', $userId)
            ->where('divisi_id', $divisiId)
            ->where('week_start_date', $weekStart->toDateString())
            ->exists();
    }

    /**
     * Buat laporan baru jika belum ada untuk minggu tersebut
     */
    public static function createIfNotExists($userId, $divisiId, Carbon $weekStart = null)
    {
        $weekStart = $weekStart ?? self::getMondayOfWeek();

        if (self::existsForWeek($userId, $divisiId, $weekStart)) {
            return null; // Sudah ada, skip
        }

        return self::create([
            'user_id' => $userId,
            'divisi_id' => $divisiId,
            'week_start_date' => $weekStart->toDateString(),
            'isVerif' => self::STATUS_NEW,
        ]);
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
