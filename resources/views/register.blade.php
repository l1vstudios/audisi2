<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Form Registrasi Audisi Indonesia Dream Talent</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Tambahkan CSS Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    .checkbox-container {
      display: flex;
      align-items: flex-start;
      gap: 8px;
    }

    .checkbox-container input[type="checkbox"] {
      margin-top: 3px;
    }

    .checkbox-container label {
      margin-bottom: 0;
      display: inline;
      font-weight: normal;
    }

    body {
      background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px 20px;
    }
    
    .logo {
      display: block;
      margin: 0 auto 30px auto;
      max-width: 200px;
      width: 80%;
      height: auto;
    }

    /* Gaya untuk Select2 */
    .select2-container--default .select2-selection--single {
      background-color: rgba(0, 0, 0, 0.7);
      border: 1px solid #444;
      border-radius: 5px;
      height: 42px;
      color: white;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: white;
      line-height: 42px;
    }
    
    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 40px;
    }
    
    .select2-container--default .select2-search--dropdown .select2-search__field {
      background-color: #333;
      color: white;
      border: 1px solid #444;
    }
    
    .select2-container--default .select2-results__option {
      background-color: #222;
      color: white;
    }
    
    .select2-container--default .select2-results__option--highlighted {
      background-color: #ff6b00;
      color: white;
    }
    
    .select2-dropdown {
      background-color: #222;
      border: 1px solid #444;
    }
        
    .form-container {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 800px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      position: relative;
    }
    
    .form-title-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .form-title {
      color: #fff;
      font-size: 1.8rem;
      text-align: center;
      width: 100%;
    }
    
    .requirements-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: rgba(255, 107, 0, 0.2);
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 5px;
    }
    
    .requirements-title {
      color: #ff6b00;
      font-weight: bold;
      font-size: 1.2rem;
    }
    
    .toggle-icon {
      transition: transform 0.3s;
    }
    
    .requirements-box {
      background-color: rgba(255, 107, 0, 0.2);
      border-left: 4px solid #ff6b00;
      padding: 0 15px;
      margin-bottom: 30px;
      border-radius: 0 5px 5px 0;
      overflow: hidden;
      max-height: 0;
      transition: max-height 0.3s ease, padding 0.3s ease;
    }
    
    .requirements-box.expanded {
      max-height: 500px;
      padding: 15px;
    }
    
    .requirements-list {
      padding-left: 20px;
    }
    
    .requirements-list li {
      margin-bottom: 8px;
    }
    
    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }
    
    .form-col {
      flex: 1;
      min-width: 200px;
      margin: 5px;
    }
    
    .form-group {
      margin-bottom: 15px;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #ddd;
    }
    
    input[type="text"],
    input[type="date"],
    input[type="tel"],
    input[type="file"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
    }
    
    textarea {
      height: 80px;
      resize: vertical;
    }
    
    .radio-group {
      display: flex;
      gap: 15px;
      margin-top: 5px;
    }
    
    .vertical-radio-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-top: 5px;
    }
    
    .radio-option {
      display: flex;
      align-items: center;
    }
    
    .radio-option input {
      margin-right: 5px;
    }
    
    .checkbox-option {
      display: flex;
      align-items: center;
      margin-top: 5px;
    }
    
    .checkbox-option input {
      margin-right: 5px;
    }
    
    .divider {
      border-top: 1px dashed #555;
      margin: 20px 0;
    }
    
    .signature-row {
      display: flex;
      justify-content: space-between;
      margin-top: 30px;
    }
    
    .signature-box {
      text-align: center;
      width: 45%;
    }
    
    .signature-line {
      border-top: 1px solid #aaa;
      margin-top: 50px;
      padding-top: 5px;
    }
    
    .submit-btn {
      background-color: #ff6b00;
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1rem;
      margin-top: 20px;
      width: 100%;
      transition: background-color 0.3s;
    }
    
    .submit-btn:hover {
      background-color: #e05d00;
    }
    
    .required:after {
      content: " *";
      color: red;
    }
    
    .social-icons {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 15px;
      margin: 30px 0;
    }
    
    .social-icons a {
      color: #aaa;
      font-size: 1.5rem;
      transition: transform 0.3s;
    }
    
    .social-icons a:hover {
      transform: scale(1.2);
      color: #fff;
    }
    
    footer {
      font-size: 0.9rem;
      color: #aaa;
      margin-top: 20px;
      text-align: center;
    }
    
    @media (max-width: 600px) {
      .form-col {
        flex: 100%;
      }
      
      .signature-row {
        flex-direction: column;
      }
      
      .signature-box {
        width: 100%;
        margin-bottom: 20px;
      }
      
      .radio-group {
        flex-direction: column;
        gap: 8px;
      }
      
      .form-title {
        font-size: 1.5rem;
      }
      
      .requirements-title {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>
  
  <img src="https://assetscinetrons.b-cdn.net/LOGO%20IDT.png" alt="Logo" class="logo" />
  <div class="form-container">
    <div class="form-title-container">
      <h1 class="form-title">FORM REGISTRASI AUDISI INDONESIA DREAM TALENT</h1>
    </div>
    
    <div class="requirements-header" onclick="toggleRequirements()">
      <div class="requirements-title">PERSYARATAN PESERTA AUDISI:</div>
      <div class="toggle-icon" id="toggleIcon">▼</div>
    </div>
    
    <div class="requirements-box" id="requirementsBox">
      <ul class="requirements-list">
        <li>Pria dan Wanita serta berwarga Negara Indonesia</li>
        <li>Mengisi Formulir Pendaftaran melalui Website Panitia Pusat</li>
        <li>Sehat Jasmani dan Rohani</li>
        <li>Mengirimkan Video Sesuai yang di ikuti</li>
        <li>Melampirkan foto diri Close Up dan Seluruh Badan</li>
        <li>Bagi yang terpilih menjadi finais bersedia mengikuti karantina di Jakarta</li>
        <li>Melampirkan Surat ijin dari orang tua ataupun Wali</li>
        <li>Peserta wajib mentaati peraturan yang sudah ditetapkan oleh panitia</li>
        <li>Tidak sedang terikat kontrak</li>
        <li>Wajib Follow Media social dari panitia Indonesia Dream Talent</li>
      </ul>
    </div>
    
    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" id="registrationForm">
      @csrf

      @if(session('success'))
        <div class="alert alert-success" style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: 10px 15px; margin-bottom: 20px; border-radius: 4px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: 10px 15px; margin-bottom: 20px; border-radius: 4px;">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
      @endif

      <div class="form-row">
        <div class="form-col">
          <div class="form-group">
            <label for="provinsi" class="required">Provinsi</label>
            <select id="provinsi" name="provinsi" required class="select2-provinsi">
              <option value="" disabled selected>Pilih Provinsi</option>
              @foreach($provinces as $province)
                <option value="{{ $province->kode_provinsi }}">{{ $province->nama_provinsi }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-col">
          <div class="form-group">
            <label for="kota" class="required">Kota / Kabupaten</label>
            <select id="kota" name="kota" required disabled class="select2-kota">
              <option value="" disabled selected>Pilih Kota</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="form-col">
          <div class="form-group">
            <label class="required">KATEGORI AUDISI</label>
            <div class="vertical-radio-group">
              <div class="radio-option">
                <input type="radio" id="menyanyi" name="kategori_audisi" value="menyanyi" required>
                <label for="menyanyi">MENYANYI</label>
              </div>
              <div class="radio-option">
                <input type="radio" id="model" name="kategori_audisi" value="model" required>
                <label for="model">MODEL</label>
              </div>
              <div class="radio-option">
                <input type="radio" id="acting" name="kategori_audisi" value="acting" required>
                <label for="acting">ACTING</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-col">
          <div class="form-group">
            <label class="required">KATEGORI PESERTA</label>
            <div class="vertical-radio-group">
              <div class="radio-option">
                <input type="radio" id="belia" name="kategori_peserta" value="belia" required>
                <label for="belia">BELIA (5-10 TAHUN)</label>
              </div>
              <div class="radio-option">
                <input type="radio" id="remaja" name="kategori_peserta" value="remaja" required>
                <label for="remaja">REMAJA (11-16 TAHUN)</label>
              </div>
              <div class="radio-option">
                <input type="radio" id="dewasa" name="kategori_peserta" value="dewasa" required>
                <label for="dewasa">DEWASA (17-27 TAHUN)</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="divider"></div>

      <div class="form-group">
        <label for="nama" class="required">NAMA LENGKAP</label>
        <input type="text" id="nama" name="nama" required>
      </div>

      <div class="form-group">
        <label for="photo" class="required">Upload Foto Diri</label>
        <p style="font-size: 0.9em; color: white; margin-bottom: 5px;">
          *Unggah 1 foto : <strong>Seluruh Badan</strong> (format JPG/PNG, maksimal 2MB)
        </p>
        <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" required>
      </div>

      <div class="form-group">
        <label for="link_vidio" class="required">Link Video Kontes (Diupload Di Youtube)</label>
        <p style="font-size: 0.9em; color: white; margin-bottom: 5px;">
          *Link video <strong>wajib</strong> berupa link dari <strong>YouTube</strong>
        </p>
        <input type="text" id="link_vidio" name="link_vidio" required>
      </div>

      <div class="form-group">
        <label class="required">JENIS KELAMIN</label>
        <div class="radio-group">
          <div class="radio-option">
            <input type="radio" id="wanita" name="jenis_kelamin" value="wanita" required>
            <label for="wanita">WANITA</label>
          </div>
          <div class="radio-option">
            <input type="radio" id="pria" name="jenis_kelamin" value="pria" required>
            <label for="pria">PRIA</label>
          </div>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-col">
          <div class="form-group">
            <label for="tempat_lahir" class="required">TEMPAT LAHIR</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" required>
          </div>
        </div>
        <div class="form-col">
          <div class="form-group">
            <label for="tanggal_lahir" class="required">TANGGAL LAHIR</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label for="alamat" class="required">ALAMAT</label>
        <textarea id="alamat" name="alamat" required></textarea>
      </div>
      
      <div class="form-group">
        <label for="telepon" class="required">NO TELEPON/WA</label>
        <input type="tel" id="telepon" name="telepon" required>
      </div>
      
      <div class="form-group">
        <label class="required">PEKERJAAN</label>
        <div class="radio-group">
          <div class="radio-option">
            <input type="radio" id="pelajar" name="pekerjaan" value="pelajar" required>
            <label for="pelajar">PELAJAR</label>
          </div>
          <div class="radio-option">
            <input type="radio" id="mahasiswa" name="pekerjaan" value="mahasiswa" required>
            <label for="mahasiswa">MAHASISWA</label>
          </div>
          <div class="radio-option">
            <input type="radio" id="karyawan" name="pekerjaan" value="karyawan" required>
            <label for="karyawan">KARYAWAN</label>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label class="required" for="institusi">NAMA SEKOLAH / UNIVERSITAS / PERUSAHAAN</label>
        <input type="text" id="institusi" name="institusi" required>
      </div>
      
      <div class="form-group">
        <label for="hobby" class="required">HOBBY</label>
        <input type="text" id="hobby" name="hobby" required>
      </div>
      
      <div class="form-group">
        <label class="required" for="pengalaman">PENGALAMAN / PRESTASI</label>
        <textarea id="pengalaman" name="pengalaman" required></textarea>
      </div>
      
      <div class="form-group">
        <label class="required" for="bahasa">BAHASA YANG DIKUASAI</label>
        <input type="text" id="bahasa" name="bahasa" required>
      </div>
      
      <div class="divider"></div>
      
      <h3 style="margin-bottom: 15px;">DATA ORANG TUA / WALI</h3>
      
      <div class="form-group">
        <label class="required" for="nama_ortu">NAMA ORANG TUA / WALI</label>
        <input type="text" id="nama_ortu" name="nama_ortu" required>
      </div>
      
      <div class="form-group">
        <label class="required" for="telepon_ortu">NO TELEPON/WA</label>
        <input type="tel" id="telepon_ortu" name="telepon_ortu" required>
      </div>
      
      <div class="form-group">
        <label class="required" for="pekerjaan_ortu">PEKERJAAN</label>
        <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" required>
      </div>
      
      <div class="form-group">
        <div class="checkbox-container">
          <input type="checkbox" id="persetujuan" name="persetujuan" required>
          <label for="persetujuan" class="required">Dengan ini saya mendaftarkan diri untuk mengikuti audisi The Golden Talent Hunt 2025, dan bersedia mengikuti peraturan dan ketentuan yang berlaku, serta diijinkan oleh orang Tua / Wali saya</label>
        </div>
      </div>
      
      <button type="submit" class="submit-btn">DAFTAR SEKARANG</button>
    </form>
  </div>
  
  <div class="social-icons">
    <span>Ikuti Media Sosial Kami:</span>
    <a href="https://www.instagram.com/cinetron.id/" target="_blank"><i class="bi bi-instagram"></i></a>
    <a href="https://tiktok.com/@cinetron.id" target="_blank"><i class="bi bi-tiktok"></i></a>
  </div>
  
  <footer style="color: white; text-decoration: none;">
    &copy; 2025 <a href="https://audisi-production.up.railway.app/audisi" style="color: white; text-decoration: none;">Indonesia Dream Talent</a>. All rights reserved.
  </footer>

  <!-- Tambahkan jQuery dan Select2 JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    // Inisialisasi Select2 untuk provinsi dan kota
    $(document).ready(function() {
      $('.select2-provinsi').select2({
        placeholder: "Pilih Provinsi",
        allowClear: true
      });
      
      $('.select2-kota').select2({
        placeholder: "Pilih Kota",
        allowClear: true,
        disabled: true
      });
    });

    function toggleRequirements() {
      const requirementsBox = document.getElementById('requirementsBox');
      const toggleIcon = document.getElementById('toggleIcon');
      
      requirementsBox.classList.toggle('expanded');
      
      if (requirementsBox.classList.contains('expanded')) {
        toggleIcon.textContent = '▲';
      } else {
        toggleIcon.textContent = '▼';
      }
    }
    
    // Event handler untuk perubahan provinsi
    $('#provinsi').on('change', function() {
      var provinsiId = this.value;
      var kotaSelect = $('#kota');
      
      if (provinsiId) {
        // Kirim permintaan AJAX untuk mendapatkan kota
        fetch('/get-cities-by-province', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({ provinsi_id: provinsiId })
        })
        .then(response => response.json())
        .then(data => {
          // Kosongkan dan aktifkan dropdown kota
          kotaSelect.empty().append('<option value="" disabled selected>Pilih Kota</option>');
          
          if (data.length > 0) {
            // Tambahkan opsi kota
            data.forEach(function(city) {
              kotaSelect.append(new Option(city.nama_kabkota, city.id));
            });
            
            // Aktifkan dan inisialisasi ulang Select2
            kotaSelect.prop('disabled', false).trigger('change');
            $('.select2-kota').select2({
              placeholder: "Pilih Kota",
              allowClear: true
            });
          } else {
            kotaSelect.prop('disabled', true).trigger('change');
          }
        })
        .catch(error => console.error('Error:', error));
      } else {
        kotaSelect.empty().append('<option value="" disabled selected>Pilih Kota</option>');
        kotaSelect.prop('disabled', true).trigger('change');
      }
    });

    // Validasi file upload
    document.getElementById('registrationForm').addEventListener('submit', function(e) {
      const fileInput = document.getElementById('photo');
      const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
      const maxSize = 2 * 1024 * 1024; // 2MB
      
      if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const fileName = file.name;
        
        // Validasi ekstensi file
        if (!allowedExtensions.exec(fileName)) {
          e.preventDefault();
          Swal.fire({
            icon: 'error',
            title: 'Format File Tidak Valid',
            text: 'Maaf, hanya file dengan format JPG, JPEG, atau PNG yang diperbolehkan.',
            confirmButtonColor: '#ff6b00'
          });
          fileInput.value = '';
          return false;
        }
        
        // Validasi ukuran file
        if (file.size > maxSize) {
          e.preventDefault();
          Swal.fire({
            icon: 'error',
            title: 'Ukuran File Terlalu Besar',
            text: 'Ukuran file maksimal 2MB.',
            confirmButtonColor: '#ff6b00'
          });
          fileInput.value = '';
          return false;
        }
      }
    });

    // Validasi saat memilih file
    document.getElementById('photo').addEventListener('change', function(e) {
      const fileInput = e.target;
      const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
      const maxSize = 2 * 1024 * 1024; // 2MB
      
      if (fileInput.files.length > 0) {
        const file = fileInput.files[0];
        const fileName = file.name;
        
        if (!allowedExtensions.exec(fileName)) {
          Swal.fire({
            icon: 'error',
            title: 'Format File Tidak Valid',
            text: 'Maaf, hanya file dengan format JPG, JPEG, atau PNG yang diperbolehkan.',
            confirmButtonColor: '#ff6b00'
          });
          fileInput.value = '';
          return false;
        }
        
        if (file.size > maxSize) {
          Swal.fire({
            icon: 'error',
            title: 'Ukuran File Terlalu Besar',
            text: 'Ukuran file maksimal 2MB.',
            confirmButtonColor: '#ff6b00'
          });
          fileInput.value = '';
          return false;
        }
      }
    });
  </script>
</body>
</html>