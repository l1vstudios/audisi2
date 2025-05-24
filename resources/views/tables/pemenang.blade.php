
<div class="data-table fade-in">

    {{-- Card Filter --}}
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Filter Data Pemenang</h5>
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label for="filterNama" class="form-label">Cari Nama</label>
                    <input type="text" class="form-control" id="filterNama" placeholder="Cari berdasarkan nama...">
                </div>
                <div class="col-md-4">
                    <label for="filterKategoriAudisi" class="form-label">Kategori Audisi</label>
                    <select class="form-control" id="filterKategoriAudisi">
                        <option value="">Semua Kategori Audisi</option>
                        <option value="menyanyi">Menyanyi</option>
                        <option value="acting">Acting</option>
                        <option value="model">Model</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="filterStatus" class="form-label">Status</label>
                    <select class="form-control" id="filterStatus">
                        <option value="">Semua Status</option>
                        <option value="finalis">Finalis</option>
                        <option value="eliminasi">Eliminasi</option>
                        <option value="blacklist">Blacklist</option>
                    </select>
                </div>
            </div>

            <div class="mt-3">
                <button id="btnApplyFilter" class="btn btn-primary me-2">Terapkan Filter</button>
                <button id="btnResetFilter" class="btn btn-secondary">Reset Filter</button>
            </div>
        </div>
    </div>

    <div class="table-header d-flex justify-content-between align-items-center mb-2">
        <h4 class="table-title">Tambah Data Pemenang</h4>
        <div class="search-field">
            <input type="text" placeholder="Cari finalis..." id="tableSearch" class="form-control" />
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="thead-light">
                <tr>
                    <th>NO#</th>
                    <th>NAMA Peserta</th>
                    <th>KATEGORI PESERTA</th>
                    <th>KATEGORI AUDISI</th>
                    <th>STATUS</th>
                    <th>NO HP/WA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id="dataTableBody">
                @forelse($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_lengkap ?? $item->nama ?? $item->name ?? '-' }}</td>
                    <td>{{ $item->kategori_peserta ?? '-' }}</td>
                    <td>{{ $item->kategori_audisi ?? '-' }}</td>
                    <td>{{ $item->status ?? '-' }}</td>
                    <td>{{ $item->no_wa ?? $item->phone ?? $item->no_telepon ?? '-' }}</td>
                    <td>
                    <button class="btn btn-primary btn-sm expand-btn2"
                        data-id="{{ $item->id ?? 0 }}"
                        data-nama="{{ $item->nama_lengkap ?? '' }}"
                        data-no="{{ $item->no_wa ?? '' }}"
                    >
                        <i class="fas fa-plus"></i> Jadikan Pemenang
                    </button>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada Calon Pemenang
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="winnerModal" tabindex="-1" aria-labelledby="winnerModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form id="winnerForm" class="modal-content" method="POST" action="{{ route('pemenang.store') }}">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="winnerModalLabel">Jadikan Pemenang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body">
          <input type="hidden" id="usersId" name="users_id">



            <div class="mb-3">
              <label for="juara" class="form-label">Pilih Juara</label>
              <select id="juara" name="juara" class="form-control" required>
                <option value="">-- Pilih Juara --</option>
                <option value="Juara 1">Juara 1</option>
                <option value="Juara 2">Juara 2</option>
                <option value="Juara 3">Juara 3</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="note" class="form-label">Catatan</label>
              <textarea id="note" name="note" class="form-control" placeholder="Tulis catatan..."></textarea>
            </div>

            <div class="mb-3">
              <label for="waMessage" class="form-label">Pesan WhatsApp</label>
              <textarea id="waMessage" name="wa_message" class="form-control" placeholder="Pesan untuk dikirim ke WhatsApp..." required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan & Kirim WA</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>

</div>

@if(session('success'))
    <div class="alert alert-success mt-3 text-center">{{ session('success') }}</div>
@endif

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Buka modal dan isi data saat tombol diklik
    button.addEventListener('click', function () {
    const id = $(this).data('id');
    const nama = $(this).data('nama');
    const no = $(this).data('no');

    console.log('Detail button clicked for ID:', id);
    console.log('Nama:', nama);
    console.log('No:', no);

    $('#pesertaId').val(id);
    $('#pesertaNama').val(nama);
    $('#pesertaNo').val(no);

    $('#juara').val('');
    $('#note').val('');
    $('#waMessage').val('');

    const modal = new bootstrap.Modal(document.getElementById('winnerModal'));
    modal.show();
});



    // Jika ada session wa, buka WhatsApp otomatis
    @if(session('wa'))
        const wa = @json(session('wa'));
        if (wa.no && wa.message) {
            const url = `https://wa.me/${wa.no}?text=${encodeURIComponent(wa.message)}`;
            window.open(url, '_blank');
        }
    @endif
});
</script>

