<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin || Page</title>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
    .button-container {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-top: 20px; 
    }

    button {
      padding: 8px 15px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
    }

    .btn-danger {
      background-color: red;
      color: white;
    }

    .btn-success {
      background-color: green;
      color: white;
    }

    button:hover {
      opacity: 0.8;
    }

    .modal-wide .modal-dialog {
      max-width: 90%;
      width: 1000px;
    }

    .modal-wide .modal-content {
      height: auto;
    }

    .modal-wide .modal-body {
      display: flex;
      flex-direction: row;
      padding: 20px;
    }

    .video-container {
      flex: 1;
      padding-right: 20px;
    }

    .details-container {
      flex: 1;
    }

    .data-modal .modal-dialog {
      max-width: 90%;
      width: 1000px;
    }

    .data-modal .modal-body {
      padding: 20px;
    }

    .filter-section {
      background-color: #f8f9fa;
      padding: 15px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .filter-section .form-group {
      margin-bottom: 0;
    }

    .data-table-container {
      margin-top: 20px;
    }

    .form-modal .modal-dialog {
      max-width: 700px;
    }

    .form-modal .modal-body {
      padding: 20px;
    }

    .image-preview {
      width: 100%;
      height: 200px;
      border: 1px dashed #ddd;
      border-radius: 4px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f8f9fa;
      overflow: hidden;
    }

    .image-preview img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }

    .custom-file-label::after {
      content: "Browse";
    }

    .tab-content {
      padding-top: 20px;
    }

    .nav-tabs .nav-link.active {
      font-weight: bold;
      color: #4B49AC;
    }

    @media (max-width: 768px) {
      .modal-wide .modal-dialog,
      .data-modal .modal-dialog {
        max-width: 95%;
      }
      
      .modal-wide .modal-body {
        flex-direction: column;
      }
      
      .video-container {
        padding-right: 0;
        padding-bottom: 20px;
      }
    }
  </style>
</head>
<body>
@include('navbar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome</h3>
                  <h6 class="font-weight-normal mb-0">Audisi Indonesia Dream Talent</h6>
                </div>
               
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Peserta</p>
                        <p class="fs-30 mb-2">{{ $totalPeserta }}</p>
                    </div>
                </div>

                </div>

                <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Finalis</p>
                        <p class="fs-30 mb-2">{{ $totalFinalis }}</p>
                    </div>
                </div>

                </div>
         
                <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Eliminasi</p>
                        <p class="fs-30 mb-2">{{ $totalEliminasi }}</p>
                    </div>
                </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                <div class="card card-tale">
                    <div class="card-body">
                        <p class="mb-4">Total Blacklist</p>
                        <p class="fs-30 mb-2">{{ $totalBlacklist }}</p>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title">Daftar Peserta Audisi</h4>
                    <div class="search-field">
                      <input type="text" class="form-control" id="searchInput" placeholder="Cari peserta...">
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="pesertaTable" class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th class="text-center">NO#</th>
                          <th>NAMA PESERTA</th>
                          <th>KATEGORI AUDISI</th>
                          <th>KATEGORI PESERTA</th>
                          <th>STATUS PESERTA</th>
                          <th>JENIS KELAMIN</th>
                          <th class="text-center">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data_audisi as $item)
                          <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <p class="mb-0 font-weight-bold">{{ $item->nama_lengkap }}</p>
                              </div>
                            </td>
                            <td>
                              <span class="badge badge-info">{{ $item->kategori_audisi }}</span>
                            </td>
                            <td>
                              <span class="badge badge-primary">{{ $item->kategori_peserta }}</span>
                            </td>
                            <td>
                              <span class="badge {{ $item->status == 'finalis' ? 'badge-success' : ($item->status == 'eliminasi' ? 'badge-danger' : 'badge-primary') }}">{{ $item->status }}</span>
                            </td>
                            <td>
                              @if($item->jenis_kelamin == 'Pria')
                                <span class="badge badge-light">Laki-laki</span>
                              @else
                                <span class="badge badge-light">Perempuan</span>
                              @endif
                            </td>
                            <td class="text-center">
                              <button class="btn btn-outline-primary btn-sm expand-btn" 
                                      data-id="{{ $item->id }}"
                                      data-toggle="tooltip" 
                                      title="Detail Peserta">
                                <i class="ti-eye"></i>
                              </button>
                              <!-- <button class="btn btn-outline-secondary btn-sm edit-btn"
                                      data-id="{{ $item->id }}"
                                      data-toggle="tooltip"
                                      title="Edit Data">
                                <i class="ti-pencil"></i>
                              </button> -->
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="d-flex justify-content-between mt-4">
                    <div class="text-muted">
                      Menampilkan <span id="showingCount">1</span> sampai <span id="totalCount">{{ count($data_audisi) }}</span> dari <span id="totalEntries">{{ count($data_audisi) }}</span> peserta
                    </div>
                    <nav>
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Selanjutnya</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="expandModal" class="modal modal-wide fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Peserta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="video-container">
                    <iframe id="videoFrame" width="100%" height="315" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="details-container" id="details">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="pengumumanModal" class="modal data-modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Pengumuman</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <ul class="nav nav-tabs" id="pengumumanTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="daftar-pengumuman-tab" data-toggle="tab" href="#daftar-pengumuman" role="tab" aria-controls="daftar-pengumuman" aria-selected="true">Daftar Pengumuman</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="tambah-pengumuman-tab" data-toggle="tab" href="#tambah-pengumuman" role="tab" aria-controls="tambah-pengumuman" aria-selected="false">Tambah Pengumuman</a>
                    </li>
                  </ul>
                  
                  <div class="tab-content" id="pengumumanTabContent">
                    <div class="tab-pane fade show active" id="daftar-pengumuman" role="tabpanel" aria-labelledby="daftar-pengumuman-tab">
                      <div class="filter-section">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Status</label>
                              <select class="form-control" id="filterStatusPengumuman">
                                <option value="">Semua Status</option>
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Tanggal</label>
                              <input type="date" class="form-control" id="filterTanggalPengumuman">
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-end">
                            <button type="button" class="btn btn-primary" id="applyFilterPengumuman">Terapkan Filter</button>
                          </div>
                        </div>
                      </div>
                      
                      <div class="data-table-container">
                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th>NO#</th>
                              <th>JUDUL</th>
                              <th>BANNER</th>
                              <th>STATUS</th>
                              <th>TANGGAL</th>
                              <th>AKSI</th>
                            </tr>
                          </thead>
                          <tbody id="pengumumanTableBody">
                            <tr>
                              <td>1</td>
                              <td>Pengumuman Finalis Audisi 2025</td>
                              <td><img src="https://i.postimg.cc/XJRc3JW9/logo.png" alt="Banner" class="img-thumbnail"></td>
                              <td><span class="badge badge-success">Published</span></td>
                              <td>2025-01-15</td>
                              <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="ti-eye"></i></button>
                                <button class="btn btn-outline-warning btn-sm"><i class="ti-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="ti-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Jadwal Audisi Tahap 2</td>
                              <td><img src="https://i.postimg.cc/XJRc3JW9/logo.png" alt="Banner" class="img-thumbnail"></td>
                              <td><span class="badge badge-secondary">Draft</span></td>
                              <td>2025-01-10</td>
                              <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="ti-eye"></i></button>
                                <button class="btn btn-outline-warning btn-sm"><i class="ti-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="ti-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tambah-pengumuman" role="tabpanel" aria-labelledby="tambah-pengumuman-tab">
                      <form id="pengumumanForm" action="/admin/pengumuman/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="judulPengumuman">Judul Pengumuman</label>
                          <input type="text" class="form-control" id="judulPengumuman" name="judul" required>
                        </div>
                        
                        <div class="form-group">
                          <label>Banner Image</label>
                          <div class="image-preview" id="imagePreview">
                            <span class="text-muted">Preview Banner</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="bannerImage" name="banner_image" accept="image/*" required>
                            <label class="custom-file-label" for="bannerImage">Pilih file</label>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="deskripsiPengumuman">Deskripsi</label>
                          <textarea class="form-control" id="deskripsiPengumuman" name="deskripsi" rows="5" required></textarea>
                        </div>
                        
                        <div class="form-group">
                          <label for="statusPengumuman">Status</label>
                          <select class="form-control" id="statusPengumuman" name="status">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                          </select>
                        </div>
                        
                        <div class="text-right">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="dataPesertaModal" class="modal data-modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Data Peserta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="filter-section">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="finalis">Finalis</option>
                            <option value="eliminasi">Eliminasi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" id="filterKategori">
                            <option value="">Semua Kategori</option>
                            <option value="akting">Akting</option>
                            <option value="menyanyi">Menyanyi</option>
                            <option value="menari">Menari</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-primary" id="applyFilter">Terapkan Filter</button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="data-table-container">
                    <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th>NO#</th>
                          <th>NAMA PESERTA</th>
                          <th>KATEGORI AUDISI</th>
                          <th>KATEGORI PESERTA</th>
                          <th>STATUS</th>
                          <th>JENIS KELAMIN</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody id="pesertaModalTableBody">
                        @foreach ($data_audisi as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td><span class="badge badge-info">{{ $item->kategori_audisi }}</span></td>
                            <td><span class="badge badge-primary">{{ $item->kategori_peserta }}</span></td>
                            <td><span class="badge {{ $item->status == 'finalis' ? 'badge-success' : ($item->status == 'eliminasi' ? 'badge-danger' : 'badge-primary') }}">{{ $item->status }}</span></td>
                            <td>
                              @if($item->jenis_kelamin == 'Pria')
                                <span class="badge badge-light">Laki-laki</span>
                              @else
                                <span class="badge badge-light">Perempuan</span>
                              @endif
                            </td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm modal-detail-btn" data-id="{{ $item->id }}"><i class="ti-eye"></i></button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="d-flex justify-content-between mt-4">
                    <div class="text-muted">
                      Menampilkan <span>1</span> sampai <span>{{ count($data_audisi) }}</span> dari <span>{{ count($data_audisi) }}</span> peserta
                    </div>
                    <nav>
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Selanjutnya</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="dataFinalisModal" class="modal data-modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Data Finalis</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="filter-section">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" id="filterKategoriFinalis">
                            <option value="">Semua Kategori</option>
                            <option value="akting">Akting</option>
                            <option value="menyanyi">Menyanyi</option>
                            <option value="menari">Menari</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Urutan</label>
                          <select class="form-control" id="sortFinalis">
                            <option value="nama_asc">Nama (A-Z)</option>
                            <option value="nama_desc">Nama (Z-A)</option>
                            <option value="nilai_desc">Nilai (Tertinggi)</option>
                            <option value="nilai_asc">Nilai (Terendah)</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 d-flex align-items-end">
                        <button type="button" class="btn btn-primary" id="applyFilterFinalis">Terapkan Filter</button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="data-table-container">
                    <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th>NO#</th>
                          <th>NAMA FINALIS</th>
                          <th>KATEGORI AUDISI</th>
                          <th>NILAI</th>
                          <th>JENIS KELAMIN</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody id="finalisTableBody">
                        @foreach ($data_audisi->where('status', 'finalis') as $key => $item)
                          <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td><span class="badge badge-info">{{ $item->kategori_audisi }}</span></td>
                            <td>{{ rand(70, 95) }}</td>
                            <td>
                              @if($item->jenis_kelamin == 'Pria')
                                <span class="badge badge-light">Laki-laki</span>
                              @else
                                <span class="badge badge-light">Perempuan</span>
                              @endif
                            </td>
                            <td>
                              <button class="btn btn-outline-primary btn-sm modal-detail-btn" data-id="{{ $item->id }}"><i class="ti-eye"></i></button>
                              <button class="btn btn-outline-success btn-sm modal-pemenang-btn" data-id="{{ $item->id }}" data-nama="{{ $item->nama_lengkap }}"><i class="ti-crown"></i></button>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  
                  <div class="d-flex justify-content-between mt-4">
                    <div class="text-muted">
                      Menampilkan <span>1</span> sampai <span>{{ $data_audisi->where('status', 'finalis')->count() }}</span> dari <span>{{ $data_audisi->where('status', 'finalis')->count() }}</span> finalis
                    </div>
                    <nav>
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1">Sebelumnya</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">Selanjutnya</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="dataPemenangModal" class="modal data-modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Data Pemenang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <ul class="nav nav-tabs" id="pemenangTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="daftar-pemenang-tab" data-toggle="tab" href="#daftar-pemenang" role="tab" aria-controls="daftar-pemenang" aria-selected="true">Daftar Pemenang</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="tambah-pemenang-tab" data-toggle="tab" href="#tambah-pemenang" role="tab" aria-controls="tambah-pemenang" aria-selected="false">Tambah Pemenang</a>
                    </li>
                  </ul>
                  
                  <div class="tab-content" id="pemenangTabContent">
                    <div class="tab-pane fade show active" id="daftar-pemenang" role="tabpanel" aria-labelledby="daftar-pemenang-tab">
                      <div class="filter-section">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Kategori Juara</label>
                              <select class="form-control" id="filterKategoriJuara">
                                <option value="">Semua Kategori</option>
                                <option value="juara_1">Juara 1</option>
                                <option value="juara_2">Juara 2</option>
                                <option value="juara_3">Juara 3</option>
                                <option value="harapan_1">Harapan 1</option>
                                <option value="harapan_2">Harapan 2</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Kategori Audisi</label>
                              <select class="form-control" id="filterKategoriAudisiPemenang">
                                <option value="">Semua Kategori</option>
                                <option value="akting">Akting</option>
                                <option value="menyanyi">Menyanyi</option>
                                <option value="menari">Menari</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4 d-flex align-items-end">
                            <button type="button" class="btn btn-primary" id="applyFilterPemenang">Terapkan Filter</button>
                          </div>
                        </div>
                      </div>
                      
                      <div class="data-table-container">
                        <table class="table table-hover">
                          <thead class="thead-light">
                            <tr>
                              <th>NO#</th>
                              <th>NAMA PEMENANG</th>
                              <th>KATEGORI AUDISI</th>
                              <th>KATEGORI JUARA</th>
                              <th>HADIAH</th>
                              <th>AKSI</th>
                            </tr>
                          </thead>
                          <tbody id="pemenangTableBody">
                            <tr>
                              <td>1</td>
                              <td>John Doe</td>
                              <td><span class="badge badge-info">Menyanyi</span></td>
                              <td><span class="badge badge-warning">Juara 1</span></td>
                              <td>Rp 10.000.000</td>
                              <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="ti-eye"></i></button>
                                <button class="btn btn-outline-warning btn-sm"><i class="ti-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="ti-trash"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Jane Smith</td>
                              <td><span class="badge badge-info">Menari</span></td>
                              <td><span class="badge badge-warning">Juara 2</span></td>
                              <td>Rp 7.500.000</td>
                              <td>
                                <button class="btn btn-outline-primary btn-sm"><i class="ti-eye"></i></button>
                                <button class="btn btn-outline-warning btn-sm"><i class="ti-pencil"></i></button>
                                <button class="btn btn-outline-danger btn-sm"><i class="ti-trash"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="tambah-pemenang" role="tabpanel" aria-labelledby="tambah-pemenang-tab">
                      <form id="pemenangForm" action="/admin/pemenang/create" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Pilih Finalis</label>
                          <select class="form-control" id="finalisId" name="finalis_id" required>
                            <option value="">Pilih Finalis</option>
                            @foreach ($data_audisi->where('status', 'finalis') as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_lengkap }} - {{ $item->kategori_audisi }}</option>
                            @endforeach
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label>Kategori Juara</label>
                          <select class="form-control" id="kategoriJuara" name="kategori_juara" required>
                            <option value="juara_1">Juara 1</option>
                            <option value="juara_2">Juara 2</option>
                            <option value="juara_3">Juara 3</option>
                            <option value="harapan_1">Harapan 1</option>
                            <option value="harapan_2">Harapan 2</option>
                          </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="hadiah">Hadiah</label>
                          <input type="text" class="form-control" id="hadiah" name="hadiah" required>
                        </div>
                        
                        <div class="text-right">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.  Indonesia Dream Talent</a> All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
          </div>
         
        </footer> 
      </div>
    </div>   
  </div>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>


  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>

  <script src="js/Chart.roundedBarCharts.js"></script>


<script>
$(document).ready(function() {
    $('#pengumumanLink').on('click', function(e) {
        e.preventDefault();
        $('#pengumumanModal').modal('show');
        loadPengumumanData();
    });
    
    $('#dataPesertaLink').on('click', function(e) {
        e.preventDefault();
        $('#dataPesertaModal').modal('show');
        loadPesertaData();
    });
    
    $('#dataFinalisLink').on('click', function(e) {
        e.preventDefault();
        $('#dataFinalisModal').modal('show');
        loadFinalisData();
    });
    
    $('#dataPemenangLink').on('click', function(e) {
        e.preventDefault();
        $('#dataPemenangModal').modal('show');
        loadPemenangData();
    });
    
    $('#bannerImage').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" alt="Banner Preview">');
            }
            reader.readAsDataURL(file);
            $('.custom-file-label').text(file.name);
        }
    });
    
    function loadPengumumanData() {
     
        console.log('Loading pengumuman data...');
    }
    
    function loadPesertaData() {
    
        console.log('Loading peserta data...');
    }
    
    function loadFinalisData() {
   
        console.log('Loading finalis data...');
    }
    
    function loadPemenangData() {
       
        console.log('Loading pemenang data...');
    }
    
    $('#applyFilter').on('click', function() {
        const status = $('#filterStatus').val();
        const kategori = $('#filterKategori').val();
        
        filterPesertaTable(status, kategori);
    });
    
    function filterPesertaTable(status, kategori) {
        $("#pesertaModalTableBody tr").show();
        
        if (status) {
            $("#pesertaModalTableBody tr").filter(function() {
                return $(this).find("td:eq(4)").text().toLowerCase().indexOf(status) === -1;
            }).hide();
        }
        
        if (kategori) {
            $("#pesertaModalTableBody tr").filter(function() {
                return $(this).find("td:eq(2)").text().toLowerCase().indexOf(kategori) === -1;
            }).hide();
        }
    }
    
    $('#applyFilterFinalis').on('click', function() {
        const kategori = $('#filterKategoriFinalis').val();
        const sort = $('#sortFinalis').val();
        
        filterFinalisTable(kategori, sort);
    });
    
    function filterFinalisTable(kategori, sort) {
        $("#finalisTableBody tr").show();
        
        if (kategori) {
            $("#finalisTableBody tr").filter(function() {
                return $(this).find("td:eq(2)").text().toLowerCase().indexOf(kategori) === -1;
            }).hide();
        }
        
        if (sort) {
            const rows = $("#finalisTableBody tr").toArray();
            rows.sort(function(a, b) {
                const aVal = $(a).find("td:eq(1)").text(); 
                const bVal = $(b).find("td:eq(1)").text();
                
                if (sort === 'nama_asc') {
                    return aVal.localeCompare(bVal);
                } else if (sort === 'nama_desc') {
                    return bVal.localeCompare(aVal);
                } else {
                    const aScore = parseInt($(a).find("td:eq(3)").text());
                    const bScore = parseInt($(b).find("td:eq(3)").text());
                    
                    if (sort === 'nilai_desc') {
                        return bScore - aScore;
                    } else {
                        return aScore - bScore;
                    }
                }
            });
            
            $.each(rows, function(index, row) {
                $("#finalisTableBody").append(row);
            });
        }
    }
    
    $('#applyFilterPemenang').on('click', function() {
        const kategoriJuara = $('#filterKategoriJuara').val();
        const kategoriAudisi = $('#filterKategoriAudisiPemenang').val();
        
        filterPemenangTable(kategoriJuara, kategoriAudisi);
    });
    
    function filterPemenangTable(kategoriJuara, kategoriAudisi) {
        $("#pemenangTableBody tr").show();
        
        if (kategoriJuara) {
            $("#pemenangTableBody tr").filter(function() {
                return $(this).find("td:eq(3)").text().toLowerCase().indexOf(kategoriJuara.replace('_', ' ')) === -1;
            }).hide();
        }
        
        if (kategoriAudisi) {
            $("#pemenangTableBody tr").filter(function() {
                return $(this).find("td:eq(2)").text().toLowerCase().indexOf(kategoriAudisi) === -1;
            }).hide();
        }
    }
    
    $('.modal-detail-btn').on('click', function() {
        const pesertaId = $(this).data('id');
        $('#dataPesertaModal').modal('hide');
        $('#dataFinalisModal').modal('hide');
        
        setTimeout(function() {
            $('.expand-btn[data-id="' + pesertaId + '"]').click();
        }, 500);
    });
    
    $('.modal-pemenang-btn').on('click', function() {
        const finalisId = $(this).data('id');
        const finalisNama = $(this).data('nama');
        
        $('#dataFinalisModal').modal('hide');
        
        setTimeout(function() {
            $('#dataPemenangModal').modal('show');
            $('#tambah-pemenang-tab').tab('show');
            $('#finalisId').val(finalisId);
        }, 500);
    });

    $('#example').DataTable();

    $('.expand-btn').on('click', function() {
        var pesertaId = $(this).data('id');
        var url = '/admin/peserta/' + pesertaId; 
        
        $.get(url, function(data) {
            $('#expandModal').modal('show');
            
            if(data.link_vidio) {
                var youtubeVideoUrl = data.link_vidio;
                
                var videoId = extractYouTubeVideoId(youtubeVideoUrl);
                if(videoId) {
                    var embedUrl = `https://www.youtube.com/embed/${videoId}`;
                    $('#videoFrame').attr('src', embedUrl).show();  
                } else {
                    $('#videoFrame').hide(); 
                }
            } else {
                $('#videoFrame').hide(); 
            }
            
            $('#details').html(`
              <table class="table table-bordered" style="font-size: 0.9em;">
                <tr>
                  <td style="padding: 4px 8px;"><strong>Nama Lengkap:</strong></td>
                  <td style="padding: 4px 8px;">${data.nama_lengkap || 'N/A'}</td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Kategori Audisi:</strong></td>
                  <td style="padding: 4px 8px;">${data.kategori_audisi || 'N/A'}</td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Kategori Peserta:</strong></td>
                  <td style="padding: 4px 8px;">${data.kategori_peserta || 'N/A'}</td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Jenis Kelamin:</strong></td>
                  <td style="padding: 4px 8px;">${data.jenis_kelamin || 'N/A'}</td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Alamat Peserta:</strong></td>
                  <td style="padding: 4px 8px;">${data.alamat || 'N/A'}</td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Status Peserta:</strong></td>
                  <td style="padding: 4px 8px;">
                    <span id="statusPeserta" class="badge ${getStatusBadgeClass(data.status)}">
                      ${data.status || 'N/A'}
                    </span>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 4px 8px;"><strong>Nomor WA Peserta:</strong></td>
                  <td style="padding: 4px 8px;">${data.no_wa || 'N/A'}</td>
                </tr>
              </table>
              <div class="button-container">
                <button id="eliminasiBtn" class="btn btn-danger" data-id="${pesertaId}">Eliminasi</button>
                <button id="loloskanBtn" class="btn btn-success" data-id="${pesertaId}">Loloskan</button>
              </div>
            `);



            $('#eliminasiBtn').on('click', function() {
                updateStatus($(this).data('id'), 'eliminasi');
            });

            $('#loloskanBtn').on('click', function() {
                updateStatus($(this).data('id'), 'finalis');
            });

        }).fail(function() {
            alert('Gagal memuat data peserta');
        });
    });

    function extractYouTubeVideoId(url) {
        var videoId = null;
        
        var regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|\S*\?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        var match = url.match(regex);

        if (match) {
            videoId = match[1];  
        }

        return videoId;
    }

    function getStatusBadgeClass(status) {
        switch(status) {
            case 'finalis':
                return 'badge-success';
            case 'eliminasi':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }

    function updateStatus(pesertaId, status) {
        if (!confirm(`Apakah Anda yakin ingin ${status === 'finalis' ? 'meloloskan' : 'mengeliminasi'} peserta ini?`)) {
            return;
        }

        const statusElement = $('#statusPeserta');
        const originalStatus = statusElement.text();
        statusElement.html('<i class="ti-reload fa-spin"></i> Memproses...');

        $.ajax({
            url: '/admin/update-status/' + pesertaId,
            type: 'POST',
            data: {
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                statusElement.text(status);
                statusElement.removeClass().addClass('badge ' + getStatusBadgeClass(status));
                
                alert(`Status peserta berhasil diubah menjadi ${status}`);
                
                setTimeout(function() {
                    location.reload();
                }, 1500);
            },
            error: function(xhr) {
                statusElement.text(originalStatus);
                alert('Gagal mengubah status peserta: ' + (xhr.responseJSON?.message || 'Terjadi kesalahan'));
            }
        });
    }

    $('#expandModal').on('hidden.bs.modal', function () {
        $('#videoFrame').attr('src', '').hide();  
        $('#details').empty();  
    });
    
    $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $("#pesertaTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
</body>
</html>