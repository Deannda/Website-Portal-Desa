<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	
    public function artikel() 
	    {
	        return $this->hasMany(Artikel::class,'id_artikel','id_artikel'); 
	    }

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
}
