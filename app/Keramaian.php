<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keramaian extends Model
{
    protected $table = 'surat_keramaian';
    protected $fillable = ['tanggal_surat','lampiran','kepada','di','acara','hari_tanggal','waktu','tempat','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk() 
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}