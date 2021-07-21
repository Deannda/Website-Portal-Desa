<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'data_agama';
    protected $fillable = ['agama'];
}
