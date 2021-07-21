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
use App\Agenda;
use Session;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class AgendaController extends Controller
{

    public function index()
    {
        //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');

        $ldesa = User::where('id','=',auth()->user()->id)->with('desa')->get();
        // $list = Agenda::all();
        $dataAgenda = Agenda::where('id_desa','=',auth()->user()->id_desa)->with('desa')->get();
         return view ('admindesa/agenda',[
            'agenda' => $dataAgenda]);

    }
 public function create(Request $request)
    { // fungsi create untuk menunjukan ke form createnya
        
        // $this->authorize('isDesa');
            # code...
            Agenda::create([
                'id_desa' => auth()->user()->id_desa,
                'agenda' => $request['agenda'],
                'waktu_pelaksanaan' => $request['waktu_pelaksanaan'],
                'tempat_pelaksanaan' => $request['tempat_pelaksanaan']
                
            ]);
        return redirect('agenda');
    }

    public function edit(Request $request,$id)
    { // fungsi edit untuk menunjukan ke form createnya
           //cek status user Sadmin atau Adesa 
        // $this->authorize('isDesa');
        
        $agenda = Agenda::where('id_agenda','=',$id);

        $agenda->update([
           'agenda' => $request['agenda'],
                'waktu_pelaksanaan' => $request['waktu_pelaksanaan'],
                'tempat_pelaksanaan' => $request['tempat_pelaksanaan']
        ]);
        return redirect('agenda');
    }

    public function hapus($id)
    {
               //cek status user Sadmin atau Adesa 
        // $this->authorize('isAdmin');

        $agenda = Agenda::where('id_agenda','=',$id);

        $agenda->delete();

        return redirect('agenda');

    }


       public function store(){ // fungsi store untuk mengolah data yang dikirim dari 
        return "store";     //create untuk dimasukkan kedalam tabel didatabase
    }
}