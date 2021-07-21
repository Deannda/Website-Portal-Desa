<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Dusun;
use App\User;

class DusunController extends Controller
{
  
    public function index(){
      
        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        $datadusun = Dusun::where('id_desa','=',auth()->user()->id_desa)->get();
        return view ('admindesa/dusun',[
            'datadusun' => $datadusun]);

    }

    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        
        // $this->authorize('isDesa');
            # code...
            Dusun::create([
                'id_desa' => auth()->user()->id_desa,
                'nama_dusun' => $request['nama_dusun'],
                'kepala_dusun' => $request['kepala_dusun'],
                'jumlah_rt' => $request['jumlah_rt'],
                'jumlah_kk' => $request['jumlah_kk'],
                'jumlah_penduduk' => $request['jumlah_penduduk']
                
            ]);
        return redirect('Wilayahadministratif');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');
        
        $dusun = Dusun::where('id_dusun','=',$id);

        $dusun->update([
                'nama_dusun' => $request['nama_dusun'],
                'kepala_dusun' => $request['kepala_dusun'],
                'jumlah_rt' => $request['jumlah_rt'],
                'jumlah_kk' => $request['jumlah_kk'],
                'jumlah_penduduk' => $request['jumlah_penduduk']
        ]);
        return redirect('Wilayahadministratif');
    }

     public function hapus($id)
    {
               //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $dusun = Dusun::where('id_dusun','=',$id);

        $dusun->delete();

        return redirect('Wilayahadministratif');

    }

       public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}