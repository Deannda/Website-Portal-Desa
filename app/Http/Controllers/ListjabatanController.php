<?php

namespace App\Http\Controllers;

use App\Kabupaten;
use App\Kecamatan;
use App\Kk;
use Illuminate\Http\Request;
use App\Penduduk;
use App\Golongandarah;
use App\Agama;
use App\Jeniskelamin;
use App\Kewarganegaraan;
use App\Pekerjaan;
use App\Pendidikanterakhir;
use App\Hubungankeluarga;
use App\Statusperkawinan;
use App\Desa;
use App\User;
use App\Jabatan;
use App\Tupoksi;
use Session;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class ListjabatanController extends Controller
{

    public function index()
    {
        //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        $list = Jabatan::all();
        // $dataJabatan = Tupoksi::where('id_desa','=',auth()->user()->id_desa)->with('jabatan')->get();
         return view ('admindesa/Listjabatan',['listjabatan' => $list]);

    }
 public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        
        // $this->authorize('isDesa');
            # code...
            Jabatan::create([
                // 'id_desa' => auth()->user()->id_desa,
                // 'id_jabatan' => $request['id_jabatan'],
                'jabatan' => $request['nama'],
                
            ]);
        return redirect('ListJabatan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');
        
        $jabatan = Jabatan::where('id_jabatan','=',$id);

        $jabatan->update([
            'jabatan' => $request['nama'],
        ]);
        return redirect('ListJabatan');
    }

     public function hapus($id)
    {
               //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $jabatan = Jabatan::where('id_jabatan','=',$id);

        $jabatan->delete();

        return redirect('ListJabatan');

    }

       public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}