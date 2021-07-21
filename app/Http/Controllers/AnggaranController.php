<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Anggaran;
use App\User;

class AnggaranController extends Controller
{
  
    public function index(){
      
        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // $list = Jabatan::all();
        $anggaran = Anggaran::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
        return view ('admindesa/anggaran',[
            'anggaran' => $anggaran]);

    }

    public function create(){
        $getdesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // var_dump($getdesa);
         return view ('admindesa/addanggaran',['desa' => $getdesa]);
    }

    public function action_create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        Anggaran::create([
            'id_desa' => $request['id_desa'],
            'tahun_anggaran' => $request['tahun_anggaran'],
            'detail' => $request['detail'],
            
        ]);
        
        return redirect('Anggaran');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');
        
        $anggaran = Anggaran::where('id_anggaran','=',$id)->get();
        $asr =  Anggaran::all();
        return view ('admindesa/edit_anggaran',['art' => $anggaran]);

    }


     public function action_edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');
        
        $anggaran = Anggaran::where('id_anggaran','=',$id);

         $anggaran->update([
            'tahun_anggaran' => $request['tahun_anggaran'],
            'detail' => $request['detail']
            ]);
            return redirect('Anggaran');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');
        
        $anggaran = Anggaran::where('id_anggaran','=',$id);

        $anggaran->delete();

        return redirect('Anggaran');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
