

@include("head")
<body>
@include("general")


    <div class="data-table fade-in">
        <!-- <div class="table-header">
            <h4 class="table-title">Daftar Peserta Audisi</h4>
            <div class="search-field">
                <input type="text" placeholder="Cari peserta..." id="tableSearch">
            </div>
        </div> -->

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>NO#</th>
                        <th>NAMA PESERTA</th>
                        <th>KATEGORI AUDISI</th>
                        <th>KATEGORI PESERTA</th>
                        <th>STATUS PESERTA</th>
                        <th>JENIS KELAMIN</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody id="pesertaTable">
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
                                <span class="badge 
                                    {{ $item->status == 'finalis' ? 'badge-success' : 
                                        ($item->status == 'eliminasi' ? 'badge-danger' : 
                                        ($item->status == 'pending' ? 'badge-warning' : 'badge-primary')) }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                @if($item->jenis_kelamin == 'Pria')
                                    <span class="badge badge-light">Laki-laki</span>
                                @else
                                    <span class="badge badge-light">Perempuan</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn-custom btn-outline-primary expand-btn" data-id="{{ $item->id }}">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Main Modal  -->
        <div class="modal fade" id="expandModal" tabindex="-1" role="dialog" aria-labelledby="expandModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="expandModalLabel">Detail Peserta</h5>
                <button type="button" class="btn-close-custom" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div style="aspect-ratio: 4 / 3; width: 100%;">
                      <iframe id="videoFrame" allowfullscreen style="width: 100%; height: 100%; border: none;"></iframe>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div id="details"></div>
                  </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div> -->
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-center p-3">
            <div class="text-muted">
                Menampilkan 1-3 dari 3 peserta
            </div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Sebelumnya</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

<script>
    // DOM Ready
    $(document).ready(function() {
        initializeNavbar();
        initializeSidebar();
        initializeSearch();
        initializeDetailButtons();
        initializeDetailButtons2();
        initializeDetailButtons3();
        initializeDetailButtons4();


    });

    function initializeNavbar() {
        $('#profileDropdown').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('active');
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#profileDropdown').length) {
                $('#profileDropdown').removeClass('active');
            }
        });

        $('#sidebarToggle').on('click', function() {
            $('#sidebar').toggleClass('show');
            $('#sidebarOverlay').toggleClass('show');
            $('body').toggleClass('sidebar-open');
        });

        $('#sidebarOverlay').on('click', function() {
            $('#sidebar').removeClass('show');
            $(this).removeClass('show');
            $('body').removeClass('sidebar-open');
        });
    }

    function initializeSidebar() {
        $('.nav-link-custom').on('click', function(e) {
            e.preventDefault();
            
            $('.nav-link-custom').removeClass('active');
            
            $(this).addClass('active');
            
            const page = $(this).data('page');
            
            if (window.innerWidth <= 768) {
                $('#sidebar').removeClass('show');
                $('#sidebarOverlay').removeClass('show');
                $('body').removeClass('sidebar-open');
            }
            
            loadPageContent(page);
        });
    }

    function initializeSearch() {
        $('.search-input').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            console.log('Searching for:', searchTerm);
        });

        $('#tableSearch').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            $('#pesertaTable tr').each(function() {
                const rowText = $(this).text().toLowerCase();
                if (rowText.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    }

    function loadPageContent(page) {
        console.log('Loading page:', page);
        
        const pageTitle = {
            'dashboard': 'Dashboard',
            'peserta': 'Data Peserta',
            'finalis': 'Data Finalis',
            'eliminasi': 'Data Eliminasi',
            'pemenang': 'Tambah Pemenang',
            'pengumuman': 'Pengumuman',
            'datapemenang': 'Data Pemenang'
        };

        $('.page-title').text(pageTitle[page] || 'Dashboard');
        $('.page-subtitle').text(`Halaman ${pageTitle[page] || 'Dashboard'} - Indonesia Dream Talent 2025`);

        $('#mainContent').html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Memuat...</div>');

        fetch(`/table/${page}`)
            .then(response => {
                console.log('Response status:', response.status);
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: Halaman tidak ditemukan`);
                }
                return response.text();
            })
            .then(html => {
                console.log('HTML received:', html.substring(0, 100) + '...');
                
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const dataTable = tempDiv.querySelector('.data-table');

                if (!dataTable) {
                    console.error('HTML received:', html);
                    throw new Error("Konten tidak valid. Pastikan view berisi elemen dengan class 'data-table'");
                }

                $('#mainContent').html(dataTable.outerHTML);

                initializeDetailButtons();
                initializeDetailButtons2();
                initializeDetailButtons3();
                initializeDetailButtons4();


                
                console.log('Page loaded successfully');
            })
            .catch(err => {
                console.error('Load error:', err);
                $('#mainContent').html(`
                    <div class="alert alert-danger">
                        <h4>Gagal Memuat Halaman</h4>
                        <p>${err.message}</p>
                        <button class="btn btn-primary" onclick="loadPageContent('${page}')">
                            Coba Lagi
                        </button>
                    </div>
                `);
            });
    }

    function initializeDetailButtons() {
        $('.expand-btn').off('click').on('click', function() {
            var pesertaId = $(this).data('id');
            console.log('Detail button clicked for ID:', pesertaId);
            
            loadDetailPeserta3(pesertaId);
        });
    }



    function initializeDetailButtons3() {
        $('.expand-btn2').off('click').on('click', function() {
            var pesertaId = $(this).data('id');
            console.log('Detail button clicked for ID:', pesertaId);
            
            loadDetailPeserta(pesertaId);
        });
    }

    function initializeDetailButtons2() {
        $('.expand-btns').off('click').on('click', function () {
            var pesertaId = $(this).data('id');
            console.log('Detail button clicked for ID:', pesertaId);
            
            loadDetailPeserta2(pesertaId);
        });
    }

    function loadmodalPengumuman() {
    var modal = new bootstrap.Modal(document.getElementById('tambahPengumumanModal'));
        modal.show();
    }


    function initializeDetailButtons4() {
        document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('expand-btn4').addEventListener('click', function(e) {
            e.preventDefault();
            loadmodalPengumuman();
        });
    });
    }

   
        

    function loadDetailPeserta3(id) {
        var url = '/admin/peserta/' + id;

        $('body').append('<div id="loadingOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; display: flex; justify-content: center; align-items: center;"><div class="spinner-border text-light" role="status"><span class="sr-only">Loading...</span></div></div>');

        $.get(url, function(data) {
            $('#loadingOverlay').remove();

            if (data.link_vidio) {
                var youtubeVideoUrl = data.link_vidio;
                var videoId = extractYouTubeVideoId(youtubeVideoUrl);
                if (videoId) {
                    var embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                    $('#videoFrame').attr('src', embedUrl).show();
                } else {
                    $('#videoFrame').hide();
                }
            } else {
                $('#videoFrame').hide();
            }

            $('#details').html(`
                <table class="table table-bordered" style="font-size: 0.85em;">
                    <tr>
                        <td style="padding:4px 8px;"><strong>Foto Peserta:</strong></td>
                       <td style="padding:4px 8px;">
                        ${data.photo 
                            ? `<button id="btnShowPhoto" class="btn btn-outline-primary btn-sm" type="button" data-photo="/storage/${data.photo}">
                                <i class="fas fa-camera"></i> Lihat Foto Peserta
                            </button>` 
                            : 'N/A'}
                        </td>
                    </tr>

                     <tr>
                        <td style="padding:4px 8px;"><strong>Nomor Registrasi:</strong></td>
                        <td style="padding:4px 8px;">${data.noreg || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Nama Lengkap:</strong></td>
                        <td style="padding:4px 8px;">${data.nama_lengkap || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kategori Audisi:</strong></td>
                        <td style="padding:4px 8px;">${data.kategori_audisi || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kategori Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.kategori_peserta || 'N/A'}</td>
                    </tr>

                     <tr>
                        <td style="padding:4px 8px;"><strong>Nomor Handphone:</strong></td>
                        <td style="padding:4px 8px;">${data.no_wa || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Jenis Kelamin:</strong></td>
                        <td style="padding:4px 8px;">${data.jenis_kelamin || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Alamat Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.alamat || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Status Peserta:</strong></td>
                        <td style="padding:4px 8px;"><span class="badge ${getStatusBadgeClass(data.status)}">${data.status || 'N/A'}</span></td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Provinsi Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.provinsi || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kota Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.kota || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pekerjaan Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.pekerjaan || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Hobby Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.hobby || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pengalaman Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.pengalaman || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Nama Orangtua:</strong></td>
                        <td style="padding:4px 8px;">${data.nama_ortu || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pekerjaan Orangtua:</strong></td>
                        <td style="padding:4px 8px;">${data.pekerjaan_ortu || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Updated By :</strong></td>
                        <td style="padding:4px 8px;">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Catatan:</strong></td>
                        <td style="padding:4px 8px;">
                            <textarea id="note" name="note" rows="3" class="form-control">${data.note || ''}</textarea>
                        </td>
                    </tr>
                </table>
                <div class="button-container mt-3">
                    <button id="eliminasiBtn" class="btn btn-danger me-2" data-id="${id}">Eliminasi</button>
                    <button id="loloskanBtn" class="btn btn-success" data-id="${id}">Loloskan</button>
                </div>
            `);

            $('#eliminasiBtn').off('click').on('click', function() {
                updateStatus($(this).data('id'), 'eliminasi');
            });

            $('#loloskanBtn').off('click').on('click', function() {
                updateStatus($(this).data('id'), 'finalis');
            });

            $('#expandModal').modal('show');
            
        }).fail(function(xhr, status, error) {
            $('#loadingOverlay').remove();
            console.error('AJAX Error:', error);
            alert('Gagal memuat data peserta: ' + error);
        });
    }


    function loadDetailPeserta(id) {
 
        var pesertaData = {
            id: id,
            nama: $('button[data-id="'+id+'"]').data('nama') || 'Nama tidak ditemukan',
            no: $('button[data-id="'+id+'"]').data('no') || 'No tidak ditemukan'
        };
       
        $('#pesertaId').val(pesertaData.id);
        $('#pesertaNama').val(pesertaData.nama);
        $('#pesertaNo').val(pesertaData.no);
        $('#usersId').val(pesertaData.id);
        $('#juara').val('');
        $('#note').val('');
        $('#waMessage').val('');
       
        var modal = new bootstrap.Modal(document.getElementById('winnerModal'));
        modal.show();
       }

    function loadDetailPeserta2(id) {
        $.get('/admin/peserta/' + id, function(data) {
            console.log('Received data:', data);

            if (!data) {
                console.error('No data received for peserta ID:', id);
                return;
            }

            $('#loadingOverlay').remove();

            if (data.link_vidio) {
                var youtubeVideoUrl = data.link_vidio;
                var videoId = extractYouTubeVideoId(youtubeVideoUrl);
                if (videoId) {
                    var embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
                    $('#videoFrame2').attr('src', embedUrl).show();
                } else {
                    $('#videoFrame2').hide();
                }
            } else {
                $('#videoFrame2').hide();
            }

            // Fill data into table
            $('#details2').html(`
                <table class="table table-bordered" style="font-size: 0.85em;">
                    <tr>
                        <td style="padding:4px 8px;"><strong>Foto Peserta:</strong></td>
                         <td style="padding:4px 8px;">
                        ${data.photo 
                            ? `<button id="btnShowPhoto" class="btn btn-outline-primary btn-sm" type="button" data-photo="/storage/${data.photo}">
                                <i class="fas fa-camera"></i> Lihat Foto Peserta
                            </button>` 
                            : 'N/A'}
                        </td>
                    </tr>

                       <tr>
                        <td style="padding:4px 8px;"><strong>Nomor Registrasi:</strong></td>
                        <td style="padding:4px 8px;">${data.noreg || 'N/A'}</td>
                    </tr>

                    <tr>
                        <td style="padding:4px 8px;"><strong>Nama Lengkap:</strong></td>
                        <td style="padding:4px 8px;">${data.nama_lengkap || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kategori Audisi:</strong></td>
                        <td style="padding:4px 8px;">${data.kategori_audisi || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kategori Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.kategori_peserta || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Jenis Kelamin:</strong></td>
                        <td style="padding:4px 8px;">${data.jenis_kelamin || 'N/A'}</td>
                    </tr>

                          <tr>
                        <td style="padding:4px 8px;"><strong>Nomor Handphone:</strong></td>
                        <td style="padding:4px 8px;">${data.no_wa || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Alamat Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.alamat || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Status Peserta:</strong></td>
                        <td style="padding:4px 8px;"><span class="badge ${getStatusBadgeClass(data.status)}">${data.status || 'N/A'}</span></td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Provinsi Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.provinsi || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Kota Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.kota || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pekerjaan Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.pekerjaan || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Hobby Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.hobby || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pengalaman Peserta:</strong></td>
                        <td style="padding:4px 8px;">${data.pengalaman || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Nama Orangtua:</strong></td>
                        <td style="padding:4px 8px;">${data.nama_ortu || 'N/A'}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Pekerjaan Orangtua:</strong></td>
                        <td style="padding:4px 8px;">${data.pekerjaan_ortu || 'N/A'}</td>
                    </tr>

                    <tr>
                        <td style="padding:4px 8px;"><strong>Updated By :</strong></td>
                        <td style="padding:4px 8px;">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td style="padding:4px 8px;"><strong>Catatan:</strong></td>
                        <td style="padding:4px 8px;">
                            <textarea id="note2" name="note" rows="3" class="form-control" readonly>${data.note || ''}</textarea>
                        </td>
                    </tr>
                </table>
            `);

            $('#winnerModal2').modal('show');

        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error('Failed to load peserta data:', textStatus, errorThrown);
            alert('Gagal memuat data peserta');
        });
    }

    function extractYouTubeVideoId(url) {
        if (!url) return null;
        
        var videoId = null;
        var regex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|\S*\?v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        var match = url.match(regex);
        if (match) {
            videoId = match[1];
        }
        return videoId;
    }

    function getStatusBadgeClass(status) {
        switch (status) {
            case 'finalis':
                return 'badge-success';
            case 'eliminasi':
                return 'badge-danger';
            default:
                return 'badge-primary';
        }
    }

    function updateStatus(pesertaId, status) {
    const actionText = status === 'finalis' ? 'meloloskan' : 'mengeliminasi';

    if (!confirm(`Apakah Anda yakin ingin ${actionText} peserta ini?`)) {
        return;
    }

    const note = $('#note').val();
    const statusElement = $('#statusPeserta-' + pesertaId);
    const originalStatus = statusElement.text();
    statusElement.html('<i class="fas fa-spinner fa-spin"></i> Memproses...');

    // Get participant details from the table
    const namaPeserta = $('#details').find('td:contains("Nama Lengkap")').next().text().trim();
    const noWa = $('#details').find('td:contains("Nomor Handphone")').next().text().trim();
    
    $.ajax({
        url: '/admin/update-status/' + pesertaId,
        type: 'POST',
        data: {
            status: status,
            note: note,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            statusElement.text(status);
            statusElement.removeClass().addClass('badge ' + getStatusBadgeClass(status));
            alert(`Status peserta berhasil diubah menjadi ${status}`);
            
            $('#expandModal').modal('hide');
            
            let message;
            if (status === 'finalis') {
                message = `Halo ${namaPeserta},\n\nSelamat! Anda berhasil lulus seleksi dan akan melanjutkan ke stage selanjutnya.\n\nSalam,\nPanitia Indonesia Dream Talent`;
            } else if (status === 'eliminasi') {
                message = `Halo ${namaPeserta},\n\nMaaf, Anda tidak lulus dalam seleksi ini. Tetap semangat dan teruslah berlatih!\n\nSalam,\nPanitia Indonesia Dream Talent`;
            }
            
            // Use the captured WhatsApp number
            if (noWa && noWa !== 'N/A') {
                const whatsappUrl = `https://wa.me/${noWa}?text=${encodeURIComponent(message)}`;
                window.open(whatsappUrl, '_blank');
            }
            
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

    $(document).on('click', '#btnShowPhoto', function () {
        try {
            var photo = $(this).data('photo');
            console.log('Showing photo:', photo);
            
            $('#photoModalImg').attr('src', photo);
            $('#photoModal').modal('show');
            
            console.log('Photo modal shown successfully');
        } catch (error) {
            console.error('Error showing photo:', error);
            alert('Terjadi kesalahan saat menampilkan foto. Silakan coba lagi.');
        }
    });

    $(document).on('click', '#btnShowPhoto2', function () {
        try {
            var photo = $(this).data('photo');
            console.log('Showing photo:', photo);
            
            $('#photoModalImg').attr('src', photo);
            $('#photoModal').modal('show');
            
            console.log('Photo modal shown successfully');
        } catch (error) {
            console.error('Error showing photo:', error);
            alert('Terjadi kesalahan saat menampilkan foto. Silakan coba lagi.');
        }
    });

    $('#expandModal').on('hidden.bs.modal', function () {
        $('#videoFrame').attr('src', '').hide();
        $('#details').empty();
    });

    $('#winnerModal2').on('hidden.bs.modal', function () {
        $('#videoFrame2').attr('src', '').hide();
        $('#details2').empty();
    });

    $('#photoModal').on('hidden.bs.modal', function () {
        $('#photoModalImg').attr('src', '');
    });

    $(window).on('resize', function() {
        if (window.innerWidth > 768) {
            $('#sidebar').removeClass('show');
            $('#sidebarOverlay').removeClass('show');
            $('body').removeClass('sidebar-open');
        }
    });

  

  

 
</script>

</body>
