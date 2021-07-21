<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Artikel;
use App\User;
use DOMDocument;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{

    public function index(){

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // $list = Jabatan::all();
        $artikel = Artikel::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
        return view ('admindesa/artikel',[
            'artikel' => $artikel]);

    }

    public function create(){
        $getdesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // var_dump($getdesa);
        return view ('admindesa/addartikel',['desa' => $getdesa]);
    }

    public function action_create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');


        // untuk simpan file ke penyimpanan
        $request->file('gambar')->store('public/gambar');
        //untuk mengambil nama file
        $nama = $request->file('gambar')->hashName();

        $artikel = $request['isi'];
        $dom = new DOMDocument();
        @$dom->loadHtml($artikel, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.jpeg';
            $name= "https://sepotong.desa.id/imagepost/" . time().$k.'.jpeg';
            Storage::disk('public_uploads')->put($image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $name);
        }
        $artikel = $dom->saveHTML();

        Artikel::create([
            'id_desa' => $request['id_desa'],
            'judul' => $request['judul'],
            'isi' => $artikel,
            'gambar' => $nama
            
        ]);
        
        return redirect('Artikel');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $artikel = Artikel::where('id_artikel','=',$id)->get();
        $asr =  Artikel::all();
        return view ('admindesa/edit_artikel',['art' => $artikel]);

    }


    public function action_edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $artikel = Artikel::where('id_artikel','=',$id);

        $artikelisi = $request->isi;
        $dom = new DOMDocument();
        @$dom->loadHtml($artikelisi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //upload baru
        $images = $dom->getElementsByTagName('img');
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            $cek = explode('/', $data);
            $cek1 = explode('.', $cek[3]);

            if($cek1[0] != 'imagepost'){
                if (count($cek1) == 1) {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    $image_name= time().$k.'.jpeg';
                    $name= "https://sepotong.desa.id/imagepost/" . time().$k.'.jpeg';
                    Storage::disk('public_uploads')->put($image_name, $data);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $name);
                }

            }

        }
        $artikelisi = $dom->saveHTML();


        if ($request->file('gambar')) {
            # code...
            $request->file('gambar')->store('public/gambar');
            $nama = $request->file('gambar')->hashName();

            $artikel->update([
                'judul' => $request['judul'],
                'gambar' => $nama,
                'isi' => $artikelisi
            ]);
            return redirect('Artikel');
        }

        $artikel->update([
            'judul' => $request['judul'],
            'gambar' => $request['logo1'],
            'isi' => $artikelisi
        ]);
        return redirect('Artikel');
    }

    public function hapus($id)
    {
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $artikel = Artikel::where('id_artikel','=',$id);

        $artikel->delete();

        return redirect('Artikel');

    }

    public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
    	return "store";		//create untuk dimasukkan kedalam tabel didatabase
    }
}
