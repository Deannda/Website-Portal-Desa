<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengantarnikah extends Model
{
    protected $table = 'surat_pengantar_nikah';
    protected $fillable = ['tanggal_surat','ayah','ibu','nik','nama_pasangan_terdahulu','id_desa','status_surat','file_syarat'];

  	public function penduduk()
	    {
	        return $this->hasMany(Suratimb::class,'nik','nik');
	    }
	public function ayahhh() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ayah');
	    }
	public function ibuuu() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','ibu');
	    }
}