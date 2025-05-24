<div class="data-table fade-in">

    {{-- Card Filter --}}
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">Filter Data Peserta</h5>
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
                <button type="button" class="btn btn-primary me-2" id="applyFilterBtn">
                    <i class="fas fa-filter"></i> Terapkan Filter
                </button>
                <button type="button" class="btn btn-secondary" id="resetFilterBtn">
                    <i class="fas fa-refresh"></i> Reset Filter
                </button>
                <span id="filterResult" class="ms-3 text-muted"></span>
            </div>
        </div>
    </div>

    {{-- Tabel Peserta --}}
    <div class="table-responsive">
        <table class="table table-hover" id="pesertaTable">
            <thead class="thead-light">
                <tr>
                    <th>NO#</th>
                    <th>NAMA Peserta</th>
                    <th>KATEGORI PESERTA</th>
                    <th class="col-kategori-audisi">KATEGORI AUDISI</th>
                    <th class="col-status">STATUS</th>
                    <th>NO HP/WA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                <tr class="data-row">
                    <td>{{ $index + 1 }}</td>
                    <td class="col-nama">{{ strtolower($item->nama_lengkap ?? $item->nama ?? $item->name ?? '-') }}</td>
                    <td class="col-kategori-peserta">{{ $item->kategori_peserta ?? '-' }}</td>
                    <td class="col-kategori-audisi">{{ strtolower($item->kategori_audisi ?? '-') }}</td>
                    <td class="col-status">{{ strtolower($item->status ?? '-') }}</td>
                    <td>{{ $item->no_wa ?? $item->phone ?? $item->no_telepon ?? '-' }}</td>
                    <td>
                    <button 
                        class="btn btn-outline-danger btn-sm expand-btns"
                        data-id="{{ $item->id ?? 0 }}"
                       
                        >
                        <i class="fas fa-eye"></i> Detail
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada data peserta
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
function applyTableFilter() {
    const nama = document.getElementById('filterNama').value.toLowerCase().trim();
    const kategori = document.getElementById('filterKategoriAudisi').value.toLowerCase().trim();
    const status = document.getElementById('filterStatus').value.toLowerCase().trim();
    const rows = document.querySelectorAll('#pesertaTable tbody tr.data-row');
    let visibleCount = 0;

    rows.forEach(function(row) {
        const rowNama = row.querySelector('.col-nama').textContent.toLowerCase().trim();
        const rowKategori = row.querySelector('.col-kategori-audisi').textContent.toLowerCase().trim();
        const rowStatus = row.querySelector('.col-status').textContent.toLowerCase().trim();

        const matchNama = !nama || rowNama.includes(nama);
        const matchKategori = !kategori || rowKategori === kategori;
        const matchStatus = !status || rowStatus === status;

        if (matchNama && matchKategori && matchStatus) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });

    document.getElementById('filterResult').textContent = `Menampilkan ${visibleCount} dari ${rows.length} data`;
}

function resetTableFilter() {
    document.getElementById('filterNama').value = '';
    document.getElementById('filterKategoriAudisi').value = '';
    document.getElementById('filterStatus').value = '';
    applyTableFilter();
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('filterNama').addEventListener('keyup', applyTableFilter);
    document.getElementById('filterKategoriAudisi').addEventListener('change', applyTableFilter);
    document.getElementById('filterStatus').addEventListener('change', applyTableFilter);
    document.getElementById('applyFilterBtn').addEventListener('click', applyTableFilter);
    document.getElementById('resetFilterBtn').addEventListener('click', resetTableFilter);
});
</script>