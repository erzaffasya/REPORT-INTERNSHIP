<x-app-layout>
    @php
        \Carbon\Carbon::setLocale('id');

        function getPredikat($nilai)
        {
            if ($nilai >= 85 && $nilai <= 100) {
                return 'Sangat Baik';
            } elseif ($nilai >= 70 && $nilai <= 84) {
                return 'Baik';
            } elseif ($nilai >= 55 && $nilai <= 69) {
                return 'Cukup';
            } elseif ($nilai >= 40 && $nilai <= 54) {
                return 'Kurang';
            } elseif ($nilai >= 0 && $nilai <= 39) {
                return 'Sangat Kurang';
            } else {
                return 'Nilai tidak valid';
            }
        }
    @endphp

    <style>
        .header-card {
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .header-card h3 {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 0 0.25rem 0;
        }

        .header-card p {
            color: rgba(255,255,255,0.85);
            font-size: 1rem;
            margin: 0;
        }

        .download-btn {
            background: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            color: #2d3748;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .download-btn:hover {
            background: #edf2f7;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .download-btn svg {
            width: 20px;
            height: 20px;
        }

        .layout-invoice-page {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 1rem;
        }

        .book {
            background: #fff;
        }

        .pbf-laporanhutang.page {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 1.5rem;
            width: 297mm;
            min-height: 210mm;
        }

        .sertif-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }

        .main-content {
            position: relative;
            z-index: 1;
        }

        /* Tabel Nilai Styles */
        .nilai-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
            font-size: 11px;
        }

        .nilai-table th {
            background: #4a5568;
            color: #fff;
            padding: 10px 8px;
            font-weight: 600;
            text-align: center;
            border: 1px solid #4a5568;
        }

        .nilai-table th:first-child {
            text-align: left;
        }

        .nilai-table td {
            padding: 8px;
            border: 1px solid #e2e8f0;
            color: #2d3748;
        }

        .nilai-table tr:nth-child(even) {
            background-color: #f7fafc;
        }

        .nilai-table .total-row {
            background: #edf2f7 !important;
            font-weight: 600;
        }

        .nilai-table .rata-row {
            background: #2d3748 !important;
            color: #fff;
            font-weight: 700;
        }

        .nilai-table .rata-row td {
            border-color: #2d3748;
            color: #fff;
        }

        .info-label {
            color: #718096;
            font-size: 11px;
        }

        .info-value {
            color: #2d3748;
            font-weight: 600;
            font-size: 12px;
        }

        .penilaian-box {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 12px;
            font-size: 10px;
        }

        .penilaian-box h4 {
            margin: 0 0 8px 0;
            font-size: 11px;
            color: #2d3748;
            font-weight: 700;
        }

        .penilaian-box p {
            margin: 4px 0;
            color: #4a5568;
        }

        .signature-box {
            text-align: center;
            font-size: 11px;
            color: #2d3748;
        }

        .signature-box p {
            margin: 2px 0;
        }

        .signature-name {
            font-weight: 700;
            margin-top: 60px !important;
            border-top: 1px solid #2d3748;
            display: inline-block;
            padding-top: 4px;
        }

        @media print {
            .header-card {
                display: none !important;
            }
            .pbf-laporanhutang.page {
                box-shadow: none;
                margin: 0;
                page-break-after: always;
                page-break-inside: avoid;
            }
            .layout-invoice-page {
                padding: 0;
            }
        }
    </style>

    <div class="header-card">
        <div>
            <h3>Sertifikat Magang</h3>
            <p>{{ ucwords($nilai->user->name) }}</p>
        </div>
        <div>
            <a onclick="exportToPDF()" class="download-btn">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 16L12 8M12 16L9 13M12 16L15 13M3 15V16C3 18.2091 4.79086 20 7 20H17C19.2091 20 21 18.2091 21 16V15" stroke="#2d3748" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Unduh PDF
            </a>
        </div>
    </div>

    <div class="layout-invoice-page">
        <div class="book" id="content">
            <!-- Halaman 1: Sertifikat -->
            <div class="pbf-laporanhutang page position-relative">
                <div class="subpage">
                    <table class="report-container w-100" style="position: relative; padding:0;">
                        <tbody class="report-content" style="position: relative; padding:0;">
                            <img class="sertif-bg" src="{{ asset('tadmin/assets/img/image1.png') }}" alt="">
                            <tr>
                                <td class="report-content-cell">
                                    <div class="main-content" style="padding: 4rem 6rem;">
                                        <div class="header" style="text-align: center">
                                            <img height="70px" src="{{ asset('tadmin/assets/img/pt-ajk.png') }}" alt="Logo">
                                            <p style="margin: 0.5rem 0 0 0; font-size: 28px; font-weight: bold; color: #1a202c;">PT ATHAR JAYA KONSTRUKSI</p>
                                            <h3 style="margin-top: 0.75rem; margin-bottom: 0; border-bottom: 3px solid #1a202c; display: inline-block; font-size: 20px; padding-bottom: 4px;">
                                                SERTIFIKAT
                                            </h3>
                                        </div>
                                        <div class="content" style="margin-top: 2rem;">
                                            <table style="font-size: 14px; color: #2d3748;">
                                                <tr>
                                                    <td width="35%">Diberikan kepada</td>
                                                    <td width="3%">:</td>
                                                    <td style="font-weight: 600;">{{ ucwords($nilai->user->name) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Induk Siswa</td>
                                                    <td>:</td>
                                                    <td>{{ $nilai->user->nim }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td>{{ strtoupper($nilai->user->kelas) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Sekolah</td>
                                                    <td>:</td>
                                                    <td>{{ $nilai->user->sekolah }}</td>
                                                </tr>
                                            </table>
                                            <p style="font-size: 14px; line-height: 1.7; margin: 1.5rem 0; color: #2d3748; text-align: justify;">
                                                Telah melaksanakan <strong>Praktek Kerja Lapangan</strong> pada PT Athar Jaya Konstruksi
                                                terhitung mulai tanggal
                                                <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $programUser->periode_mulai)->translatedFormat('d F Y') }}</strong>
                                                sampai dengan
                                                <strong>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $programUser->periode_berakhir)->translatedFormat('d F Y') }}</strong>
                                                dengan hasil <strong>{{ getPredikat($nilai->rata_rata) }}</strong>.
                                            </p>
                                        </div>
                                        <div style="text-align: center; margin-top: 2rem;">
                                            <p style="margin: 0; font-size: 13px; color: #2d3748;">Balikpapan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                            <p style="margin: 0.5rem 0 0 0; font-size: 13px; color: #2d3748;">Direktur,</p>
                                            <p style="margin: 70px 0 0 0; font-weight: 700; font-size: 14px; border-top: 1px solid #1a202c; display: inline-block; padding-top: 4px;">Lisa Wati</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Halaman 2: Daftar Nilai -->
            <div id="template5" class="pbf-laporanhutang page position-relative">
                <div class="subpage">
                    <table class="report-container w-100" style="position: relative; padding:0;">
                        <tbody class="report-content" style="position: relative; padding:0;">
                            <tr>
                                <td class="report-content-cell">
                                    <div class="main-content" style="padding: 3rem 5rem;">
                                        <div style="text-align: center; margin-bottom: 1.5rem;">
                                            <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #1a202c; letter-spacing: 1px;">DAFTAR NILAI</h3>
                                            <div style="width: 60px; height: 3px; background: #2d3748; margin: 8px auto 0;"></div>
                                        </div>

                                        <table style="margin-bottom: 1.5rem; font-size: 12px;">
                                            <tr>
                                                <td class="info-label" width="80">Nama</td>
                                                <td width="15">:</td>
                                                <td class="info-value">{{ ucwords($nilai->user->name) }}</td>
                                            </tr>
                                            <tr>
                                                <td class="info-label">Divisi</td>
                                                <td>:</td>
                                                <td class="info-value">{{ $divisiUser->nama_divisi }}</td>
                                            </tr>
                                        </table>

                                        <div style="display: flex; gap: 2rem;">
                                            <div style="flex: 1;">
                                                <!-- Tabel Aspek Teknis -->
                                                <table class="nilai-table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 60%; text-align: left;">Aspek Penilaian Teknis</th>
                                                            <th style="width: 20%;">Nilai</th>
                                                            <th style="width: 20%;">Predikat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($nilai->nilai_1 != null)
                                                        <tr>
                                                            <td>{{ $nilai->judul_1 }}</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_1 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_1) }}</td>
                                                        </tr>
                                                        @endif
                                                        @if ($nilai->nilai_2 != null)
                                                        <tr>
                                                            <td>{{ $nilai->judul_2 }}</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_2 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_2) }}</td>
                                                        </tr>
                                                        @endif
                                                        @if ($nilai->nilai_3 != null)
                                                        <tr>
                                                            <td>{{ $nilai->judul_3 }}</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_3 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_3) }}</td>
                                                        </tr>
                                                        @endif
                                                        @if ($nilai->nilai_4 != null)
                                                        <tr>
                                                            <td>{{ $nilai->judul_4 }}</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_4 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_4) }}</td>
                                                        </tr>
                                                        @endif
                                                        @if ($nilai->nilai_5 != null)
                                                        <tr>
                                                            <td>{{ $nilai->judul_5 }}</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_5 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_5) }}</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>

                                                <!-- Tabel Aspek Non Teknis -->
                                                <table class="nilai-table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 60%; text-align: left;">Aspek Penilaian Non Teknis</th>
                                                            <th style="width: 20%;">Nilai</th>
                                                            <th style="width: 20%;">Predikat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Disiplin</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_6 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_6) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggung Jawab</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_7 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_7) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inisiatif</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_8 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_8) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kebersihan dan Kerapihan</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_9 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_9) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keselamatan dan Kesehatan Kerja (K3)</td>
                                                            <td style="text-align: center;">{{ $nilai->nilai_10 }}</td>
                                                            <td style="text-align: center;">{{ getPredikat($nilai->nilai_10) }}</td>
                                                        </tr>
                                                        <tr class="total-row">
                                                            <td><strong>Total Nilai</strong></td>
                                                            <td style="text-align: center;"><strong>{{ $nilai->total }}</strong></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr class="rata-row">
                                                            <td><strong>Rata-rata</strong></td>
                                                            <td style="text-align: center;"><strong>{{ $nilai->rata_rata }}</strong></td>
                                                            <td style="text-align: center;"><strong>{{ getPredikat($nilai->rata_rata) }}</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div style="width: 180px;">
                                                <div class="penilaian-box">
                                                    <h4>Keterangan Penilaian</h4>
                                                    <p>85 - 100 : Sangat Baik</p>
                                                    <p>70 - 84 : Baik</p>
                                                    <p>55 - 69 : Cukup</p>
                                                    <p>40 - 54 : Kurang</p>
                                                    <p>0 - 39 : Sangat Kurang</p>
                                                </div>

                                                <div class="signature-box" style="margin-top: 1.5rem;">
                                                    <p>Balikpapan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                                                    <p>Direktur,</p>
                                                    <p class="signature-name">Lisa Wati</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function exportToPDF() {
            var element = document.getElementById('content');
            var opt = {
                margin: 0,
                filename: 'sertifikat-{{ str_replace(" ", "-", strtolower($nilai->user->name)) }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape'
                },
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
</x-app-layout>
