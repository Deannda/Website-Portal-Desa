<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suarawarga extends Model
{
	protected $table = 'suara_warga';
	protected $fillable = ['nik','id_desa','isi_tanggapan'];

	public function desa() 
	{
		return $this->hasMany(Desa::class,'id_desa','id_desa'); 
	}

	public function penduduk() 
	{
		return $this->hasMany(Penduduk::class,'nik','nik'); 
	}

	
}
