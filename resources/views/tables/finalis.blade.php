<div class="data-table fade-in">

{{-- Card Filter --}}
    <div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title mb-3">Filter Data Peserta Finalis</h5>
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

    <!-- <div class="table-header">
        <h4 class="table-title">Data Peserta Finalis</h4>
        <div class="search-field">
            <input type="text" placeholder="Cari finalis..." id="tableSearch">
        </div>
    </div> -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>NO#</th>
                    <th>NAMA Peserta</th>
                    <th>KATEGORI PESERTA</th>
                    <th>KATEGORI AUDISI</th>

                    <th>STATUS</th>
                    <th>NO HP/WA</th>
                    <th>NOTE JURI</th>


                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_lengkap ?? $item->nama ?? $item->name ?? '-' }}</td>
                    <td>{{ $item->kategori_peserta ?? '-' }}</td>
                    <td>{{ $item->kategori_audisi ?? '-' }}</td>
                    <td>{{ $item->status ?? '-' }}</td>



                    <td>{{ $item->no_wa ?? $item->phone ?? $item->no_telepon ?? '-' }}</td>
                    <td>{{ $item->note ?? '-' }}</td>

                 
                    <td>
                    <button 
                        class="btn btn-outline-danger btn-sm expand-btns"
                        data-id="{{ $item->id ?? 0 }}"
                        data-nama="{{ $item->nama_lengkap ?? '-' }}"
                        data-no="{{ $item->no_wa ?? '-' }}"
                        data-alamat="{{ $item->alamat ?? '-' }}"
                        data-pengalaman="{{ $item->pengalaman ?? '-' }}"
                        data-pekerjaan="{{ $item->pekerjaan ?? '-' }}"
                        data-hobby="{{ $item->hobby ?? '-' }}" 
                        >
                        <i class="fas fa-eye"></i> Detail
                        </button>



                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> Belum ada peserta finalis
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


