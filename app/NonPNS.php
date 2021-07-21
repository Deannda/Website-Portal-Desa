<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonPNS extends Model
{
    protected $table = 'surat_nonpns';
    protected $fillable = ['tanggal_surat','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}