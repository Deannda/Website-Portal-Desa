<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statusperkawinan extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'data_statusperkawinan';
    protected $fillable = ['statusperkawinan'];
}
