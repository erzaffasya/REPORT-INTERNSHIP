<x-app-layout>
    <div class="layout-invoice-page">
        <div class="book">
            <div id="template4" class="pbf-laporanhutang page position-relative">
                <div class="subpage">
                    <div class="">
                        <table class="report-container w-100" style="position: relative; padding:0;">
                            <tbody class="report-content" style="position: relative; padding:0;">
                                <img class="sertif-bg" src="{{ asset('tadmin/assets/img/image1.png') }}" alt="">
                                <tr>
                                    <td class="report-content-cell">
                                        <div class="main-content" style="padding: 4.5rem 7rem;">
                                            <div class="header" style="text-align: center">
                                                <img height="80px" src="{{ asset('tadmin/assets/img/image2.png') }}"
                                                    class="text-center" alt="Logo" class="header-logo">
                                                <p style="margin: 0; font-weight: bold">PEMERINTAH DINAS KOTA BALIKPAPAN
                                                </p>
                                                <p style="margin: 0; font-weight: bold">DINAS PENANAMAN MODAL DAN
                                                    PELAYANAN TERPADU SATU PINTU</p>
                                                <h3
                                                    style="margin-top: 0.5rem; margin-bottom:0; border-bottom: 3px solid black; display: inline-block">
                                                    SERTIFIKAT</h3>
                                                {{-- <p style="margin: 0; font-weight: bold">Nomor : 421.5/DPMPTSP</p> --}}
                                            </div>
                                            <div class="content mt-4">
                                                <table>
                                                    <tr>
                                                        <td width="40%">Diberikan kepada</td>
                                                        <td width="5%">:</td>
                                                        <td width="">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40%">Nomor Induk Siswa</td>
                                                        <td width="5%">:</td>
                                                        <td width="">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40%">Kelas</td>
                                                        <td width="5%">:</td>
                                                        <td width="">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="40%">Sekolah</td>
                                                        <td width="5%">:</td>
                                                        <td width="">-</td>
                                                    </tr>
                                                </table>
                                                <p
                                                    style="font-weight: bold; line-height: 1.3; margin: 0.5rem 0!important;">
                                                    Telah melaksanakan Praktek Kerja Lapangan pada Dinas Penanaman Modal
                                                    dan Pelayanan Terpadu Satu Pintu Kota Balikpapan terhitung mulai
                                                    tanggal
                                                    {{-- {{ \Carbon\Carbon::parse($nilai->divisi->program->periode_mulai)->format('d M Y') }}
                                                    sampai dengan
                                                    {{ \Carbon\Carbon::parse($nilai->divisi->program->periode_berakhir)->format('d M Y') }}
                                                    dengan nilai {{ $nilai->rata_rata }}</p> --}}
                                            </div>
                                            <br>
                                            <div class="footer" style="text-align: center">
                                                <p>Balikpapan,
                                                    {{-- {{ \Carbon\Carbon::parse($nilai->modified_at)->format('d M Y') }} --}}
                                                </p>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                {{-- <img src="" width="200px" height="120px" alt="" style="object-fit: contain"> --}}
                                                <p>Kepala Dinas,</p>
                                                <p class="footer-signature">HASBULLAH HELMI</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div id="template4" class="pbf-laporanhutang page position-relative">
                <div class="subpage">
                    <div class="">
                        <table class="report-container w-100">
                            <tbody class="report-content">
                                <tr>
                                    <td class="report-content-cell">
                                        <div class="main-content">
                                            <div class="page-details border-0 position-relative mb-2">
                                                <div class="row justify-content-between">
                                                    <div class="col-12 mb-0 px-2">
                                                        <p class="fw-bold fs-5 mb-0 text-center text-decoration-underline">NILAI PRAKTEK KERJA LAPANGAN</p>
                                                        {{-- <p class="fw-bold text-center mb-0`">Erza Fahmi Fasya - </p> --}}
                                                        <p class="fw-bold text-center">Erza Fahmi Fasya, 30 Desember 2023</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-details table-nilaipraktek border-0 px-2 pt-1">
                                                <div class="row justify-content-center">
                                                    <div class="col-10">
                                                        <table class="table table-sm mb-1 table-bordered border-2 border-dark text-dark w-100 ">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="vertical-align: middle" rowspan="2" width="1%">No</th>
                                                                    <th style="vertical-align: middle" rowspan="2">Uraian Pekerjaan</th>
                                                                    <th colspan="2">Hasil Penilaian</th>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>Nilai</th>
                                                                    <th>Predikat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="4" class="fw-bold">I. Pekerjaan Teknis</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Mengoperasikan paket program pengolah angka (spreadsheet/ excel)</td>
                                                                    <td>85</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Mengoperasikan aplikasi pengolah kata (mc. word)</td>
                                                                    <td>77</td>
                                                                    <td>Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Mengoperasikan aplikasi perangkat lunak</td>
                                                                    <td>90</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Melakukan pengarsipan surat/ berkas/ dokumen</td>
                                                                    <td>90</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
        
                                                                <tr>
                                                                    <td colspan="4" class="fw-bold">II. Pekerjaan Non Teknis</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Disiplin</td>
                                                                    <td>85</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Kerja Sama</td>
                                                                    <td>77</td>
                                                                    <td>Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Inisiatif</td>
                                                                    <td>90</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Kerajinan</td>
                                                                    <td>90</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Tanggung Jawab</td>
                                                                    <td>90</td>
                                                                    <td>Sangat Baik</td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="text-end fw-bold" style="padding-right: 1rem!important">Total Nilai</td>
                                                                    <td class="fw-bold">1092</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="text-end fw-bold" style="padding-right: 1rem!important">Rata-rata</td>
                                                                    <td class="fw-bold">92</td>
                                                                    <td class="fw-bold">Sangat Baik</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="d-flex flex-column justify-content-between h-100">
                                                            <div>
                                                                <p class="fw-bold mb-0">Penilaian</p>
                                                                <p class="mb-0">85 - 100 (Sangat Baik)</p>
                                                                <p class="mb-0">70 - 84 (Sangat Baik)</p>
                                                                <p class="mb-0">55 - 69 (Cukup)</p>
                                                                <p class="mb-0">40 - 54 (Kurang)</p>
                                                                <p class="mb-0">0 - 39 (Sangat Kurang)</p>
                                                            </div>
                                                            <div class="text-center ">
                                                                <p class="font-smaller">Balikpapan, 10 Oktober 2023</p>
                                                                <p class="font-smaller">Pembimbing,</p>
                                                                <figure class="mb-0 ">
                                                                    {{-- <img src="stempel-planetit-hairian.png" width="70%"
                                                                    height="120px" class="ttd-img" style="object-fit: contain"/> --}}
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <figcaption class="text-center ">
                                                                        <p class="fw-bold font-smaller"><u>Yuyun Ningsih</u></p>
                                                                        <p class="font-smaller">Penata Perizinan Ahli Madya</p>
                                                                    </figcaption>
                                                                </figure>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                            {{-- <div class="footer-details border-0 ttd-div my-5 position-relative">
                                                <div class="row justify-content-center align-items-center text-center">
                                                    
                                                </div>
                                            </div> --}}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
