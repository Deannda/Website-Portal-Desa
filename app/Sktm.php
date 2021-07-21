<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $table = 'surat_sktm_bdt';
    protected $fillable = ['tanggal_surat','orang_tua','petugas','fungsi','nik','id_desa','status_surat','file_syarat'];


  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','orang_tua');
	    }
}
