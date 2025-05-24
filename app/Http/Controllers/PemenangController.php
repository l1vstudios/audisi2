<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemenangController extends Controller
{
    public function store(Request $request)
    {


        // dd($request->all());
        $request->validate([
            'users_id' => 'required|integer',
            'juara' => 'required|string',
            'note' => 'nullable|string',
            'wa_message' => 'required|string',
        ]);

        // Simpan data ke tb_pemenang
        DB::table('tb_pemenang')->insert([
            'users_id' => $request->users_id,
            'juara' => $request->juara,
            'note' => $request->note,
            'created_by' => Auth::id(),
        ]);

        // Update status di tb_audisi jadi 'pemenang'
        DB::table('tb_audisi')
            ->where('id', $request->users_id)
            ->update(['status' => 'pemenang']);

        // Kirim data WhatsApp ke frontend lewat session
        return redirect()->back()->with([
            'success' => 'Data pemenang berhasil disimpan.',
            'wa' => [
                'no' => $request->pesertaNo,
                'message' => $request->wa_message,
            ]
        ]);
    }
}
