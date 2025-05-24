<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true" style="z-index: 9999 !important;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="photoModalLabel">Foto Peserta</h5>
        <button type="button" class="btn-close-custom" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="photoModalImg" src="/placeholder.svg" alt="Foto Peserta" style="max-width: 100%; max-height: 400px; border-radius: 8px;">
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal Detail Peserta -  -->
<div class="modal fade" id="winnerModal2" tabindex="-1" role="dialog" aria-labelledby="winnerModal2Label" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="winnerModal2Label">Detail Peserta</h5>
        <button type="button" class="btn-close-custom" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div style="aspect-ratio: 4 / 3; width: 100%;">
              <iframe id="videoFrame2" allowfullscreen style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
          </div>
          <div class="col-md-6">
            <div id="details2"></div>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Main Navbar -->
<nav class="main-navbar">
    <div class="navbar-brand">
        <img src="https://assetscinetrons.b-cdn.net/LOGO%20IDT.png" alt="IDT Logo">
        <span>IDT</span>
    </div>

    <div class="navbar-search">
        <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari peserta, pengumuman...">
        </div>
    </div>

    <div class="navbar-actions">
        <button class="navbar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="profile-dropdown" id="profileDropdown">
            <a href="#" class="profile-trigger">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Profile" class="profile-avatar">
                <span class="profile-name">Admin User</span>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            
            <div class="dropdown-menu-custom">
                <div style="height: 1px; background: #eee; margin: 5px 0;"></div>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

                <a href="#" class="dropdown-item-custom" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar-wrapper" id="sidebar">
    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="#" class="nav-link-custom active" data-page="dashboard">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <span class="nav-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link-custom" data-page="peserta">
                <i class="fas fa-users nav-icon"></i>
                <span class="nav-title">Data Peserta Audisi</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link-custom" data-page="finalis">
                <i class="fas fa-star nav-icon"></i>
                <span class="nav-title">Data Finalis</span>
            </a>
        </li>

        <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="pemenang">
                    <i class="fas fa-trophy nav-icon"></i>
                    <span class="nav-title">Tambah Pemenang</span>
                </a>
            </li>
        
        @if(auth()->user()->role === 'admin')
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="datapemenang">
                    <i class="fas fa-trophy nav-icon"></i>
                    <span class="nav-title">Data Pemenang</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="pemenang">
                    <i class="fas fa-trophy nav-icon"></i>
                    <span class="nav-title">Tambah Pemenang</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link-custom" data-page="pengumuman">
                    <i class="fas fa-bullhorn nav-icon"></i>
                    <span class="nav-title">Pengumuman</span>
                </a>
            </li>
        @endif
    </ul>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="main-content" id="mainContent">
    <div class="page-header fade-in">
        <h1 class="page-title">Selamat Datang</h1>
        <p class="page-subtitle">Dashboard Admin - Indonesia Dream Talent 2025</p>
    </div>


    <div class="row">
    <div class="col-md-4">
        <div class="card card-stats mb-3" style="height: 120px; background-color: #17a2b8; color: #fff;">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-users fa-3x" style="opacity: 0.5;"></i>
                </div>
                <div class="d-flex justify-content-between w-100">
                    <div>
                        <h5 class="card-title">Total Peserta</h5>
                    </div>
                    <div>
                        <h2><?php echo $total_peserta; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats mb-3" style="height: 120px; background-color: #28a745; color: #fff;">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-trophy fa-3x" style="opacity: 0.5;"></i>
                </div>
                <div class="d-flex justify-content-between w-100">
                    <div>
                        <h5 class="card-title">Finalis</h5>
                    </div>
                    <div>
                        <h2><?php echo $total_finalis; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-stats mb-3" style="height: 120px; background-color: #dc3545; color: #fff;">
            <div class="card-body d-flex align-items-center">
                <div class="mr-3">
                    <i class="fas fa-times fa-3x" style="opacity: 0.5;"></i>
                </div>
                <div class="d-flex justify-content-between w-100">
                    <div>
                        <h5 class="card-title">Eliminasi</h5>
                    </div>
                    <div>
                        <h2><?php echo $total_eliminasi; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
