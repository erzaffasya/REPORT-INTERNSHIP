<x-app-layout>
  <main class="main-content max-height-vh-100 h-100">
    <div class="container-fluid my-3 py-3">
      <div class="row mb-5">
        <!-- Sidebar -->
        <div class="col-lg-3">
          <div class="card position-sticky top-1">
            <ul class="nav flex-column bg-white border border-light shadow-sm border-radius-lg p-3">
              <li class="nav-item pt-2">
                <a class="nav-link text-body bg-danger" href="{{ route('indexLaporan', $laporan->divisi_id) }}">
                  <div class="icon me-2">
                    <i class="ni ni-bold-left text-white"></i>
                  </div>
                  <span class="text-sm text-white">Kembali</span>
                </a>
              </li>
              <li class="nav-item mx-3 mt-3 mb-5 text-center">
                <h1 class="text-uppercase mb-0" style="font-size: 0.95rem">Laporan Monitoring Kerja</h1>
                <h5 class="mb-0" style="font-size: 0.95rem">{{ $laporan->created_at->isoFormat('D MMM') }} - {{ $laporan->created_at->addDays(6)->isoFormat('D MMM Y') }}</h5>
              </hr>
              </li>
              @if (($laporan->isVerif == 0 || $laporan->isVerif == 2) and $laporan->komentar != null)
              <li class="nav-item mx-3 mt-3 text-start">
                <span class="text-dark fw-bold d-block text-sm">Revisi</span>
                <p align="justify">{{ $laporan->komentar }}</p>
              </li>
              @endif
              <li class="nav-item my-3 text-center">
                @if (($laporan->jumat != null && $laporan->mingguan == null) || $laporan->isVerif == 0)
                  <button class="btn bg-gradient-info mb-0" data-bs-toggle="modal" data-bs-target="#mingguanModal-{{ $laporan->id }}">Buat Laporan Mingguan</button>
                @else
                  <button class="btn bg-gradient-info mb-0" disabled>Buat Laporan Mingguan</button>
                @endif
              </li>
            </ul>
          </div>
        </div>

        <!-- Konten Utama -->
        <div class="col-lg-9">
          <div class="card p-3 h-100 border-0 shadow-sm bg-grey">
            <!-- Laporan Mingguan -->
            @if ($laporan->mingguan != null)
            <div class="card mt-4 shadow-sm border-0" style="border-radius: 16px; background-color: #f8f9fc;">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Laporan Mingguan</h5>
                <span class="badge bg-gradient-dark">Mingguan</span>
              </div>
              <div class="card-body pt-3">
                <p align="justify">{!! $laporan->mingguan !!}</p>
              </div>
            </div>
            @endif

            <!-- Laporan Harian -->
            @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $index => $day)
            @php
              $bgColor = '#f8f9fa';
              if ($laporan->$day != null) {
                if ($laporan->isVerif == 1) $bgColor = '#eafaf1';
                elseif ($laporan->isVerif == 2) $bgColor = '#fff6e5';
                elseif ($laporan->isVerif == 0) $bgColor = '#ffe5e5';
              }
            @endphp
            <div class="card mt-4 shadow-sm border-0" style="border-radius: 16px; background-color: {{ $bgColor }};">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $laporan->created_at->addDays($index)->format('l, d M Y') }}</h5>
                <span class="badge bg-gradient-primary">Harian</span>
              </div>
              <div class="card-body pt-3">
                <p align="justify">{!! $laporan->$day !!}</p>
                @php
                  $prev = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'][$index - 1] ?? null;
                @endphp
                @if (($prev == null || $laporan->$prev != null) && ($laporan->$day == null || $laporan->isVerif == 0))
                <button class="btn bg-gradient-primary float-end" data-bs-toggle="modal" data-bs-target="#{{ $day }}Modal-{{ $laporan->id }}">
                  <i class="ni ni-send text-white me-1"></i> Buat Laporan
                </button>
                @endif
              </div>
            </div>

            <!-- Modal untuk Hari -->
            <div class="modal fade" id="{{ $day }}Modal-{{ $laporan->id }}" tabindex="-1" aria-labelledby="{{ $day }}ModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="{{ $day }}ModalLabel">Laporan {{ ucfirst($day) }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('updateLaporan', $laporan->id) }}" method="POST" onsubmit="tinymce.triggerSave()">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <textarea class="form-control tinymce-editor" name="{{ $day }}" rows="5">{{ $laporan->$day }}</textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            <!-- Modal Mingguan -->
            <div class="modal fade" id="mingguanModal-{{ $laporan->id }}" tabindex="-1" aria-labelledby="mingguanModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="mingguanModalLabel">Laporan Mingguan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('updateLaporan', $laporan->id) }}" method="POST" onsubmit="tinymce.triggerSave()">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <textarea class="form-control tinymce-editor" name="mingguan" rows="5">{{ $laporan->mingguan }}</textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  @push('scripts')
  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea.tinymce-editor',
      width: '100%',
      height: 300,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
  </script>
  @endpush
</x-app-layout>
