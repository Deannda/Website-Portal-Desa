<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situ extends Model
{
    protected $table = 'surat_situ';
    protected $fillable = ['tanggal_surat','lampiran','status_surat','alamat_usaha','luas_usaha','merek_usaha','ttd','nik','id_desa','file_syarat'];


  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
