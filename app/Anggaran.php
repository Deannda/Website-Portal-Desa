<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'data_anggaran';
    protected $fillable = ['id_desa' ,'tahun_anggaran','detail'];

  	public function desa() 
	    {
	        return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	    }

	 //    public function getCreatedAtAttribute()
		// {
		//     return \Carbon\Carbon::parse($this->attributes['created_at'])
		//        ->format('d, M Y H:i');
		// }

		// public function getUpdatedAtAttribute()
		// {
  //  		 return \Carbon\Carbon::parse($this->attributes['updated_at'])
  //  	    ->diffForHumans();
		// }
}

