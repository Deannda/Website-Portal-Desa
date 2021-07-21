<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    protected $table = 'surat_profesi';
    protected $fillable = ['tanggal_surat','nipnik','ketprof','fungsi','nik','status_surat','id_desa'];

  	public function penduduk() //fungsinya untuk merelasikan/memanggil data kabupaten dengan kecamatan
	    {
	        return $this->hasMany(Penduduk::class,'nik','nik');
	    }

}