<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_profil;
use App\M_penduduk;
use App\Kk;
use App\Desa;
use App\Kecamatan;
use App\Penduduk;
use App\Jenissurat;
use App\Agenda;
use App\Artikel;
use App\Comment;
use App\Suarawarga;
use App\Kegiatan;
use App\Jabatan;
use App\Tupoksi;
use App\Anggaran;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{

   // $desa = Desa::where('id_desa',Auth()->user()->id_desa)->with('kabupaten', 'kecamatan')->get();

    public function tidakadadata(){
        $data = Desa::where('id_desa','123')->get();
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
        $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
        $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $anggaran = Anggaran::where('id_desa','123')->get();
        return view('nodata',['anggaran' => $anggaran,'prof' => $data,  'artikels' =>$artikel, 'agenda'=>$agenda, 'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
    }


    public function index(){
        $dataJumlah =[];
        $jmlpenduduk = Penduduk::all()->count();
        $jmlkk = Kk::all()->count();
        $jmldesa = Desa::all()->count();
        $jmlkecamatan = Kecamatan::all()->count();

        $dataJumlah['Tpenduduk']=$jmlpenduduk;
        $dataJumlah['Tkk']=$jmlkk;
        $dataJumlah['Tdesa']=$jmldesa;
        $dataJumlah['Tkecamatan']=$jmlkecamatan;

        return view ('index',$dataJumlah);
    }



    public function sejarah(){
        $data = Desa::where('id_desa','123')->get();
        $surat = Jenissurat::all();
        $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
        $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
        $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
        $komentar = Comment::where('keterangan','=','sejarah')->get();
        $jmlkomen = Comment::where('keterangan','=','sejarah')->count();
        $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $anggaran = Anggaran::where('id_desa','123')->get();
        return view('sejarah',['anggaran' => $anggaran, 'prof' => $data, 'jenissurat' => $surat, 'artikels' =>$artikel, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
    }

    public function profil(){
       $data = Desa::where('id_desa','123')->get();
       $surat = Jenissurat::all();
       $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
       $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
       $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
       $komentar = Comment::where('keterangan','=','profil')->get();
       $jmlkomen = Comment::where('keterangan','=','profil')->count();
       $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
       $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
       $anggaran = Anggaran::where('id_desa','123')->get();
       return view('profil_wilayah',['anggaran' => $anggaran,'prof' => $data, 'jenissurat' => $surat, 'artikels' =>$artikel, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
   }

   public function visimisi(){
       $surat = Jenissurat::all();
       $data = Desa::where('id_desa','123')->get();
       $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
       $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
       $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
       $komentar = Comment::where('keterangan','=','visimisi')->get();
       $jmlkomen = Comment::where('keterangan','=','visimisi')->count();
       $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();       
        $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
        $anggaran = Anggaran::where('id_desa','123')->get();
       return view('visimisi',['anggaran' => $anggaran, 'prof' => $data, 'jenissurat' => $surat, 'artikels' =>$artikel, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
   }

   public function perangkatdesa(){
      $surat = Jenissurat::all();
      $tupoksi = Tupoksi::orderBy('created_at', 'asc')->paginate(5,['*'],'tupoksi');
      $data1 = DB::table('jabatan')
      ->leftJoin('tupoksi', 'jabatan.id_jabatan', '=', 'tupoksi.id_jabatan')->get();
      $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
      $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
      $komentar = Comment::where('keterangan','=','perangkatdesa')->get();
      $jmlkomen = Comment::where('keterangan','=','perangkatdesa')->count();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
       $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
       $anggaran = Anggaran::where('id_desa','123')->get();
      return view('perangkatdesa',['anggaran' => $anggaran,'tupoksi' => $tupoksi, 'jenissurat' => $surat, 'artikels' =>$artikel, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
  }

  public function detail_agenda(){
     $surat = Jenissurat::all();
     $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
     $agenda_detail = Agenda::where('id_desa','123')->get();
     $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
     $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
     $komentar = Comment::where('keterangan','=','detailagenda')->get();
     $jmlkomen = Comment::where('keterangan','=','detailagenda')->count();
     $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
      $anggaran = Anggaran::where('id_desa','123')->get();
     return view('detail_agenda',['jenissurat' => $surat, 'anggaran' => $anggaran, 'agenda'=>$agenda, 'artikels' =>$artikel, 'detail'=>$agenda_detail, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
 }

   public function kegiatan(){
     $surat = Jenissurat::all();
     $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
     $agenda_detail = Agenda::where('id_desa','123')->get();
     $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
     $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
     $komentar = Comment::where('keterangan','=','detailagenda')->get();
     $jmlkomen = Comment::where('keterangan','=','detailagenda')->count();
     $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
     $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
     $anggaran = Anggaran::where('id_desa','123')->get();
     return view('kegiatan',['jenissurat' => $surat, 'anggaran' => $anggaran, 'agenda'=>$agenda, 'artikels' =>$artikel, 'detail'=>$agenda_detail, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
 }

   public function all_agenda(){
     $surat = Jenissurat::all();
     $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
     $all_agenda = Agenda::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(6);
     $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
     $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
     $komentar = Comment::where('keterangan','=','detailagenda')->get();
     $jmlkomen = Comment::where('keterangan','=','detailagenda')->count();
     $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
      $anggaran = Anggaran::where('id_desa','123')->get();
     return view('all_agenda',['jenissurat' => $surat, 'anggaran' => $anggaran, 'agenda'=>$agenda, 'artikels' =>$artikel, 'all'=>$all_agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
 }

  public function anggaran(){
      $surat = Jenissurat::all();
      $tupoksi = Tupoksi::all();
      $data = Anggaran::where('id_desa','123')->get();
      $agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
      $artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
      $komentar = Comment::where('keterangan','=','perangkatdesa')->get();
      $jmlkomen = Comment::where('keterangan','=','perangkatdesa')->count();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
       $suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
       $anggaran = Anggaran::where('id_desa','123')->get();
      return view('detail_anggaran',['anggarandesa' => $data, 'tupoksi' => $tupoksi, 'anggaran' => $anggaran, 'jenissurat' => $surat, 'artikels' =>$artikel, 'agenda'=>$agenda, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'allkomen'=>$all,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
  }

}