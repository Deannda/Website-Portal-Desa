<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahliwaris extends Model
{
    protected $table = 'surat_ahliwaris';
    protected $fillable = ['tanggal_surat','keterangan','id_kk','nik','id_desa','status_surat'];

    public function kk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'id_kk','id_kk');
	    }
  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}