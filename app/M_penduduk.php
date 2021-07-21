<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_penduduk extends Model
{
	
    // protected $connection = 'mysql2';
    protected $table = 'data_kabupaten';
    public $timestamps = false;
    protected $fillable = ['nama_kabupaten','logo_kabupaten'];
}
