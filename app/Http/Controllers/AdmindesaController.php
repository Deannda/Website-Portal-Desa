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

use App\Suratsitu;
use App\Suratkematian;
use App\Suratdomisili;
use App\Suratbedanama;
use App\Suratjalan;
use App\Suratkeramaian;
use App\Suratimb;
use App\Suratktp;
use App\Suratnonpns;
use App\Suratpindah;
use App\Suratskck;
use App\Suratsktmbdt;
use App\Artikel;
use App\Dusun;
use DOMDocument;
use Illuminate\Support\Facades\Storage;


class AdmindesaController extends Controller
{
    public function home()
    {
    	 // $this->authorize('isDesa');

        return view ('admindesa/home');
    }

    public function dataprofil()
    {
        //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('kabupaten','kecamatan','desa')->get();

        $profil = Desa::where('id_desa','=',auth()->user()->id_desa)->get();
        return view ('admindesa/edit_profile_kampung',['profil' => $profil]);

    }

    public function editprofil(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya

                //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $desa = Desa::where('id_desa','=',$id);

        $profildesa = $request->profil;
        $dom = new DOMDocument();
        @$dom->loadHtml($profildesa, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $profildesa = $dom->saveHTML();

        $sejarahdesa = $request->sejarah;
        $dom = new DOMDocument();
        @$dom->loadHtml($sejarahdesa, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $sejarahdesa = $dom->saveHTML();

        $visidesa = $request->visi;
        $dom = new DOMDocument();
        @$dom->loadHtml($visidesa, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $visidesa = $dom->saveHTML();

        $misidesa = $request->misi;
        $dom = new DOMDocument();
        @$dom->loadHtml($misidesa, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $misidesa = $dom->saveHTML();

        $desa->update([
            'nama_desa' => $request['nama_desa'],
            'alamat_desa' => $request['alamat_desa'],
            'kode_pos' => $request['kode_pos'],
            'profil' => $profildesa,
            'sejarah' => $sejarahdesa,
            'visi' => $visidesa,
            'misi' => $misidesa,

        ]);

        return redirect('edit_profile');
    }

    

    public function perangkat_kampung()
    {
        //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        $list = Jabatan::all();
        $dataJabatan = Tupoksi::where('id_desa','=',auth()->user()->id_desa)->with('jabatan')->get();
        return view ('admindesa/perangkat_kampung',[
            'dataJabatan' => $dataJabatan,
            'listjabatan' => $list]);

    }


    public function edit_profil(){
        return view('admindesa/edit_profile_kampung');
    }
}
