<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemenangController;



Route::get('/audisi', [RegisterController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::get('/regisjuri', [AdminController::class, 'regisJuri']);
Route::post('/registerjuri', [AdminController::class, 'registerjuri'])->name('registerjuri');


Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/peserta/{id}', [AdminController::class, 'show']);
    Route::post('/admin/update-status/{id}', [AdminController::class, 'updateStatus']);
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/table/{page}', function ($page) {
        // Debug: Log parameter yang diterima
        \Log::info("Route /table/{page} dipanggil dengan parameter: " . $page);
        
        try {
            if ($page == 'finalis') {
                $data = DB::table('tb_audisi')->where('status', 'finalis')->get();
                \Log::info("Data finalis ditemukan: " . $data->count() . " records");
                
                // Pastikan view ada
                if (!view()->exists('tables.finalis')) {
                    \Log::error("View tables.finalis tidak ditemukan");
                    return response('View finalis tidak ditemukan', 404);
                }
                
                return view('tables.finalis', compact('data'));
            }


            if ($page == 'datapemenang') {
                $data = DB::table('tb_audisi')->where('status', 'pemenang')->get();
                
                // Pastikan view ada
                if (!view()->exists('tables.pemenang')) {
                    \Log::error("View tables.pemenang tidak ditemukan");
                    return response('View Pemenang tidak ditemukan', 404);
                }
                
                return view('tables.datapemenang', compact('data'));
            }
            
            if ($page == 'eliminasi') {
                $data = DB::table('tb_audisi')->where('status', 'eliminasi')->get();
                \Log::info("Data eliminasi ditemukan: " . $data->count() . " records");
                
                if (!view()->exists('tables.eliminasi')) {
                    \Log::error("View tables.eliminasi tidak ditemukan");
                    return response('View eliminasi tidak ditemukan', 404);
                }
                
                return view('tables.eliminasi', compact('data'));
            }


            if ($page == 'pengumuman') {
                $data = DB::table('tb_pengumuman')->get();
                \Log::info("Data eliminasi ditemukan: " . $data->count() . " records");
                
                if (!view()->exists('tables.pengumuman')) {
                    \Log::error("View tables.pengumuman tidak ditemukan");
                    return response('View pengumuman tidak ditemukan', 404);
                }
                
                return view('tables.pengumuman', compact('data'));
            }

            if ($page == 'dashboard') {
                $data_audisi = DB::table('tb_audisi')->get();
                \Log::info("Data eliminasi ditemukan: " . $data_audisi->count() . " records");
                
                if (!view()->exists('dashboard')) {
                    \Log::error("View dashboard tidak ditemukan");
                    return response('View dashboard tidak ditemukan', 404);
                }
                
                return view('dashboard', compact('data_audisi'));
            }
            
            if ($page == 'peserta') {
                $data = DB::table('tb_audisi')->get();
                \Log::info("Data peserta ditemukan: " . $data->count() . " records");
                
                // Pastikan view ada
                if (!view()->exists('tables.peserta')) {
                    \Log::error("View tables.peserta tidak ditemukan");
                    return response('View peserta tidak ditemukan', 404);
                }
                
                return view('tables.peserta', compact('data'));
            }


            if ($page == 'pemenang') {
                $data = DB::table('tb_audisi')->where('status', 'finalis')->get();
                \Log::info("Data peserta ditemukan: " . $data->count() . " records");
                
                // Pastikan view ada
                if (!view()->exists('tables.pemenang')) {
                    \Log::error("View tables.pemenang tidak ditemukan");
                    return response('View pemenang tidak ditemukan', 404);
                }
                
                return view('tables.pemenang', compact('data'));
            }
            
            // Jika page tidak cocok dengan kondisi di atas
            \Log::warning("Parameter page tidak dikenali: " . $page);
            return response('Halaman tidak ditemukan', 404);
            
        } catch (\Exception $e) {
            \Log::error("Error di route /table/{page}: " . $e->getMessage());
            return response('Terjadi kesalahan: ' . $e->getMessage(), 500);
        }
    });
    
   



});
Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
Route::post('/pemenang/store', [PemenangController::class, 'store'])->name('pemenang.store');
Route::post('/mfh', [RegisterController::class, 'store'])->name('register.store');
Route::post('/get-cities-by-province', [RegisterController::class, 'getCitiesByProvince']);