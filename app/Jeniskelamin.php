<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'data_jeniskelamin';
    protected $fillable = ['jeniskelamin'];
}

