<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'surat_usaha';
    protected $fillable = ['tanggal_surat','keterangan_usaha','jenis_usaha','luas_lahan','tenaga_pembantu','alamat_usaha','nik','id_desa','status_surat','file_syarat','fungsi'];


  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}