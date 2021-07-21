<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kewarganegaraan extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'data_kewarganegaraan';
    protected $fillable = ['kewarganegaraan'];
}
