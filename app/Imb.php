<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imb extends Model
{
    protected $table = 'surat_imb';
    protected $fillable = ['tanggal_surat','lampiran','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk()
	    {
	        return $this->hasMany(Suratimb::class,'nik','nik');
	    }

}