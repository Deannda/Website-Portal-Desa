<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });


Route::get('/nodata','ProfilController@tidakadadata');
	
Route::get('/adminweb', 'loginController@index')->name('login');

Route::post('/login/checklogin', 'loginController@checklogin');




Route::group(['middleware' => 'auth'], function (){

Route::get('/home', 'AdmindesaController@home');
Route::get('/logout', 'loginController@logout')->name('logout');

// profil admin panel
Route::get('/edit_profile', 'AdmindesaController@dataprofil');
Route::post('/profil/edit/{id}', 'AdmindesaController@editprofil'); 


// jabatan admin panel
Route::get('/jabatan', 'perangkatKampungController@index');
Route::post('/jabatan/create', 'perangkatKampungController@create');
Route::post('/jabatan/edit/{id}', 'perangkatKampungController@edit');
Route::get('/jabatan/hapus/{id}', 'perangkatKampungController@hapus');


// agenda admin panel
Route::get('/agenda', 'AgendaController@index');
Route::post('/agenda/create', 'AgendaController@create');
Route::post('/agenda/edit/{id}', 'AgendaController@edit');
Route::get('/agenda/hapus/{id}', 'AgendaController@hapus');


// struktur jabatan admin panel
Route::get('/ListJabatan', 'ListjabatanController@index');
Route::post('/ListJabatan/create', 'ListjabatanController@create');
Route::post('/ListJabatan/edit/{id}', 'ListjabatanController@edit');
Route::get('/ListJabatan/hapus/{id}', 'ListjabatanController@hapus');

// artikel admin panel
Route::get('/Artikel', 'ArtikelController@index');
Route::get('/Artikel/create', 'ArtikelController@create');
Route::post('/Artikel/action_create', 'ArtikelController@action_create');
Route::get('/Artikel/edit/{id}', 'ArtikelController@edit');
Route::post('/Artikel/action_edit/{id}', 'ArtikelController@action_edit');
Route::get('/Artikel/hapus/{id}', 'ArtikelController@hapus');
Route::get('/Artikel/details/{id}', 'ArtikelController@details');


// kegiatan admin panel
Route::get('/Kegiatan', 'KegiatanController@index');
Route::get('/Kegiatan/create', 'KegiatanController@create');
Route::post('/Kegiatan/action_create', 'KegiatanController@action_create');
Route::get('/Kegiatan/edit/{id}', 'KegiatanController@edit');
Route::post('/Kegiatan/action_edit/{id}', 'KegiatanController@action_edit');
Route::get('/Kegiatan/hapus/{id}', 'KegiatanController@hapus');
Route::get('/Kegiatan/details/{id}', 'KegiatanController@details');

Route::post('/suarawarga','SuarawargaController@create');
// Route::get('/pesan/sukses','SuarawargaController@sukses');
Route::get('/suara_warga', 'SuarawargaController@index');
Route::get('/Suara_warga/hapus/{id}', 'SuarawargaController@hapus');
Route::get('suarawarga/namap/{nik}','PelayanansuratController@nama_penduduk');


// galeri foto admin panel
Route::get('/galeri_foto', 'GaleriFotoController@index');
Route::post('/galeri_foto/create', 'GaleriFotoController@create');
Route::get('/galeri_foto/hapus/{id}', 'GaleriFotoController@hapus');

// slider foto admin panel
Route::get('/foto_slider', 'FotosliderController@index');
Route::post('/foto_slider/create', 'FotosliderController@create');
Route::get('/foto_slider/hapus/{id}', 'FotosliderController@hapus');

// wilayahadministratif dusun admin panel
Route::get('/Wilayahadministratif', 'DusunController@index');
Route::post('/Wilayahadministratif/create', 'DusunController@create');
Route::post('/Wilayahadministratif/edit/{id}', 'DusunController@edit');
Route::get('/Wilayahadministratif/hapus/{id}', 'DusunController@hapus');

// anggaran admin panel
Route::get('/Anggaran', 'AnggaranController@index');
Route::get('/Anggaran/create', 'AnggaranController@create');
Route::post('/Anggaran/action_create', 'AnggaranController@action_create');
Route::get('/Anggaran/edit/{id}', 'AnggaranController@edit');
Route::post('/Anggaran/action_edit/{id}', 'AnggaranController@action_edit');
Route::get('/Anggaran/hapus/{id}', 'AnggaranController@hapus');
Route::get('/Anggaran/details/{id}', 'AnggaranController@details');
Route::post('/Anggaran/edit/{id}', 'AnggaranController@editanggaran'); 


});

//komentar

// Route::post('/komentar/create','PostCommentController@create');
// Route::post('/komentar/profil','PostCommentController@k_profil');
// Route::post('/komentar/sejarah','PostCommentController@k_sejarah');
// Route::post('/komentar/visimisi','PostCommentController@k_visimisi');
// Route::post('/komentar/perangkatdesa','PostCommentController@k_perangkatdesa');
// Route::post('/komentar/detailagenda','PostCommentController@k_detailagenda');

// Route::post('/komentar/agama','PostCommentController@ks_agama');
// Route::post('/komentar/pendidikan','PostCommentController@ks_pendidikan');
// Route::post('/komentar/pekerjaan','PostCommentController@ks_pekerjaan');
// Route::post('/komentar/warganegara','PostCommentController@ks_warganegara');
// Route::post('/komentar/gender','PostCommentController@ks_gender');


// Route::get('createStorage', function(){
//     Artisan::call('storage:link');
//     return 'success';
// });


Route::get('/anggarandesa','ProfilController@anggaran');


Route::get('/kegiatan_desa', 'ProfilController@kegiatan');

Route::get('/', 'DashboardController@index');
Route::get('/Listkegiatan', 'DashboardController@index_kegiatan');
Route::get('/Listberita', 'DashboardController@index_berita');
Route::get('/Listsuarawarga', 'DashboardController@index_suarawarga');

Route::get('/details/{id}', 'DashboardController@detail_artikel');
Route::get('/details_agenda/{id}', 'DashboardController@detail_agenda');
Route::get('/details_kegiatan/{id}', 'DashboardController@detail_kegiatan');
Route::get('/details_anggaran/{id}', 'DashboardController@detail_anggaran');


Route::get('/beranda', 'DashboardController@index');

Route::get('/index', 'ProfilController@index');

Route::get('/sejarah', 'ProfilController@sejarah');

Route::get('/profil', 'ProfilController@profil');

Route::get('/visimisi', 'ProfilController@visimisi');

Route::get('/perangkatdesa', 'ProfilController@perangkatdesa');

Route::get('/Listagenda', 'ProfilController@detail_agenda');
Route::get('/Allagenda', 'ProfilController@all_agenda');


Route::get('/wilayahadministratif', 'statistikController@index_wilayahadministratif');
// Route::get('/dataStatistik', 'statistikController@dataStatistik');

Route::get('/agama', 'statistikController@index_agama');
Route::get('/dataStatistik', 'statistikController@dataStatistik');

Route::get('/pendidikan', 'statistikController@index_pendidikan');
Route::get('/statistikPendidikan', 'statistikController@statistikPendidikan');

Route::get('/pekerjaan', 'statistikController@index_pekerjaan');
Route::get('/statistikPekerjaan', 'statistikController@statistikPekerjaan');

Route::get('/Warga', 'statistikController@index_warganegara');
Route::get('/statistikWarga', 'statistikController@statistikWarga');

Route::get('/Gender', 'statistikController@index_Jkelamin');
Route::get('/statistikJkelamin', 'statistikController@statistikJkelamin');

Route::get('/pelayanansurat', 'PelayanansuratController@index');

Route::post('/situ','PelayanansuratController@situ');
Route::get('situ/nama/{nik}','PelayanansuratController@nama_penduduk');
Route::get('situ/nikah/{nik}','PelayanansuratController@nikahortu');

Route::post('/kematian','PelayanansuratController@kematian');


Route::post('/domisili','PelayanansuratController@domisili');

Route::post('/bedanama','PelayanansuratController@bedanama');

Route::post('/jalan','PelayanansuratController@jalan');

Route::post('/izinkeramaian','PelayanansuratController@keramaian');

Route::post('/imb','PelayanansuratController@imb');

Route::post('/ktp','PelayanansuratController@ktp');

Route::post('/NonPNS','PelayanansuratController@nonpns');

Route::post('/pindah','PelayanansuratController@pindah');

Route::post('/skck','PelayanansuratController@skck');

Route::post('/sktm','PelayanansuratController@sktm');

Route::post('/sktmsekolah','PelayanansuratController@sktmsekolah');

Route::post('/usaha','PelayanansuratController@usaha');

Route::post('/ahliwaris','PelayanansuratController@ahliwaris');

Route::post('/pindahnikah','PelayanansuratController@pindahnikah');

Route::post('/profesi','PelayanansuratController@profesi');

Route::post('/penghasilan','PelayanansuratController@penghasilan');

Route::post('/dispensasinikah','PelayanansuratController@dispensasinikah');

Route::post('/kelahiran','PelayanansuratController@kelahiran');

Route::post('/belumnikah','PelayanansuratController@belumnikah');

Route::post('/pengantarnikah','PelayanansuratController@pengantarnikah');

Route::post('/izinorangtua','PelayanansuratController@izinorangtua');

Route::get('SuratPengantarPindah/ortu/{nik}','PelayanansuratController@ortu');

Route::get('/SuratPengantarPindah/nikahortu/{nik}', 'suratpindahController@nikahortu');

Route::get('SuratKTM/ortu/{nik}','PelayanansuratController@ortu');

