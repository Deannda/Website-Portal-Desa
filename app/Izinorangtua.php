<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Izinorangtua extends Model
{
    protected $table = 'surat_izin_orangtua';
    protected $fillable = ['tanggal_surat','ayah','ibu','nama_pasangan','bin_binti','nik_pasangan','tempat_lahir','tanggal_lahir','kewarganegaraan','agama','pekerjaan','alamat','nik','status_surat','file_syarat','id_desa'];

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