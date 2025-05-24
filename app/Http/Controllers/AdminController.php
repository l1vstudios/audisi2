<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalFinalis = DB::table('tb_audisi')->where('status', 'finalis')->count();
    
        $totalEliminasi = DB::table('tb_audisi')->where('status', 'eliminasi')->count();
    
        $totalBlacklist = DB::table('tb_audisi')->where('status', 'blacklist')->count();

        $totalPeserta = DB::table('tb_audisi')->count();

    
        $data_audisi = DB::table('tb_audisi')->get();
    
        return view('admin', compact('data_audisi', 'totalFinalis', 'totalPeserta', 'totalEliminasi', 'totalBlacklist'));
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
        //
    }


    public function dashboard()
    {


        $total_peserta = DB::table('tb_audisi')->count();
        $total_finalis = DB::table('tb_audisi')->where('status', 'finalis')->count();
        $total_eliminasi = DB::table('tb_audisi')->where('status', 'eliminasi')->count();
        $data_audisi = DB::table('tb_audisi')->get();


        return view('dashboard', compact('data_audisi','total_peserta','total_finalis','total_eliminasi'));

    }



    public function login(Request $request)
    {
        return view('login');

    }


    public function regisJuri(Request $request)
    {
        return view('regisjuri');

    }


    public function registerjuri(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        DB::table('users')->insert([
            'email' => $validated['email'],
            'username' => $validated['username'],
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('login')->with('success', 'Berhasil register, silakan login.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peserta = DB::table('tb_audisi')->where('id', $id)->first();
        
        if ($peserta) {
            $provinsi = DB::table('masterdata_provinsi')
            ->where('kode_provinsi', $peserta->provinsi)
            ->value('nama_provinsi');

            $kota = DB::table('masterdata_kabkota')
                ->where('id', $peserta->kota)
                ->value('nama_kabkota');
            return response()->json([
                'nama_lengkap' => $peserta->nama_lengkap,
                'kategori_audisi' => $peserta->kategori_audisi,
                'kategori_peserta' => $peserta->kategori_peserta,
                'jenis_kelamin' => $peserta->jenis_kelamin,
                'alamat' => $peserta->alamat,
                'status' => $peserta->status,
                'no_wa' => $peserta->no_wa,
                'photo' => $peserta->photo,
                'note' => $peserta->note,
                'noreg' => $peserta->noreg,



                
                'provinsi' => $provinsi,
                'kota' => $kota,
                'pekerjaan' => $peserta->pekerjaan,
                'hobby' => $peserta->hobby,
                'pengalaman' => $peserta->pengalaman,
                'nama_ortu' => $peserta->nama_ortu,
                'pekerjaan_ortu' => $peserta->pekerjaan_ortu,










                'link_vidio' => $peserta->link_vidio 
            ]);

            // dd($request->all());
        } else {
            return response()->json(['message' => 'Peserta not found'], 404);
        }
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminModel $adminModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:finalis,eliminasi',
        ]);

        $updated = DB::table('tb_audisi')
        ->where('id', $id)
        ->update([
            'status' => $request->status,
            'created_by' => Auth::id(),
            'note' => $request->note,
        ]);
    
        
        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'Status peserta berhasil diperbarui',
                'status' => $request->status
                
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status peserta'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminModel  $adminModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminModel $adminModel)
    {
        //
    }
}
