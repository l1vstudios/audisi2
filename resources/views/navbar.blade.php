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
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="https://assetscinetrons.b-cdn.net/LOGO%20IDT.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="https://assetscinetrons.b-cdn.net/LOGO%20IDT.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
            <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logoutForm').submit();">
                    <i class="ti-power-off text-primary"></i>
                    Logout
                </a>
            </div>
          </li>
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
     

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" id="dashboardLink">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
      
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" id="dataPesertaLink">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Peserta</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" id="dataFinalisLink">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Finalis</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" id="dataPemenangLink">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Data Pemenang</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" id="pengumumanLink">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Pengumuman</span>
            </a>
          </li>
        </ul>
      </nav>

      