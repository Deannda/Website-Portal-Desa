<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
use App\Suarawarga;
use App\Jenissurat;
use App\Artikel;
use App\Agenda;
use App\User;
use App\Desa;
use App\Penduduk;

class SuarawargaController extends Controller
{

    public function index(){

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        $penduduk = Penduduk::where('id_desa','=',auth()->user()->id_desa)->get();
        $suarawarga = Suarawarga::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
        return view ('admindesa/suara_warga',[
            'suarawarga' => $suarawarga,'penduduk' => $penduduk ]);

    }

    public function create(Request $request)
    { 

        Suarawarga::create([
            'nik' => $request->nik,
            'id_desa' => 123,
            'isi_tanggapan' => $request['isi_tanggapan'],
            
        ]);
        
        return redirect('/beranda');
    }

    // public function sukses () {

    //     Session::flash('sukses','Ini notifikasi SUKSES');
    //     return redirect('pesan');
    // }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $suarawarga = Suarawarga::where('id_suara_warga','=',$id);

        $suarawarga->delete();

        return redirect('suara_warga');

    }

    // public function isisuarawarga(){

    //     $data = Jenissurat::where('status','bisa diajukan')->get();
    //     $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(4);
    //     $agenda = Agenda::where('id_desa','123')->limit(4)->get();
    //     $suarawarga = Suarawarga::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
    //     return view ('admindesa/suara_warga',[
    //         'suarawarga' => $suarawarga,'penduduk' => $penduduk ]);

    // }





    public function store(){ 
    	return "store";		
    }
}
