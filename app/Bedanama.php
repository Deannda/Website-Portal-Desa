<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bedanama extends Model
{
    protected $table = 'surat_beda_nama';
    protected $fillable = ['tanggal_surat','keterangan_kesalahan','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}