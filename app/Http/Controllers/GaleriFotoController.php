<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Galeri_foto;
use App\User;

class GaleriFotoController extends Controller
{
  
    public function index(){
      
        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // $list = Jabatan::all();
        $galeri_foto = Galeri_foto::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
        return view ('admindesa/galeri_foto',[
            'foto' => $galeri_foto]);

    }

    // public function create(){
    //     $getdesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
    //     // var_dump($getdesa);
    //      return view ('admindesa/addartikel',['desa' => $getdesa]);
    // }

    public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');
        

        // untuk simpan file ke penyimpanan
        $request->file('gambar')->store('public/gambar');
        //untuk mengambil nama file
        $nama = $request->file('gambar')->hashName();

        Galeri_foto::create([
            'id_desa' => auth()->user()->id_desa,
            'foto' => $nama,
            'slider' => 'Tidak'
            
        ]);
        
        return redirect('galeri_foto');
    }



    

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');
        
        $galeri_foto = Galeri_foto::where('id_foto','=',$id);

        $galeri_foto->delete();

        return redirect('galeri_foto');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
