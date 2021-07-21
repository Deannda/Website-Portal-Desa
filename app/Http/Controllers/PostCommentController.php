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
use App\Post;
use App\Comment;
use Session;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class PostCommentController extends Controller
{

//create komentar artikel
    public function create(Request $request)
    {

    	$id =$request['id_artikel'];
    	 Comment::create([
            'id_artikel' => $id,
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']
           
            
        ]);
        
        return redirect('/details/'.$id);
    }

    public function k_profil(Request $request)
    {

    	 Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('profil');
    }

    public function k_sejarah(Request $request)
    {

    	 Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('sejarah');
    }

         public function k_visimisi(Request $request)
    {

    	 Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('visimisi');
    }

         public function k_perangkatdesa(Request $request)
    {

    	 Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('perangkatdesa');
    }

         public function k_detailagenda(Request $request)
    {

    	 Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('Listagenda');
    }

      public function ks_agama(Request $request)
    {

         Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('agama');
    }

      public function ks_pendidikan(Request $request)
    {

         Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('pendidikan');
    }

      public function ks_pekerjaan(Request $request)
    {

         Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('pekerjaan');
    }

      public function ks_gender(Request $request)
    {

         Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('Gender');
    }

         public function ks_warganegara(Request $request)
    {

         Comment::create([
            'keterangan' => $request['keterangan'],
            'nama' => $request['nama'],
            'email' => $request['email'],
            'isi_komentar' => $request['isi_komentar']             
        ]);
        return redirect('Warga');
    }
}