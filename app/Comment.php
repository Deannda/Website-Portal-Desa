<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	
	// protected $connection ='mysql2';
	 protected $table = 'komentar';
    protected $fillable = ['keterangan','nama','email','isi_komentar'];

}
