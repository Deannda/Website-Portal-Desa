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


class perangkatKampungController extends Controller
{

  public function index()
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
  public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya

        // $this->authorize('isDesa');
      if( $request->file('gambar') == ''){

      Tupoksi::create([
        'id_desa' => auth()->user()->id_desa,
        'id_jabatan' => $request['id_jabatan'],
        'nama' => $request['nama'],
        'periode_awal' => $request['tahun_awal'],
        'periode_akhir' => $request['tahun_akhir'],


      ]);

      } else {

      $request->file('gambar')->store('public/foto_kades');
        //untuk mengambil nama file
      $nama = $request->file('gambar')->hashName();

      Tupoksi::create([
        'id_desa' => auth()->user()->id_desa,
        'id_jabatan' => $request['id_jabatan'],
        'nama' => $request['nama'],
        'periode_awal' => $request['tahun_awal'],
        'periode_akhir' => $request['tahun_akhir'],
        'foto' => $nama

      ]);

   }

      return redirect('jabatan');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');

      $tupoksi = Tupoksi::where('id_tupoksi','=',$id);
      if ($request->file('gambar')) {

        $request->file('gambar')->store('public/foto_kades');
        //untuk mengambil nama file
        $nama = $request->file('gambar')->hashName();

        $tupoksi->update([
          'nama' => $request['nama'],
          'periode_awal' => $request['tahun_awal'],
          'periode_akhir' => $request['tahun_akhir'],
          'foto' => $nama
        ]);
        return redirect('jabatan');
      }

      $tupoksi->update([
        'nama' => $request['nama'],
        'periode_awal' => $request['tahun_awal'],
        'periode_akhir' => $request['tahun_akhir'],
        'foto' => $request['logo1']
      ]);
      return redirect('jabatan');
    }


    public function hapus($id)
    {
               //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

     $tupoksi = Tupoksi::where('id_tupoksi','=',$id);

     $tupoksi->delete();

     return redirect('jabatan');

   }


       public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
      }
    }