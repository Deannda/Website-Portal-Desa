<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Situ;
use App\Kematian;
use App\Domisili;
use App\Bedanama;
use App\Jalan;
use App\Keramaian;
use App\Imb;
use App\Ktp;
use App\NonPNS;
use App\Pindah;
use App\Skck;
use App\Sktm;
use App\Sktmsekolah;
use App\Usaha;
use App\Ahliwaris;
use App\Pindahnikah;
use App\Profesi;
use App\Penghasilan;
use App\Dispensasinikah;
use App\Kelahiran;
use App\Artikel;
use App\Agenda;
use App\Comment_artikel;
use App\Comment;
use App\Kegiatan;
use App\Jenissurat;
use App\Suarawarga;
use App\Anggaran;
use App\Belumnikah;
use App\Pengantarnikah;
use App\Izinorangtua;



class PelayanansuratController extends Controller
{
  // public function index(){

  //  return view('pelayanan_surat');
 //       // ['situActive' => true] fungsinya biar dia langsung menampilkan form surat nya 
 //       // situActive sesuai dengan nama variabel yang ada di dalam if pada tampilan
  //  // ,['situActive' => true]
  // }

      public function store(){ // fungsi store untuk mengolah data yang dikirim dari 

      return "store";   //create untuk dimasukkan kedalam tabel didatabase
    }

    public function situ(Request $request)
    {
      //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa','123')->where('nik',$request->nik)->count();
      ;
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['situActive' => true,'situstatus' => 'danger','situError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

    // untuk simpan file ke penyimpanan
      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Situ::create([
        'nik' => $request->nik,
        'alamat_usaha' => $request->alamat_usaha,
        'lampiran' => 1,
        'luas_usaha' => $request->luas_usaha,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat
      ]);

      return view('pelayanan_surat',['situActive' => true,'situstatus' => 'success','situError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }


    public function kematian(Request $request)
    {

      //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['kematianActive' => true,'kematianstatus' => 'danger','kematianError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $kk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->first();




      Kematian::create([
        'nik' => $request->nik,
        'id_kk' => $kk->id_kk,
        'pasangan' => $request->pasangan,
        'tanggal_kematian' => date('Y-m-d', strtotime( $request['tanggal_kematian'])),
        'tempat_kematian' => $request->tempat_kematian,
        'sebab' => $request->sebab_kematian,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
 
      ]);

      return view('pelayanan_surat',['kematianActive' => true,'kematianstatus' => 'success','kematianError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function domisili(Request $request)
    {
   //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['domisiliActive' => true,'domisilistatus' => 'danger','domisiliError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }


      Domisili::create([
        'nik' => $request->nik,
        'tanggal_domisili' => date('Y-m-d', strtotime( $request['tanggal_domisili'])),
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'fungsi' => $request['fungsi'],
        'id_desa' => 123,
    
      ]);

      return view('pelayanan_surat',['domisiliActive' => true,'domisilistatus' => 'success','domisiliError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function bedanama(Request $request)
    {

     //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
  // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['bedanamaActive' => true,'bedanamastatus' => 'danger','bedanamaError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();


      Bedanama::create([
        'nik' => $request->nik,
        'keterangan_kesalahan' => $request->keterangan_kesalahan,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat
      ]);

      return view('pelayanan_surat',['bedanamaActive' => true,'bedanamastatus' => 'success','bedanamaError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function jalan(Request $request)
    {

     //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
  // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['keteranganjalanActive' => true,'keteranganjalanstatus' => 'danger','keteranganjalanError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }



      Jalan::create([
        'nik' => $request->nik,
        'desa' => $request->desa_kel,
        'kecamatan' => $request->kec,
        'kabupaten' => $request->kab,
        'provinsi' => $request->prov,
        'tujuan' => $request->tujuan_perjalanan,
        'jumlah_pengikut' => $request->jumlah_pengikut,
        'pengikut' => $request->keterangan_pengikut,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
     
      ]);

      return view('pelayanan_surat',['keteranganjalanActive' => true,'keteranganjalanstatus' => 'success','keteranganjalanError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function keramaian(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();

      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['izinkeramaianActive' => true,'izinkeramaianstatus' => 'danger','izinkeramaianError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }


      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();


      Keramaian::create([
        'nik' => $request->nik,
        'lampiran' => 1,
        'kepada' => $request->kepada,
        'di' => $request->di,
        'acara' => $request->acara,
        'hari_tanggal' => $request->tanggal_acara,
        'waktu' => $request->waktu_acara,
        'tempat' => $request->tempat_acara,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat
      ]);

      return view('pelayanan_surat',['izinkeramaianActive' => true,'izinkeramaianstatus' => 'success','izinkeramaianError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }


    public function imb(Request $request)
    {

   //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
    // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['IMBActive' => true,'IMBstatus' => 'danger','IMBError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Imb::create([
        'nik' => $request->nik,
        'lampiran' => 1,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat
      ]);

      return view('pelayanan_surat',['IMBActive' => true,'IMBstatus' => 'success','IMBError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }



    public function ktp(Request $request)
    {

 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['KeteranganKTPActive' => true,'KeteranganKTPstatus' => 'danger','KeteranganKTPError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Ktp::create([
        'nik' => $request->nik,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat
      ]);

      return view('pelayanan_surat',['KeteranganKTPActive' => true,'KeteranganKTPstatus' => 'success','KeteranganKTPError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function nonpns(Request $request)
    {

  //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
    // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['nonPNSActive' => true,'nonPNSstatus' => 'danger','nonPNSError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

   

      NonPNS::create([
        'nik' => $request->nik,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,


      ]);

      return view('pelayanan_surat',['nonPNSActive' => true,'nonPNSstatus' => 'success','nonPNSError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function pindah(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['KeteranganPindahActive' => true,'KeteranganPindahstatus' => 'danger','KeteranganPindahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Pindah::create([
        'nik' => $request->nik,
        'kepala_keluarga' => $request['nika'],
        'alamat_tujuan_pindah' => $request->alamat_tujuan_pindah,
        'jumlah_keluarga_pindah' => $request->jumlah_keluarga_pindah,
        'anggota_keluarga_pindah' => $request->anggota_keluarga_pindah,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat

      ]);

      return view('pelayanan_surat',['KeteranganPindahActive' => true,'KeteranganPindahstatus' => 'success','KeteranganPindahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function skck(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['SKCKActive' => true,'SKCKstatus' => 'danger','SKCKError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Skck::create([
        'nik' => $request->nik,
        'lampiran' => 1,
        'fungsi' => $request->tujuan,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['SKCKActive' => true,'SKCKstatus' => 'success','SKCKError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function sktm(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['SKTMActive' => true,'SKTMstatus' => 'danger','SKTMError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }



      Sktm::create([
        'nik' => $request->nik,
        'petugas' => $request->petugas,
        'orang_tua' => $request->nika,
        'fungsi' => $request->fungsi,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
    


      ]);

      return view('pelayanan_surat',['SKTMActive' => true,'SKTMstatus' => 'success','SKTMError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function sktmsekolah(Request $request)
    {

 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['SKTMSekolahActive' => true,'SKTMSekolahstatus' => 'danger','SKTMSekolahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }

      Sktmsekolah::create([
        'nik' => $request->nik,
        'sek_univ' => $request->sek_univ,
        'kel_jur' => $request->kel_jur,
        'fungsi' => $request->fungsi,
        'orang_tua' => $request->nika,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,



      ]);

      return view('pelayanan_surat',['SKTMSekolahActive' => true,'SKTMSekolahstatus' => 'success','SKTMSekolahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function usaha(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['UsahaActive' => true,'Usahastatus' => 'danger','UsahaError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
      }


      Usaha::create([

        'nik' => $request->nik,
        'keterangan_usaha' => $request->keterangan_usaha,
        'jenis_usaha' => $request->jenis_usaha,
        'luas_lahan' => $request->luas_lahan,
        'tenaga_pembantu' => $request->tenaga_pembantu,
        'alamat_usaha' => $request->alamat_usaha,
        'fungsi' => $request['fungsi'],
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,


      ]);

      return view('pelayanan_surat',['UsahaActive' => true,'Usahastatus' => 'success','UsahaError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function ahliwaris(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['AhliwarisActive' => true,'Ahliwarisstatus' => 'danger','AhliwarisError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }

      $kk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->first();

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Ahliwaris::create([

        'nik' => $request->nik,
        'id_kk' => $kk->id_kk,
        'keterangan' => $request->keterangan_ahli_waris,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['AhliwarisActive' => true,'Ahliwarisstatus' => 'success','AhliwarisError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }
    public function pindahnikah(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['PindahnikahActive' => true,'Pindahnikahstatus' => 'danger','PindahnikahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Pindahnikah::create([

        'nik' => $request->nik,
        'lampiran' => 1,
        'kepada' => $request->kepada,
        'di' => $request->di,
        'desa' => $request->desa_kel,
        'kecamatan' => $request->kecamatan,
        'kabupaten' => $request->kabupaten,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['PindahnikahActive' => true,'Pindahnikahstatus' => 'success','PindahnikahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function profesi(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['ProfesiActive' => true,'Profesistatus' => 'danger','ProfesiError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }

      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Profesi::create([

        'nik' => $request->nik,
        'nipnik' => $request->nip_nik,
        'ketprof' => $request->keterangan_profesi,
        'fungsi' => $request->fungsi,
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['ProfesiActive' => true,'Profesistatus' => 'success','ProfesiError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function penghasilan(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['PenghasilanActive' => true,'Penghasilanstatus' => 'danger','PenghasilanError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }


      Penghasilan::create([

        'nik' => $request->nik,
        'jumlah_penghasilan' => $request['jumlah_penghasilan'],
        'saksi1' => $request['saksi1'],
        'saksi2' => $request['saksi2'],
        'saksi3' => $request['saksi3'],
        'sebagai3' => $request['sebagai3'],
        'saksi4' => $request['saksi4'],
        'sebagai4' => $request['sebagai4'],
        'mengetahui' => $request['kerani'],
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,


      ]);

      return view('pelayanan_surat',['PenghasilanActive' => true,'Penghasilanstatus' => 'success','PenghasilanError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function dispensasinikah(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['DispensasinikahActive' => true,'Dispensasinikahstatus' => 'danger','DispensasinikahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }
      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Dispensasinikah::create([

        'lampiran' => 1,
        'sebagai1' => $request['sebagai1'],
        'nik' => $request['nik'],
        'sebagai2' => $request['sebagai2'],
        'nama' => $request['namap'],
        'tempat_lahir' => $request['tempat_lahir'],
        'tanggal_lahir' => date('Y-m-d', strtotime( $request['tanggal_lahir'])),
        'warga' => $request['warga'],
        'agama' => $request['agama'],
        'status' => $request['status'],
        'alamat' => $request['alamat'],
        'keterangan' => $request['keterangan'],
        'tanggal_nikah' => date('Y-m-d', strtotime( $request['tanggal_nikah'])),
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['DispensasinikahActive' => true,'Dispensasinikahstatus' => 'success','DispensasinikahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data, 'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function kelahiran(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['KelahiranActive' => true,'Kelahiranstatus' => 'danger','KelahiranError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }
      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Kelahiran::create([

        'nik' => $request['nik'],
        'tanggal_lahir' => date('Y-m-d', strtotime( $request['tanggal_lahir'])),
        'tempat_lahir' => $request['tempat_lahir'],
        'ayah' => $request['ayah'],
        'ibu' => $request['ibu'],
        'anak' => $request['anak'],
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['KelahiranActive' => true,'Kelahiranstatus' => 'success','KelahiranError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function belumnikah(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();

      
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['BelumNikahActive' => true,'BelumNikahstatus' => 'danger','BelumNikahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }




      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Belumnikah::create([

        'nik' => $request['nik'],
        'tanggal_surat' => date('Y-m-d'),
        'ayah' => $request['ayah'],
        'ibu' => $request['ibu'],
        'saksi1' => $request['nik_saksi_1'],
        'saksi2' => $request['nik_saksi_2'],
        'nama_pasangan' => $request['nama_pasangan'],
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['BelumNikahActive' => true,'BelumNikahstatus' => 'success','BelumNikahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }


    public function pengantarnikah(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['PengantarNikahActive' => true,'PengantarNikahstatus' => 'danger','PengantarNikahError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }
      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Pengantarnikah::create([

        'nik' => $request['nik'],
        'ayah' => $request['nika'],
        'ibu' => $request['nikaibu'],
        'nama_pasangan_terdahulu' => $request['nama_pasangan_terdahulu'],
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['PengantarNikahActive' => true,'PengantarNikahstatus' => 'success','PengantarNikahError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }

    public function izinorangtua(Request $request)
    {
 //untuk keperluan variabel di sidebar
      $agenda = Agenda::where('id_desa','123')->limit(3)->get();
      $all = Comment::orderBy('created_at', 'desc')->limit(4)->get();
      $artikels = Artikel::where('id_desa','123')->paginate(3); 
      $data = Jenissurat::where('status','bisa diajukan')->get();
      $suarawarga = Suarawarga::where('id_desa','123')->limit(4)->get();
      $kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->paginate(3);
      $anggaran = Anggaran::where('id_desa','123')->get();
      // cod cek nik ke data penduduk desa
      $penduduk = Penduduk::where('id_desa',123)->where('nik',$request->nik)->count();
      if ($penduduk == 0) {
        # code...
        return  view('pelayanan_surat',['IzinOrangtuaActive' => true,'IzinOrangtuastatus' => 'danger','IzinOrangtuaError'=>'NIK '.$request->nik.' tidak terdaftar', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);

      }
      $request->file('file_syarat')->store('public/syarat');
        //untuk mengambil nama file
      $syarat = $request->file('file_syarat')->hashName();

      Izinorangtua::create([

        'nik' => $request['nik'],
        'ayah' => $request['nika'],
        'ibu' => $request['nikaibu'],
        'nama_pasangan' => $request['nama_pasangan'],
        'bin_binti' => $request['bin_binti'],
        'nik_pasangan' => $request['nik_pasangan'],
        'tempat_lahir' => $request['tempat_lahir'],
        'tanggal_lahir' => date('Y-m-d', strtotime( $request['tanggal_lahir'])),
        'kewarganegaraan' => $request['kewarganegaraan'],
        'agama' => $request['agama'],
        'pekerjaan' => $request['pekerjaan'],
        'alamat' => $request['alamat'],
        'tanggal_surat' => date('Y-m-d'),
        'status_surat' => 'belum diproses',
        'id_desa' => 123,
        'file_syarat' => $syarat


      ]);

      return view('pelayanan_surat',['IzinOrangtuaActive' => true,'IzinOrangtuastatus' => 'success','IzinOrangtuaError'=>'Permohonan Anda berhasil diajukan, silahkan datang ke kantor desa untuk melakukan pencetakan surat', 'agenda'=>$agenda, 'allkomen'=>$all, 'artikels' =>$artikels,'jenissurat' => $data,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa, 'kegiatan' => $kegiatan_desa, 'anggaran' => $anggaran]);
    }





    public function ortu($nik)
    {
     $anak = Penduduk::where('nik',$nik)->first();
     $keluarga = Penduduk::where('id_kk',$anak->id_kk)->get();
     $ortu = [];

    // cek ayah
     foreach ($keluarga as $key => $value) {
      # code...

      // angka 3 di bawah sesuaikan dengan id Kepala keluarga di data hubungan keluarga
      if($value->hubungan_keluarga == 3){
       array_push($ortu, $value);
     } 
   }

    // kalau pengecekan ayah diatas kosong
    // lakukan pengecekan ibu dibawah
   if (count($ortu) == 0) {
      # code...
    foreach ($keluarga as $key => $value) {
      # code...

      // angka 4 di bawah sesuaikan dengan id istri  di data hubungan keluarga
     if($value->hubungan_keluarga == 4){
      array_push($ortu, $value);
    } 
  }

}
return $ortu;
}

public function nama_penduduk($nik)
{
 $namapenduduk = Penduduk::where('id_desa',123)->where('nik',$nik)->first();
 //untuk keperluan variabel di sidebar
 
 return $namapenduduk->nama;
}


public function nikahortu($nik)
{
 $anak = Penduduk::where('nik',$nik)->first();
 $keluarga = Penduduk::where('id_kk',$anak->id_kk)->get();

 $data['ayah'] = [];
 $data['ibu'] = [];
 $data['namapenduduk'] = $anak->nama;

    // cek ayah
 foreach ($keluarga as $key => $value) {
      # code...
      // angka 3 di bawah sesuaikan dengan id Kepala keluarga di data hubungan keluarga
  if($value->hubungan_keluarga == 3){
   array_push($data['ayah'], $value);
 } elseif ($value->hubungan_keluarga == 4) {
       # code...
   array_push($data['ibu'], $value);

 }
}

return $data;
}



}
