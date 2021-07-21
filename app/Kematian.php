<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
	protected $table = 'surat_kematian';
	protected $fillable = ['tanggal_surat','tanggal_kematian','pasangan','tempat_kematian','sebab','id_kk','nik','status_surat','id_desa','file_syarat'];

	public function kk() 
	{
		return $this->hasMany(Kk::class,'id_kk','id_kk');
	}
	public function penduduk()
	{
		return $this->hasMany(Penduduk::class,'nik','nik');
	}
	public function pasangannn()
	{
		return $this->hasMany(Penduduk::class,'nik','pasangan');
	}

}
