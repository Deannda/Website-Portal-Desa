<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pindahnikah extends Model
{
    protected $table = 'surat_pindah_nikah';
    protected $fillable = ['tanggal_surat','lampiran','kepada','di','desa','kecamatan','kabupaten','nik','id_desa','status_surat'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}