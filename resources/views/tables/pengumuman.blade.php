<div class="data-table fade-in">
    <div class="table-header">
        <div class="d-flex justify-content-between align-items-center">
        <!-- <a href="#" class="btn btn-primary btn-sm expand-btn4" data-bs-toggle="modal" data-bs-target="#tambahPengumumanModal" id="expand-btn4">
    <i class="fas fa-plus"></i> Tambah Pengumuman
</a> -->
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>NO#</th>
                    <th>Title</th>
                    <th>Isi Pengumuman</th>
                    <th>STATUS</th>
                    <!-- <th>AKSI</th> -->
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                <tr class="data-row">
                    <td>{{ $index + 1 }}</td>
                    <td class="col-nama">{{ strtolower($item->title ?? $item->title ?? $item->title ?? '-') }}</td>
                    <td class="col-kategori-peserta">{{ $item->isi ?? '-' }}</td>
                    <td class="col-status">{{ strtolower($item->status ?? '-') }}</td>
                    <!-- <td>
                        <button 
                            class="btn btn-outline-danger btn-sm expand-btns"
                            data-id="{{ $item->id ?? 0 }}"
                            >
                            <i class="fas fa-eye"></i> Detail
                        </button>
                    </td> -->
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada Pengumuman
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Pengumuman -->
<div class="modal fade" id="tambahPengumumanModal" tabindex="-1" aria-labelledby="tambahPengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPengumumanModalLabel">Tambah Pengumuman Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Pengumuman</label>
                        <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('expand-btn4').addEventListener('click', function(e) {
            e.preventDefault();
            var modal = new bootstrap.Modal(document.getElementById('tambahPengumumanModal'));
            modal.show();
        });
    });
</script>