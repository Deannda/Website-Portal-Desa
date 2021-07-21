<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Golongandarah;
use App\Jeniskelamin;
use App\Kk;
use App\Kewarganegaraan;
use App\Pekerjaan;
use App\Pendidikanterakhir;
use App\Penduduk;
use App\Agenda;
use App\Artikel;
use App\Comment_artikel;
use App\Comment;
use App\Statusperkawinan;
use App\Suarawarga;
use App\Kegiatan;
use App\Dusun;
use App\Anggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class statistikController extends Controller
{
	public function index_agama()
	{
        //variabel untuk menampung data
		$dataAgama = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','dataagama')->get();
		$jmlkomen = Comment::where('keterangan','=','dataagama')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$agama = Agama::all();
		foreach ($agama as $key => $agamas) {

            // variabel untuk menampung data per field
			$dataField = [];

            // cek jumlah penduduk per desa. ex: desa dengan id 1
			$jumlahPenduduk = Penduduk::where('id_desa','123')->count();

            // cek agama ke data penduduk keseluruhan berdasarkan desa. ex: desa dengan id 1
			$penduduk = Penduduk::where('id_desa','123')->where('agama',$agamas->id_agama)->count();

            // cari persen total keseluruhan
			$jPersen = ($penduduk/$jumlahPenduduk)*100;

			$dataField['agama'] = $agamas->agama;

            // menambah data jumlah penduduk yang memiliki agama
			$dataField['jTotal'] = $penduduk;
			$dataField['jPersen'] = number_format($jPersen,2);


			$jenisKelamin = Jeniskelamin::all();

			foreach ($jenisKelamin as $key => $value) {
                # code...
				$pendudukJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->where('agama',$agamas->id_agama)->count();

                // $pendudukJK = Penduduk::all()->count();

                // return ($pendudukJK/$penduduk)*100;
				if ($penduduk != 0) {
					$jPersenJK = ($pendudukJK/$penduduk)*100;

					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = number_format($jPersenJK,2);

				} else {
					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = 0;
				}

			}
			array_push($dataAgama, $dataField);
		}


		return view('agama',['anggaran' => $anggaran,'data' => $dataAgama, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}

	public function dataStatistik()
	{

		$color = [
			'#E67E22', '#E67E22',
			'#E67E22','#F1C40F',
			'#00c0ef', '#3c8dbc',
			'#d2d6de', '#7B96EB',
			'#06D0FF','#8df719',
			'#F3D000','#A48E0A',
			'#0E8CFF','#F908F9',
			'#F90808','#8832AA',
			'#972b2b', '#86561e',
			'#549705', '#f5a7d7',
		];

		$data['penduduk'] = Penduduk::where('id_desa', '123')->count();
		$data['kk'] = Kk::where('id_desa', '123')->count();

		$data['dataAgama'] = [];
		$agama = Agama::all();
		foreach ($agama as $key => $list){
			$jml = Penduduk::where('id_desa', '123')->where('agama',$list->id_agama)->count();
			$datas = [];

			$datas['label'] = $list->agama;
			$datas['value'] = $jml;
			$datas['highlight'] = $color[$key];
			$datas['color'] = $color[$key];

			array_push($data['dataAgama'], response()->json($datas));
		}

		return response()->json($data);
	}

	public function index_pendidikan()
	{
        //variabel untuk menampung data
		$dataPendidikan = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','datapendidikan')->get();
		$jmlkomen = Comment::where('keterangan','=','datapendidikan')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$pendidikan = Pendidikanterakhir::all();
		foreach ($pendidikan as $key => $pendidikans) {

            // variabel untuk menampung data per field
			$dataField = [];

            // cek jumlah penduduk per desa. ex: desa dengan id 1
			$jumlahPenduduk = Penduduk::where('id_desa','123')->count();

            // cek agama ke data penduduk keseluruhan berdasarkan desa. ex: desa dengan id 1
			$penduduk = Penduduk::where('id_desa','123')->where('pendidikan',$pendidikans->id_pendidikanterakhir)->count();

            // cari persen total keseluruhan
			$jPersen = ($penduduk/$jumlahPenduduk)*100;

			$dataField['pendidikan'] = $pendidikans->pendidikanterakhir;

            // menambah data jumlah penduduk yang memiliki agama
			$dataField['jTotal'] = $penduduk;
			$dataField['jPersen'] = number_format($jPersen,2);


			$jenisKelamin = Jeniskelamin::all();

			foreach ($jenisKelamin as $key => $value) {
                # code...
                // $jmlPendudukPerJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->count();

				$pendudukJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->where('pendidikan',$pendidikans->id_pendidikanterakhir)->count();

               // return ($pendudukJK/$penduduk)*100;
				if ($penduduk != 0) {
					$jPersenJK = ($pendudukJK/$penduduk)*100;

					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = number_format($jPersenJK,2);

				} else {
					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = 0;
				}

			}
			array_push($dataPendidikan, $dataField);
		}


		return view('pendidikan',['anggaran' => $anggaran,'data' => $dataPendidikan, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}

	public function statistikPendidikan()
	{

		$color = [
			'#F66D44','#FEAE65',
			'#E6F69D','#AADEA7',
			'#64C2A6','#2D87BB',
			'#A5C1DC','#7B96EB',
			'#E9F6FA','#8df719',
			'#F3D000','#A48E0A',
			'#0E8CFF','#F908F9',
			'#F90808','#8832AA',
			'#972b2b', '#86561e',
			'#549705', '#f5a7d7',
		];

		$data['penduduk'] = Penduduk::where('id_desa', '123')->count();
		$data['kk'] = Kk::where('id_desa', '123')->count();

		$data['dataPendidikan'] = [];
		$pendidikan = Pendidikanterakhir::all();
		foreach ($pendidikan as $key => $list){
			$jml = Penduduk::where('id_desa', '123')->where('pendidikan',$list->id_pendidikanterakhir)->count();
			$datas = [];

			$datas['label'] = $list->pendidikanterakhir;
			$datas['value'] = $jml;
			$datas['highlight'] = $color[$key];
			$datas['color'] = $color[$key];

			array_push($data['dataPendidikan'], response()->json($datas));
		}

		return response()->json($data);
	}

	public function index_pekerjaan()
	{
        //variabel untuk menampung data
		$dataPekerjaan = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();  
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','datapekerjaan')->get();
		$jmlkomen = Comment::where('keterangan','=','datapekerjaan')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$pekerjaan = Pekerjaan::orderBy('pekerjaan', 'asc')->get();
		foreach ($pekerjaan as $key => $pekerjaans) {

            // variabel untuk menampung data per field
			$dataField = [];

            // cek jumlah penduduk per desa. ex: desa dengan id 1
			$jumlahPenduduk = Penduduk::where('id_desa','123')->count();

            // cek agama ke data penduduk keseluruhan berdasarkan desa. ex: desa dengan id 1
			$penduduk = Penduduk::where('id_desa','123')->where('pekerjaan',$pekerjaans->id_pekerjaan)->count();

            // cari persen total keseluruhan
			$jPersen = ($penduduk/$jumlahPenduduk)*100;

			$dataField['pekerjaan'] = $pekerjaans->pekerjaan;

            // menambah data jumlah penduduk yang memiliki agama
			$dataField['jTotal'] = $penduduk;
			$dataField['jPersen'] = number_format($jPersen,2);


			$jenisKelamin = Jeniskelamin::all();
                # code...
			foreach ($jenisKelamin as $key => $value) {
                # code...
                // $jmlPendudukPerJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->count();

				$pendudukJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->where('pekerjaan',$pekerjaans->id_pekerjaan)->count();

                // return ($pendudukJK/$penduduk)*100;
				if ($penduduk != 0) {
					$jPersenJK = ($pendudukJK/$penduduk)*100;

					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = number_format($jPersenJK,2);

				} else {
					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = 0;
				}
			}
			array_push($dataPekerjaan, $dataField);
		}


		return view('pekerjaan',['anggaran' => $anggaran,'data' => $dataPekerjaan, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}

	public function statistikPekerjaan()
	{

		$color = [
			'#E67E22', '#E67E22',
			'#E67E22','#F1C40F',
			'#00c0ef', '#3c8dbc',
			'#FEAE65', '#7B96EB',
			'#06D0FF','#8df719',
			'#F3D000','#E6F69D',
			'#0E8CFF','#F908F9',
			'#AADEA7','#8832AA',
			'#972b2b', '#86561e',
			'#549705', '#64C2A6',
			'#E6F69D', '#AADEA7',
			'#64C2A6', '#2D87BB',
			'#2D87BB', '#FEAE65',
			'#7982B9', '#BC5090',

		];

		$data['penduduk'] = Penduduk::where('id_desa', '123')->count();
		$data['kk'] = Kk::where('id_desa', '123')->count();

		$data['dataPekerjaan'] = [];
		$pekerjaan = Pekerjaan::all();
		foreach ($pekerjaan as $key => $list){
			$jml = Penduduk::where('id_desa', '123')->where('pekerjaan',$list->id_pekerjaan)->count();
			$datas = [];

			$datas['label'] = $list->pekerjaan;
			$datas['value'] = $jml;
			$datas['highlight'] = $color[$key];
			$datas['color'] = $color[$key];

			array_push($data['dataPekerjaan'], response()->json($datas));
		}

		return response()->json($data);
	}


	public function index_Jkelamin()
	{
        //variabel untuk menampung data
		$dataJkelamin = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','datagender')->get();
		$jmlkomen = Comment::where('keterangan','=','datagender')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$jkelamin = Jeniskelamin::all();
		foreach ($jkelamin as $key => $jkelamins) {

            // variabel untuk menampung data per field
			$dataField = [];

            // cek jumlah penduduk per desa. ex: desa dengan id 1
			$jumlahPenduduk = Penduduk::where('id_desa','123')->count();

            // cek agama ke data penduduk keseluruhan berdasarkan desa. ex: desa dengan id 1
			$penduduk = Penduduk::where('id_desa','123')->where('jenis_kelamin',$jkelamins->id_jeniskelamin)->count();

            // cari persen total keseluruhan
			$jPersen = ($penduduk/$jumlahPenduduk)*100;

			$dataField['jkelamin'] = $jkelamins->jeniskelamin;

            // menambah data jumlah penduduk yang memiliki agama
			$dataField['jTotal'] = $penduduk;
			$dataField['jPersen'] = number_format($jPersen,2);

			array_push($dataJkelamin, $dataField);
		}


		return view('gender',['anggaran' => $anggaran,'data' => $dataJkelamin, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}

	public function statistikJkelamin()
	{

		$color = [
			'#AADEA7', '#64C2A6',
			'#f39c12','#21F7ED',
			'#00c0ef', '#3c8dbc',
			'#d2d6de', '#7B96EB',
			'#06D0FF','#8df719',
			'#F3D000','#A48E0A',
			'#0E8CFF','#F908F9',
			'#F90808','#8832AA',
			'#972b2b', '#86561e',
			'#549705', '#f5a7d7',
		];

		$data['penduduk'] = Penduduk::where('id_desa', '123')->count();
		$data['kk'] = Kk::where('id_desa', '123')->count();

		$data['dataGender'] = [];
		$jkelamin = Jeniskelamin::all();
		foreach ($jkelamin as $key => $list){
			$jml = Penduduk::where('id_desa','123')->where('jenis_kelamin',$list->id_jeniskelamin)->count();
			$datas = [];

			$datas['label'] = $list->jeniskelamin;
			$datas['value'] = $jml;
			$datas['highlight'] = $color[$key];
			$datas['color'] = $color[$key];

			array_push($data['dataGender'], response()->json($datas));
		}

		return response()->json($data);
	}



	public function index_warganegara()
	{

        //variabel untuk menampung data
		$dataWarga = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','datawarganegara')->get();
		$jmlkomen = Comment::where('keterangan','=','datawarganegara')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$warganegara = Kewarganegaraan::all();
		foreach ($warganegara as $key => $wn) {

            // variabel untuk menampung data per field
			$dataField = [];

            // cek jumlah penduduk per desa. ex: desa dengan id 1
			$jumlahPenduduk = Penduduk::where('id_desa','123')->count();

            // cek agama ke data penduduk keseluruhan berdasarkan desa. ex: desa dengan id 1
			$penduduk = Penduduk::where('id_desa','123')->where('kewarganegaraan',$wn->id_kewarganegaraan)->count();

            // cari persen total keseluruhan
			$jPersen = ($penduduk/$jumlahPenduduk)*100;

			$dataField['warganegara'] = $wn->kewarganegaraan;

            // menambah data jumlah penduduk yang memiliki agama
			$dataField['jTotal'] = $penduduk;
			$dataField['jPersen'] = number_format($jPersen,2);


			$jenisKelamin = Jeniskelamin::all();

			foreach ($jenisKelamin as $key => $value) {
                # code...
				$pendudukJK = Penduduk::where('id_desa','123')->where('jenis_kelamin',$value->id_jeniskelamin)->where('kewarganegaraan',$wn->id_kewarganegaraan)->count();

                // $pendudukJK = Penduduk::all()->count();

                // return ($pendudukJK/$penduduk)*100;
				if ($penduduk != 0) {
					$jPersenJK = ($pendudukJK/$penduduk)*100;

					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = number_format($jPersenJK,2);

				} else {
					$dataField['jTotal'.$value->jeniskelamin] = $pendudukJK;
					$dataField['jPersen'.$value->jeniskelamin] = 0;
				}

			}
			array_push($dataWarga, $dataField);
		}


		return view('warga',['anggaran' => $anggaran,'data' => $dataWarga, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}

	public function statistikWarga()
	{

		$color = [
			'#FEAE65','#00a65a',
			'#f39c12','#21F7ED',
			'#00c0ef','#3c8dbc',
			'#d2d6de','#7B96EB',
			'#06D0FF','#8df719',
			'#F3D000','#A48E0A',
			'#0E8CFF','#F908F9',
			'#F90808','#8832AA',
			'#972b2b', '#86561e',
			'#549705', '#f5a7d7',
		];

		$data['penduduk'] = Penduduk::where('id_desa','123')->count();
		$data['kk'] = Kk::where('id_desa', '123')->count();

		$data['dataWarga'] = [];
		$warganegara = Kewarganegaraan::all();
		foreach ($warganegara as $key => $list){
			$jml = Penduduk::where('id_desa', '123')->where('kewarganegaraan',$list->id_kewarganegaraan)->count();
			$datas = [];

			$datas['label'] = $list->kewarganegaraan;
			$datas['value'] = $jml;
			$datas['highlight'] = $color[$key];
			$datas['color'] = $color[$key];

			array_push($data['dataWarga'], response()->json($datas));
		}

		return response()->json($data);
	}

	public function index_wilayahadministratif()
	{
        //variabel untuk menampung data
        // $dataWilayah = [];
		$agenda = Agenda::orderBy('created_at', 'desc')->where('id_desa','123')->paginate(3,['*'],'agenda');
		$artikel = Artikel::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get(); 
		$all = Comment::orderBy('created_at', 'desc')->limit(4)->get();     
		$komentar = Comment::where('keterangan','=','dataagama')->get();
		$jmlkomen = Comment::where('keterangan','=','dataagama')->count();
		$suarawarga = Suarawarga::orderBy('created_at', 'desc')->where('id_desa', '123')->paginate(4,['*'],'suarawarga');
		$kegiatan_desa = Kegiatan::where('id_desa','123')->orderBy('created_at', 'desc')->limit(3)->get();
		$anggaran = Anggaran::where('id_desa','123')->get();
         // panggil seluruh data agama
		$dusun = Dusun::where('id_desa','123')->orderBy('nama_dusun', 'ASC')->get();



		return view('wilayahadministratif',['anggaran' => $anggaran,'data' => $dusun, 'agenda'=>$agenda, 'artikels' =>$artikel, 'allkomen'=>$all, 'komentar'=>$komentar, 'jml'=>$jmlkomen,'suarawarga' => $suarawarga, 'kegiatan' => $kegiatan_desa]);
	}





}
