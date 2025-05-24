<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_audisi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kota',
        'provinsi',
        'kategori_audisi',
        'link_vidio',
        'kategori_peserta',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'photo',
        'note',
        'created_by',
        'noreg',


        // 'agama',
        'alamat',
        'no_wa',
        'pekerjaan',
        'hobby',
        'nama_sekolah',
        'pengalaman',
        'bahasa_yangdisukai',
        'nama_ortu',
        'telepon_ortu',
        'pekerjaan_ortu',
        'created_by'
    ];
}