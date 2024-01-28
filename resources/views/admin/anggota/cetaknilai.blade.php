<x-app-layout>
    @php
    \Carbon\Carbon::setLocale('id');
    
    function getPredikat($nilai) {
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


    <div class="card" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding: 0 2rem;">
        <div>
            <h3>Sertifikat Magang</h3>
            <p>{{ ucwords($nilai->user->name)}}</p>
        </div>
        <div class="mr-0">
            <a onclick="exportToPDF()"  class="btn bg-gradient-primary" style="display: flex; flex-direction: column; align-items: center;">
            <svg width="80px" height="80px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M17 17H17.01M17.4 14H18C18.9319 14 19.3978 14 19.7654 14.1522C20.2554 14.3552 20.6448 14.7446 20.8478 15.2346C21 15.6022 21 16.0681 21 17C21 17.9319 21 18.3978 20.8478 18.7654C20.6448 19.2554 20.2554 19.6448 19.7654 19.8478C19.3978 20 18.9319 20 18 20H6C5.06812 20 4.60218 20 4.23463 19.8478C3.74458 19.6448 3.35523 19.2554 3.15224 18.7654C3 18.3978 3 17.9319 3 17C3 16.0681 3 15.6022 3.15224 15.2346C3.35523 14.7446 3.74458 14.3552 4.23463 14.1522C4.60218 14 5.06812 14 6 14H6.6M12 15V4M12 15L9 12M12 15L15 12" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <span>
                Unduh Sertifikat
            </span>
            </a>
    
        </div>
    </div>



    <div class="layout-invoice-page" style="width: 100%; display: flex; justify-content: center; ">
        <div class="book"  id="content">
            <div class="pbf-laporanhutang page position-relative">
                <div class="subpage" >
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
                                                    <td width="">{{ ucwords($nilai->user->name)}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Nomor Induk Siswa</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->nim}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Kelas</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{strtoupper($nilai->user->kelas)}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Sekolah</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->sekolah}}</td>
                                                  </tr>
                                                </table>
                                                <p style="font-weight: bold; line-height: 1.3; margin: 0.5rem 0!important;">Telah melaksanakan Praktek Kerja Lapangan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Balikpapan terhitung mulai tanggal {{ \Carbon\Carbon::createFromFormat('Y-m-d', $programUser->periode_mulai)->translatedFormat('d F Y') }} sampai dengan {{ \Carbon\Carbon::createFromFormat('Y-m-d', $programUser->periode_berakhir)->translatedFormat('d F Y') }} dengan hasil {{getPredikat($nilai->rata_rata)}}</p>
                                              </div>
                                              <br>
                                              <div class="footer" style="text-align: center">
                                                <p>Balikpapan, {{\Carbon\Carbon::now()->format('d M Y')}}</p>
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

     
            <div id="template5" class="pbf-laporanhutang page position-relative" >
                <div class="subpage" >
                    <div class="">
                        <table class="report-container w-100" style="position: relative; padding:0;">
                            <tbody class="report-content" style="position: relative; padding:0;">
                                <img class="sertif-bg" src="{{asset('tadmin/assets/img/image1.png')}}" alt="">
                                <tr>
                                    <td class="report-content-cell">
                                        <div class="main-content" style="padding: 4.5rem 7rem;">
                                        
                                            
                                              <div class="header" style="text-align: center; margin-top: 25px;">
                                                    <h3>Daftar Nilai</h3>
                                              </div>

                                              <div class="content">
                                                <table>
                                                  <tr>
                                                    <td width="40%">Nama</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{ ucwords($nilai->user->name)}}</td>
                                                </tr>
                                              
                                                <tr>
                                                    <td width="40%">Divisi</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$divisiUser->nama_divisi}}</td>
                                                </tr>
                                                
                                                </table>

                                                
                                                <div style="margin-top: 1rem; display: flex; justify-content: space-between; flex-direction: column;">
                                                    <table style="width: 70%; border: 1px solid gray;">
                                                        <tr style="border: 1px solid #dddddd; background-color: #9eacdb;">
                                                          <th style="width: 70%;">Aspek Penilaian Teknis</th>
                                                          <th style=" text-align: center;">Nilai <br> Kuantitatif</th>   
                                                          <th style=" text-align: center;">Predikat</th> 
                                                        </tr>
    
                                                        <tr style="border: 1px solid #dddddd;">
                                                          <td>{{$nilai->judul_1}}</td>
                                                          <td style="text-align: center;">{{$nilai->nilai_1}}</td>
                                                          <td style="text-align: center;">{{getPredikat($nilai->nilai_1)}}</td>
                                                        </tr>
                                                        
                                                        <tr style="border: 1px solid #dddddd;">
                                                            <td>{{$nilai->judul_2}}</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_2}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_2)}}</td>
                                                          </tr>
                                                        
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>{{$nilai->judul_3}}</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_3}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_3)}}</td>
                                                          </tr>
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>{{$nilai->judul_4}}</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_4}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_4)}}</td>
                                                          </tr>
    
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>{{$nilai->judul_5}}</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_5}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_5)}}</td>
                                                          </tr> 
    
                                                        
                                                    </table>

                                                    <table style="width: 70%; border: 1px solid gray;">
                                                        <tr style="border: 1px solid #dddddd; background-color: #9eacdb;">
                                                          <th style="width: 70%;">Aspek Penilaian Non Teknis</th>
                                                          <th style=" text-align: center;">Nilai <br> Kuantitatif</th>  
                                                          <th style=" text-align: center;">Predikat</th>      
                                                        </tr>
    
                                                        <tr style="border: 1px solid #dddddd;">
                                                          <td>Disiplin</td>
                                                          <td style="text-align: center;">{{$nilai->nilai_6}}</td>
                                                          <td style="text-align: center;">{{getPredikat($nilai->nilai_6)}}</td>   
                                                        </tr>
                                                        
                                                        <tr style="border: 1px solid #dddddd;">
                                                            <td>Tanggung Jawab</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_7}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_7)}}</td>
                                                          </tr>
                                                        
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>Inisiatif</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_8}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_8)}}</td>
                                                          </tr>
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>Kebersihan dan Kerapihan</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_9}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_9)}}</td>
                                                          </tr>
    
                                                          <tr style="border: 1px solid #dddddd;">
                                                            <td>Keselamatan dan kesehatan kerja (K3)</td>
                                                            <td style="text-align: center;">{{$nilai->nilai_10}}</td>
                                                            <td style="text-align: center;">{{getPredikat($nilai->nilai_10)}}</td>
                                                          </tr> 
    
                                                          <tr style="border: 1px solid #dddddd; background-color: #9eacdb;">
                                                            <th style="">Total Nilai</th>
                                                            <th style=" text-align: center;">{{$nilai->total}}</th>  
                                                            <th style=" text-align: center;"></th>      
                                                          </tr>

                                                          <tr style="border: 1px solid #dddddd; background-color: #9eacdb;">
                                                            <th style="">Rata-rata</th>
                                                            <th style=" text-align: center;">{{$nilai->rata_rata}}</th>  
                                                            <th style="text-align: center;">{{getPredikat($nilai->rata_rata)}}</th>    
                                                          </tr>

                                                       


                                                    </table>

                                                </div>


                                                
                                              </div>
                                              <br>



                                              <div class="footer" style="position: absolute; top: 30%; right: 12%;">
                                                <div>
                                                  <h4>Penilaian</h4>
                                                  <p>85 - 100 (Sangat Baik)</p>
                                                  <p>70 - 84 (Baik)</p>
                                                  <p>55 - 69 (Cukup)</p>
                                                  <p>40 - 54 (Kurang)</p>
                                                  <p>0 - 39 (Sangat Kurang)</p>
                                                </div>

                                                <div style="text-align: center; margin-top: 5rem;">
                                                    <p>Balikpapan, {{\Carbon\Carbon::now()->format('d M Y')}}</p>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    {{-- <img src="" width="200px" height="120px" alt="" style="object-fit: contain"> --}}
                                                    <p>Kepala Dinas,</p>
                                                    <p class="footer-signature">HASBULLAH HELMI</p>
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
    </div>


  
    <script>
        function exportToPDF() {
            var element = document.getElementById('content');
            element.style.width = '1125px';
            element.style.height = '1700px';
            var opt = {
           
            html2canvas:  { scale: 3},
            filename:     'sertifikat.pdf',
            image:        { type: 'jpeg', quality: 2 },
            jsPDF:        { format: 'a4', orientation: 'landscape'}  
            
            };


            html2pdf(element, opt);

         
        }
    </script>
</x-app-layout>
