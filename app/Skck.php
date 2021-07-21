<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    protected $table = 'surat_skck';
    protected $fillable = ['tanggal_surat','lampiran','fungsi','nik','id_desa','status_surat','file_syarat'];


  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
