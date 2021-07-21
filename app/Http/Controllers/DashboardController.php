<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenissurat;
use App\Artikel;
use App\Agenda;
use App\Comment_artikel;
use App\Comment;
use App\Suarawarga;
use App\Galeri_foto;
use App\Kegiatan;
use App\Tupoksi;
use App\Anggaran;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller

{

   // $desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();
 
    public function index(){

        $data = Jenissurat::where('status','bisa diajukan')->get();
    	$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(8,['*'],'artikel');
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'kegiatan');
        $galeri_foto = Galeri_foto::where('slider','=','Yes')->limit(10)->get();
        $foto_kades = Tupoksi::where('id_tupoksi','1')->get();
        $anggaran = Anggaran::where('id_desa','123')->get();
        // $users->links('dashboard');
    	return view('dashboard',['anggaran' => $anggaran, 'jenissurat' => $data, 'artikel' =>$artikel, 'agenda'=>$agenda, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'slider'=> $galeri_foto, 'kegiatan' => $kegiatan_desa, 'f_kades' => $foto_kades]);
    }

  public function index_berita(){

        $data = Jenissurat::where('status','bisa diajukan')->get();
        $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'artikels');
        $artikel_up = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(5);
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $kegiatan = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'kegiatan');
        $galeri_foto = Galeri_foto::where('slider','=','Yes')->get();
        $anggaran = Anggaran::where('id_desa','123')->get();
        // $users->links('dashboard');
        return view('dashboard_berita',['anggaran' => $anggaran, 'jenissurat' => $data, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'artikel2'=> $artikel_up, 'kegiatan' => $kegiatan]);
    }

      public function index_kegiatan(){

        $data = Jenissurat::where('status','bisa diajukan')->get();
        $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'artikels');
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $all = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(5);
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'kegiatan_desa');
        $galeri_foto = Galeri_foto::where('slider','=','Yes')->get();
        $anggaran = Anggaran::where('id_desa','123')->get();
        // $users->links('dashboard');
        return view('dashboard_kegiatan',['anggaran' => $anggaran, 'jenissurat' => $data, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'allkegiatan'=>$all, 'suarawarga' => $suarawarga, 'slider'=> $galeri_foto, 'kegiatan' => $kegiatan_desa]);
    }


       public function index_suarawarga(){

        $data = Jenissurat::where('status','bisa diajukan')->get();
        $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $all = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(10,['*'],'all');
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
        $galeri_foto = Galeri_foto::where('slider','=','Yes')->get();
        $anggaran = Anggaran::where('id_desa','123')->get();
        // $users->links('dashboard');
        return view('all_suarawarga',['anggaran' => $anggaran, 'jenissurat' => $data, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'slider'=> $galeri_foto, 'kegiatan' => $kegiatan_desa]);
    }

    public function detail_artikel(Request $request,$id){

    	 $data = Jenissurat::all();
    	 $artikel = Artikel::where('id_artikel','=',$id)->get();
         $komentar = Comment_artikel::where('id_artikel','=',$id)->get();
         $jmlkomen = Comment_artikel::where('id_artikel','=',$id)->count();
         $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
         $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
         $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3); 
         $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
         $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
         $anggaran = Anggaran::where('id_desa','123')->get();
    	return view('detail_artikel',['anggaran' => $anggaran, 'jenissurat' => $data,'artikel' =>$artikel, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
    }

        public function detail_agenda(Request $request,$id){

         $data = Jenissurat::all();
         $artikel = Artikel::where('id_artikel','=',$id)->get();
         $komentar = Comment_artikel::where('id_artikel','=',$id)->get();
         $jmlkomen = Comment_artikel::where('id_artikel','=',$id)->count();
         $agenda_detail = Agenda::where('id_agenda','=',$id)->get();
         $agenda = Agenda::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3,['*'],'agenda');
         $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
         $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3); 
         $suarawarga = Suarawarga::where('id_desa', '123')->orderBy('created_at', 'desc')->paginate(5);
         $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
         $anggaran = Anggaran::where('id_desa','123')->get();
        return view('detail_agenda',['anggaran' => $anggaran, 'jenissurat' => $data,'artikel' => $artikel, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'detail_agenda' =>$agenda_detail]);
    }

        public function detail_kegiatan(Request $request,$id){

         $data = Jenissurat::all();
         $artikel = Artikel::where('id_artikel','=',$id)->get();
         $komentar = Comment_artikel::where('id_artikel','=',$id)->get();
         $jmlkomen = Comment_artikel::where('id_artikel','=',$id)->count();
         $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
         $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
         $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3); 
         $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
         $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
         $kegiatan_detail = Kegiatan::where('id_kegiatan','=',$id)->get();
         $anggaran = Anggaran::where('id_desa','123')->get();
        return view('detail_kegiatan',['anggaran' => $anggaran, 'jenissurat' => $data,'artikel' =>$artikel, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa,'detail_kegiatan' =>$kegiatan_detail]);
    }

     public function detail_anggaran(Request $request,$id){

         $data = Jenissurat::all();
         $artikel = Artikel::where('id_artikel','=',$id)->get();
         $komentar = Comment_artikel::where('id_artikel','=',$id)->get();
         $jmlkomen = Comment_artikel::where('id_artikel','=',$id)->count();
         $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
         $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
         $artikel_sidebar = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3); 
         $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
         $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
         $kegiatan_detail = Kegiatan::where('id_kegiatan','=',$id)->get();
         $anggaran_detail = Anggaran::where('id_anggaran','=',$id)->get();
         $anggaran = Anggaran::where('id_desa','123')->get();
        return view('detail_anggaran',['anggarandesa' => $anggaran_detail, 'anggaran' => $anggaran, 'jenissurat' => $data,'artikel' =>$artikel, 'artikels' =>$artikel_sidebar, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen, 'allkomen'=>$all, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa,'detail_kegiatan' =>$kegiatan_detail]);
    }

}