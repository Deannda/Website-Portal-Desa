<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalan extends Model
{
    protected $table = 'surat_jalan';
    protected $fillable = ['tanggal_surat','desa','kecamatan','kabupaten','provinsi','tujuan','jumlah_pengikut','pengikut','nik','status_surat','id_desa','file_syarat'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}
