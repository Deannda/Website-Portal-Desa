<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belumnikah extends Model
{
    protected $table = 'surat_belum_nikah';
    protected $fillable = ['tanggal_surat','ayah','ibu','saksi1','saksi2','nama_pasangan','hubungan','nik','status_surat','file_syarat','id_desa'];

  	public function penduduk()
	    {
	        return $this->hasMany(Suratimb::class,'nik','nik');
	    }
		public function saksike1() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi1');
	    }
	public function saksike2() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','saksi2');
	    }

}