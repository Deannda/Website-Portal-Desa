<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_artikel extends Model
{
	
	// protected $connection ='mysql2';
	 protected $table = 'komentar_artikel';
    protected $fillable = ['id_artikel','nama','email','isi_komentar'];


	 public function artikel() 
	    {
	        return $this->hasMany(Artikel::class,'id_artikel','id_artikel'); 
	    }
}
