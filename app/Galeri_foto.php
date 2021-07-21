<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri_foto extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'galeri_foto';
    protected $fillable = ['foto', 'id_desa', 'slider'];

  	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }
}

