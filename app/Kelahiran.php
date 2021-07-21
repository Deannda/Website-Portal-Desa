<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = 'surat_kelahiran';
    protected $fillable = ['tanggal_surat','tanggal_lahir','tempat_lahir','ayah','ibu','anak','nik','id_desa','status_surat'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

  	public function ayahh() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ayah');
	    }

  	public function ibuu() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ibu');
	    }

}