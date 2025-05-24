<?php

namespace App\Http\Controllers;

use App\Models\RegisterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = DB::table('masterdata_provinsi')->get();
        return view('register', compact('provinces'));
    }



    public function getCitiesByProvince(Request $request)
    {
        $provinceId = $request->input('provinsi_id'); 
        
        $cities = DB::table('masterdata_kabkota')
                    ->where('kode_provinsi', $provinceId)
                    ->get();

        return response()->json($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validasi request
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Proses upload foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time().'.'.$photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('uploads/photos', $photoName, 'public');
        } else {
            $photoPath = null;
        }
        $noreg = time() . rand(100, 999);
        $audisiData = [
            'kota' => $request->kota,
            'noreg' => $noreg,

            'provinsi' => $request->provinsi,
            'kategori_audisi' => $request->kategori_audisi,
            'link_vidio' => $request->link_vidio,
            'photo' => $photoPath,
            'created_by' => 0,
            'note' => 'Belum Ada',
            'kategori_peserta' => $request->kategori_peserta,
            'nama_lengkap' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_wa' => $request->telepon,
            'pekerjaan' => $request->pekerjaan,
            'nama_sekolah' => $request->institusi,
            'hobby' => $request->hobby,
            'pengalaman' => $request->pengalaman,
            'bahasa_yangdisukai' => $request->bahasa,
            'nama_ortu' => $request->nama_ortu,
            'telepon_ortu' => $request->telepon_ortu,
            'pekerjaan_ortu' => $request->pekerjaan_ortu,
        ];
    
        try {
            $audisi = \App\Models\RegisterModel::create($audisiData);
            return redirect()->back()
            ->with('success', "Pendaftaran berhasil! Simpan Nomor Registrasi Anda: {$noreg} untuk melihat status.");
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.')->withInput();
        }
    }

    /**
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterModel $registerModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterModel $registerModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterModel $registerModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterModel  $registerModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterModel $registerModel)
    {
        //
    }
}
