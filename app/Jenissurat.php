<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenissurat extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'jenis_surat';
    protected $fillable = ['nama_surat'];
}