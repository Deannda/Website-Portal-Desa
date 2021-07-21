<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    protected $table = 'surat_domisili';
    protected $fillable = ['tanggal_surat','tanggal_domisili','nik','status_surat','id_desa','file_syarat','fungsi'];


  	public function penduduk()
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
