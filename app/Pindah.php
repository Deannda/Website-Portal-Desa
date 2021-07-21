<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    protected $table = 'surat_pindah';
    protected $fillable = ['tanggal_surat','kepala_keluarga','alamat_tujuan_pindah','jumlah_keluarga_pindah','anggota_keluarga_pindah','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','kepala_keluarga');
	    }

}
