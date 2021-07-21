<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'artikel';
    protected $fillable = ['id_desa', 'judul', 'isi', 'gambar'];

  	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }
}

