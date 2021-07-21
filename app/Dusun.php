<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    protected $table = 'data_dusun';
    protected $fillable = ['id_desa','nama_dusun','kepala_dusun','jumlah_rt','jumlah_kk','jumlah_penduduk'];

   
	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }
	
}


