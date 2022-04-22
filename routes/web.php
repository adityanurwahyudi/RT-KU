<?php
use RealRashid\SweetAlert\Facades\Alert;
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
 
Route::get('/', function () {
    return view('landing');
});
//alert
//Alert::success('Success Title', 'Success Message');
Alert::toast('Toast Message', 'Toast Type');

Route::get('/register-tamu', 'FrontController@register_tamu')->name('register_tamu');
// Detail Event
Route::get('/detail-event/{id}/{page}', 'FrontController@detailEvent')->name('detail-event');
Route::post('/detail-event/pesan/', 'FrontController@pesan_tiket')->name('pesan_tiket');

// Kehadiran
Route::get('/event/kehadiran/{id}', 'FrontController@kehadiran')->name('event.kehadiran');
Route::post('/event/kehadiran/store', 'FrontController@store_kehadiran')->name('event.store_kehadiran');

// Cek Email
Route::get('cek-email','FrontController@cekEmail')->name('cekEmail');

Auth::routes(['register' => false]);
Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@getLogin')->middleware('guest');
    Route::post('/login', 'LoginController@postLogin')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');

    Route::get('/register', 'RegisterController@getRegister')->name('register');
    Route::post('/register/store', 'RegisterController@create')->name('register.store');
});

Route::name('admin.')->middleware('auth:admin')->group(function () {
    Route::name('rt.')->namespace('RT')->prefix('RT')->group(function () {
        // Dashboard
        Route::get('/dashboard-rt', 'DashboardAdminController@index')->name('dashboard');

        // User Management
        Route::get('/data-warga', 'UserManagementController@datawarga')->name('datawarga');
        Route::get('data-login-warga', 'UserManagementController@dataloginwarga')->name('dataloginwarga');

        // Penentuan Warga Tidak Mampu
        Route::get('/SPK-warga', 'PenentuanWargaController@SPKWarga')->name('SPK-warga');
        

        // Page Controller
        Route::get('/profile-RT', 'PagesController@profile')->name('profile');
        Route::get('/beritadankegiatan', 'PagesController@beritadankegiatan')->name('beritadankegiatan');
        Route::get('/galeri', 'PagesController@galeri')->name('galeri');
        Route::get('/keuangan', 'PagesController@keuangan')->name('keuangan');
        Route::get('/surat', 'PagesController@surat')->name('surat');
        Route::get('/kritiksaran', 'PagesController@kritiksaran')->name('kritiksaran');
        Route::get('/security', 'PagesController@security')->name('security');
        Route::get('/keluarmasukwarga', 'PagesController@keluarmasukwarga')->name('keluarmasukwarga');
        Route::get('/pengaduan', 'PagesController@pengaduan')->name('pengaduan');

        // Jadwal Ronda
        Route::get('/jadwal-ronda', 'JadwalRondaController@index')->name('jadwalronda');
        Route::get('/jadwal-ronda/datatable', 'JadwalRondaController@datatable')->name('jadwalronda.datatable');
        Route::get('/jadwal-ronda/create', 'JadwalRondaController@create')->name('jadwalronda.create');
        Route::post('/jadwal-ronda/save', 'JadwalRondaController@save')->name('jadwalronda.save');
        Route::get('/jadwal-ronda/edit/{id}', 'JadwalRondaController@edit')->name('jadwalronda.edit');
        Route::post('/jadwal-ronda/update', 'JadwalRondaController@update')->name('jadwalronda.update');
        Route::get('/jadwal-ronda/hapus/{id}', 'JadwalRondaController@hapus')->name('jadwalronda.hapus');

        // beritadankegiatan
        Route::get('/beritadankegiatan', 'BeritadankegiatanController@index')->name('beritadankegiatan');
        Route::post('/berita/proses', 'BeritadankegiatanController@proses')->name('berita.proses');
        Route::get('/berita/tambah', 'BeritadankegiatanController@tambah')->name('berita.tambah');
        Route::get('/berita/hapus/{id}', 'BeritadankegiatanController@hapus')->name('berita.hapus');
        Route::post('/berita/update', 'BeritadankegiatanController@update')->name('berita.update');
        Route::get('/berita/edit/{id}', 'BeritadankegiatanController@edit')->name('berita.edit');
        Route::post('/kegiatan/proses1', 'BeritadankegiatanController@proses1')->name('kegiatan.proses1');
        Route::get('/kegiatan/tambah1', 'BeritadankegiatanController@tambah1')->name('kegiatan.tambah1');
        Route::get('/kegiatan/hapus/{id}', 'BeritadankegiatanController@hapus')->name('kegiatan.hapus');
        Route::post('/kegiatan/update1', 'BeritadankegiatanController@update1')->name('kegiatan.update1');
        Route::post('/kegiatan/update', 'BeritadankegiatanController@update')->name('kegiatan.update');
        Route::get('/kegiatan/edit1/{id}', 'BeritadankegiatanController@edit1')->name('kegiatan.edit1');

        //keluarmasukwarga
        Route::get('/keluarmasukwarga', 'TamupindahController@index')->name('keluarmasukwarga');
        Route::post('/tamu/proses', 'TamupindahController@proses')->name('tamu.proses');
        Route::get('/tamu/hapus/{id}', 'TamupindahController@hapus')->name('tamu.hapus');
         Route::post('/pidah/proses1', 'TamupindahController@proses1')->name('pindah.proses1');
        Route::get('/pindah/hapus/{id}', 'TamupindahController@hapus')->name('pindah.hapus');

        //galeri
        Route::get('/galeri', 'GaleriController@index')->name('galeri');
        
        //dropzone
        Route::post('/foto/fileupload/','GaleriController@fileupload')->name('foto.fileupload');
        //foto
        Route::post('/foto/proses', 'GaleriController@proses')->name('foto.proses');
        Route::get('/foto/tambah', 'GaleriController@tambah')->name('foto.tambah');
        Route::get('/foto/edit/{id}', 'GaleriController@edit')->name('foto.edit');
        Route::get('/foto/hapus/{id}', 'GaleriController@hapus')->name('foto.hapus');
        
        //video
         Route::post('/video/proses1', 'GaleriController@proses1')->name('video.proses1');
        Route::get('/video/add', 'GaleriController@add')->name('video.add');
        Route::get('/video/hapus/{id}', 'GaleriController@hapus')->name('video.hapus');
        Route::post('/video/update', 'GaleriController@update')->name('video.update');
        Route::get('/video/edit/{id}', 'GaleriController@edit')->name('video.edit');
       
        //profileRT
        Route::get('/profile', 'ProfileController@index')->name('profile');
         Route::post('/profile/proses', 'ProfileController@proses')->name('profile.proses');
        Route::get('/profile/tambah', 'ProfileController@tambah')->name('profile.tambah');
        Route::get('/profile/hapus/{id}', 'ProfileController@hapus')->name('profile.hapus');
        Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
        Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');
        Route::get('/profile/edit1/{id}', 'ProfileController@edit1')->name('profile.edit1');
        
        // Kriteria
        Route::get('/kriteria', 'KriteriaController@kriteria')->name('kriteria');
        Route::post('/pekerjaan/proses', 'KriteriaController@proses')->name('pekerjaan.proses');
        Route::get('/pekerjaan/edit/{id}', 'KriteriaController@edit')->name('pekerjaan.edit');
        Route::get('/pekerjaan/tambah', 'KriteriaController@tambah')->name('pekerjaan.tambah');
        Route::post('/pekerjaan/update', 'KriteriaController@update')->name('pekerjaan.update');
        Route::get('/pekerjaan/hapus/{id}', 'KriteriaController@hapus')->name('pekerjaan.hapus');
       
        //keuangan
        Route::get('/keuangan', 'KeuanganController@index')->name('keuangan');

        //konfirmasipembayaran
        Route::post('/konfimrasipembayaran/proses1', 'KeuanganController@proses1')->name('konfirmasipembayaran.proses1');
        Route::post('/konfimrasipembayaran/proses2', 'KeuanganController@proses2')->name('konfirmasipembayaran.proses2');
        Route::get('/konfirmasipembayaran/edit/{id}', 'KeuanganController@edit')->name('konfirmasipembayaran.edit');
        Route::get('/konfirmasipembayaran/tambah2', 'KeuanganController@tambah2')->name('konfirmasipembayaran.tambah2');
        Route::post('/konfirmasipembayaran/update', 'KeuanganController@update')->name('konfirmasipembayaran.update');
        Route::get('/konfirmasipembayaran/hapus/{id}', 'KeuanganController@hapus')->name('konfirmasipembayaran.hapus');
        
        //qris
        Route::post('/qris/proses', 'KeuanganController@proses')->name('qris.proses');
        Route::get('/qris/tambah', 'KeuanganController@tambah')->name('qris.tambah');
        Route::get('/qris/hapus/{id}', 'KeuanganController@hapus')->name('qris.hapus');
        
        //pemasukanpengeluaran
        Route::post('/pemasukanpengeluaran/edit1', 'KeuanganController@edit')->name('pemasukanpengeluaran.edit1');
        Route::get('/pemasukanpengeluaran/tambah1', 'KeuanganController@tambah1')->name('pemasukanpengeluaran.tambah1');
        Route::get('/pemasukanpengeluaran/hapus/{id}', 'KeuanganController@hapus')->name('pemasukanpengeluaran.hapus');
        Route::post('/pemasukanpengeluaran/proses1', 'KeuanganController@proses1')->name('pemasukanpengeluaran.proses1');
        Route::post('/pemasukanpengeluaran/update1', 'KeuanganController@update1')->name('pemasukanpengeluaran.update1');
       
        //konfirmasipembayaran
        Route::post('/konfirmasipembayaran/proses2', 'KeuanganController@proses2')->name('konfirmasipembayaran.proses2');
        Route::get('/konfirmasipembayaran/tambah2', 'KeuanganController@tambah2')->name('konfirmasipembayaran.tambah2');
        Route::get('/konfirmasipembayaran/hapus/{id}', 'KeuanganController@hapus')->name('konfirmasipembayaran.hapus');
        Route::post('/konfirmasipembayaran/update2', 'KeuanganController@update2')->name('konfirmasipembayaran.update2');
        Route::get('/konfirmasipembayaran/edit2/{id}', 'KeuanganController@edit2')->name('konfirmasipembayaran.edit2');
        

        // security
        Route::get('/security', 'SecurityController@index')->name('security');
        Route::post('/security/proses', 'SecurityController@proses')->name('security.proses');
        Route::get('/security/tambah', 'SecurityController@tambah')->name('security.tambah');
        Route::get('/security/hapus/{id}', 'SecurityController@hapus')->name('security.hapus');
        Route::post('/security/update', 'SecurityController@update')->name('security.update');
        Route::get('/security/edit/{id}', 'SecurityController@edit')->name('security.edit');
        
        // Akses Kendaraan
        Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan');
        Route::post('/kendaraan/proses', 'KendaraanController@proses')->name('kendaraan.proses');
        Route::get('/kendaraan/hapus/{id}', 'KendaraanController@hapus')->name('kendaraan.hapus');
        Route::post('/kendaraan/update', 'KendaraanController@update')->name('kendaraan.update');
        Route::get('/kendaraan/edit/{id}', 'KendaraanController@edit')->name('kendaraan.edit');

        // kritidansaran
        Route::get('/kritiksaran', 'KritiksaranController@index')->name('kritiksaran');
        Route::post('/kritiksaran/store', 'KritiksaranController@store')->name('kritiksaran.store');
        Route::get('/kritiksaran/hapus/{id}', 'KritiksaranController@hapus')->name('kritiksaran.hapus');
   
        //pengaduan
        Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
        Route::post('/pengaduan/proses', 'PengaduanController@proses')->name('pengaduan.proses');
        Route::get('/pengaduan/hapus/{id}', 'PengaduanController@hapus')->name('pengaduan.hapus');
        
        // kendaraan
        Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan');
        Route::post('/kendaraan/store', 'KendaraanController@store')->name('kendaraan.store');
        Route::get('/kendaraan/tambah', 'KendaraanController@tambah')->name('kendaraan.tambah');
        Route::get('/kendaraan/hapus/{id}', 'KendaraanController@hapus')->name('kendaraan.hapus');
        Route::post('/kendaraan/update', 'KendaraanController@update')->name('kendaraan.update');
        Route::get('/kendaraan/edit/{id}', 'KendaraanController@edit')->name('kendaraan.edit');


    });
    Route::name('rw.')->namespace('RW')->prefix('RW')->group(function () {
        // Dashboard
        Route::get('/dashboard-rw', 'DashboardAdminController@index')->name('dashboard');
    });
    Route::name('kelurahan.')->namespace('kelurahan')->prefix('kelurahan')->group(function () {
        // Dashboard
        Route::get('/dashboard-kelurahan', 'DashboardAdminController@index')->name('dashboard');
    });
});

Route::name('warga.')->namespace('warga')->middleware('auth:user')->prefix('warga')->group(function () {

    Route::get('/index', 'PagesController@index');
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::get('/berita', 'PagesController@berita')->name('berita');
    Route::get('/galeri', 'PagesController@galeri')->name('galeri');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/service', 'PagesController@service')->name('service');
    Route::get('/kegiatan', 'PagesController@kegiatan')->name('kegiatan');
    Route::get('/video', 'PagesController@video')->name('video');
    Route::get('/keuangan', 'PagesController@keuangan')->name('keuangan');
    Route::get('/datawargaaa', 'PagesController@datawargaa')->name('datawargaa');
    Route::get('/keamanan', 'PagesController@keamanan')->name('keamanan');
    Route::get('/data-warga', 'PagesController@datawarga')->name('datawarga');
    Route::post('/data-warga/update', 'PagesController@datawarga_update')->name('datawarga_update');
    Route::get('/pindah', 'PagesController@pindah')->name('pindah');
    

});

