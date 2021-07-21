<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	// protected $connection ='mysql2';
    protected $table = 'agenda_kampung';
    protected $fillable = ['id_desa', 'agenda', 'tempat_pelaksanaan', 'waktu_pelaksanaan'];

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

