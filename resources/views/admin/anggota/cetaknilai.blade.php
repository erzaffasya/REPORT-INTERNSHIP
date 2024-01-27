<x-app-layout>
    <div class="layout-invoice-page">
        <div class="book">
            <div id="template4" class="pbf-laporanhutang page position-relative">
                <div class="subpage" >
                    <div class="">
                        <table class="report-container w-100" style="position: relative; padding:0;">
                            <tbody class="report-content" style="position: relative; padding:0;">
                                <img class="sertif-bg" src="{{asset('tadmin/assets/img/image1.png')}}" alt="">
                                <tr>
                                    <td class="report-content-cell">
                                        <div class="main-content" style="padding: 4.5rem 7rem;">
                                            <div class="header" style="text-align: center">
                                                <img height="80px" src="{{asset('tadmin/assets/img/image2.png')}}" class="text-center" alt="Logo" class="header-logo">
                                                <p style="margin: 0; font-weight: bold">PEMERINTAH DINAS KOTA BALIKPAPAN</p>
                                                <p style="margin: 0; font-weight: bold">DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</p>
                                                <h3 style="margin-top: 0.5rem; margin-bottom:0; border-bottom: 3px solid black; display: inline-block">SERTIFIKAT</h3>
                                                {{-- <p style="margin: 0; font-weight: bold">Nomor : 421.5/DPMPTSP</p> --}}
                                              </div>
                                              <div class="content mt-4">
                                                <table>
                                                  <tr>
                                                    <td width="40%">Diberikan kepada</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Nomor Induk Siswa</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->nim}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Kelas</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->kelas}}</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%">Sekolah</td>
                                                    <td width="5%">:</td>
                                                    <td width="">{{$nilai->user->sekolah}}</td>
                                                  </tr>
                                                </table>
                                                <p style="font-weight: bold; line-height: 1.3; margin: 0.5rem 0!important;">Telah melaksanakan Praktek Kerja Lapangan pada Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Balikpapan terhitung mulai tanggal {{\Carbon\Carbon::parse($nilai->divisi->program->periode_mulai)->format('d M Y')}} sampai dengan {{\Carbon\Carbon::parse($nilai->divisi->program->periode_berakhir)->format('d M Y')}} dengan nilai {{$nilai->rata_rata}}</p>
                                              </div>
                                              <br>
                                              <div class="footer" style="text-align: center">
                                                <p>Balikpapan, {{\Carbon\Carbon::parse($nilai->modified_at)->format('d M Y')}}</p>
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
        </div>
    </div>
</x-app-layout>
