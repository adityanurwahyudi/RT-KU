<?php
use RealRashid\SweetAlert\Facades\Alert;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteSer$val->iiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Route::get('/', function () {
    return view('landing');
});

Route::get('/register-tamu', 'FrontController@register_tamu')->name('register_tamu');
// Detail Event
Route::get('/detail-event/{id}/{page}', 'FrontController@detailEvent')->name('detail-event');
Route::post('/detail-event/pesan/', 'FrontController@pesan_tiket')->name('pesan_tiket');

// Kehadiran
Route::get('/event/kehadiran/{id}', 'FrontController@kehadiran')->name('event.kehadiran');
Route::post('/event/kehadiran/store', 'FrontController@store_kehadiran')->name('event.store_kehadiran');

Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
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

        Route::get('/data-warga', 'UserManagementController@datawarga')->name('datawarga');\
        
        // User Management
        Route::get('data-login-warga', 'UserManagementController@dataloginwarga')->name('dataloginwarga');
        Route::get('data-login-warga/create', 'UserManagementController@dataloginwarga_create')->name('dataloginwarga_create');
        Route::post('data-login-warga/save', 'UserManagementController@dataloginwarga_save')->name('dataloginwarga_save');
        Route::get('data-login-warga/edit/{id}', 'UserManagementController@dataloginwarga_edit')->name('dataloginwarga_edit');
        Route::post('data-login-warga/update', 'UserManagementController@dataloginwarga_update')->name('dataloginwarga_update');
        Route::get('data-login-warga/hapus/{id}', 'UserManagementController@dataloginwarga_hapus')->name('dataloginwarga_hapus');

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
        
        // Tanga Tangan
        Route::post('/tanda-tangan/tambah', 'PagesController@tambah_ttd')->name('tambah_ttd');
        Route::post('/tanda-tangan/update', 'PagesController@update_ttd')->name('update_ttd');

        // Surat Domisili
        Route::post('/surat/domisili/verifikasi', 'PagesController@verifikasi_domisili')->name('verifikasi_domisili');
        Route::get('/surat/domisili/delete/{id}', 'PagesController@delete_domisili')->name('delete_domisili');

        // Jadwal Ronda
        Route::get('/jadwal-ronda', 'JadwalRondaController@index')->name('jadwalronda');
        Route::get('/jadwalronda/cetak_jadwalronda', 'JadwalRondaController@cetak_jadwalronda')->name('jadwalronda.cetak_jadwalronda');
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

        //datakependudukanwarga
        Route::get('/datawarga/cetak_datawarga', 'DataKependudukanController@cetak_datawarga')->name('datawarga.cetak_datawarga');
        Route::get('/datawarga/cetak_datawargatidakmampu', 'DataKependudukanController@cetak_datawargatidakmampu')->name('datawarga.cetak_datawargatidakmampu');;
        
        Route::post('/datawarga/prosess', 'DataKependudukanController@prosess')->name('datawarga.prosess');
        Route::get('/datawarga/tambah', 'DataKependudukanController@tambah')->name('datawarga.tambah');
        Route::get('/datawarga/hapus/{id}', 'DataKependudukanController@hapus')->name('datawarga.hapus');
        Route::post('/datawarga/update', 'DataKependudukanController@update')->name('datawarga.update');
        Route::get('/datawarga/edit/{id}', 'DataKependudukanController@edit')->name('datawarga.edit');

        //keluarmasukwarga
        Route::get('/keluarmasukwarga', 'TamupindahController@index')->name('keluarmasukwarga');
        Route::get('/tamu/cetak_tamu', 'TamupindahController@cetak_tamu')->name('tamu.cetak_tamu');
        Route::post('/tamu/proses', 'TamupindahController@proses')->name('tamu.proses');
        Route::get('/tamu/hapus/{id}', 'TamupindahController@hapus')->name('tamu.hapus');
         Route::get('/pindah/cetak_pindah', 'TamupindahController@cetak_pindah')->name('pindah.cetak_pindah');
        Route::get('/pindah/hapus/{id}', 'TamupindahController@hapus')->name('pindah.hapus');

        //galeri
        Route::get('/galeri', 'GaleriController@index')->name('galeri');

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
        Route::get('/keuangan/cetak_keuangan', 'KeuanganController@cetak_keuangan')->name('keuangan.cetak_keuangan');
        
        //qris
        Route::post('/qris/proses', 'KeuanganController@proses')->name('qris.proses');
        Route::get('/qris/tambah', 'KeuanganController@tambah')->name('qris.tambah');
        Route::get('/qris/hapus/{id}', 'KeuanganController@hapus')->name('qris.hapus');

        //keuangan
        Route::get('/keuangan/edit/{id}', 'KeuanganController@edit')->name('keuangan.edit');
        Route::get('/keuangan/tambahh', 'KeuanganController@tambahh')->name('keuangan.tambahh');
        Route::get('/keuangan/hapus/{id}', 'KeuanganController@hapus')->name('keuangan.hapus');
        Route::post('/keuangan/prosess', 'KeuanganController@prosess')->name('keuangan.prosess');
        Route::post('/keuangan/update', 'KeuanganController@update')->name('keuangan.update');

        // security
        Route::get('/security', 'SecurityController@index')->name('security');
        Route::post('/security/proses', 'SecurityController@proses')->name('security.proses');
        Route::get('/security/tambah', 'SecurityController@tambah')->name('security.tambah');
        Route::get('/security/hapus/{id}', 'SecurityController@hapus')->name('security.hapus');
        Route::post('/security/update', 'SecurityController@update')->name('security.update');
        Route::get('/security/edit/{id}', 'SecurityController@edit')->name('security.edit');
        
        // Akses Kendaraan
        Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan');
        Route::get('/kendaraan/cetak_kendaraan', 'KendaraanController@cetak_kendaraan')->name('kendaraan.cetak_kendaraan');
        Route::get('/kendaraan/hapus/{id}', 'KendaraanController@hapus')->name('kendaraan.hapus');
        Route::post('/kendaraan/update', 'KendaraanController@update')->name('kendaraan.update');
        Route::get('/kendaraan/edit/{id}', 'KendaraanController@edit')->name('kendaraan.edit');

        // kritidansaran
        Route::get('/kritiksaran', 'KritiksaranController@index')->name('kritiksaran');
        Route::get('/kritiksaran/hapus/{id}', 'KritiksaranController@hapus')->name('kritiksaran.hapus');
   
        //pengaduan
        Route::get('/pengaduan', 'PengaduanController@index')->name('pengaduan');
        Route::get('/pengaduan/cetak_pengaduan', 'PengaduanController@cetak_pengaduan')->name('pengaduan.cetak_pengaduan');
        Route::get('/pengaduan/hapus/{id}', 'PengaduanController@hapus')->name('pengaduan.hapus');
        
        // kendaraan
        Route::get('/kendaraan', 'KendaraanController@index')->name('kendaraan');
        Route::post('/kendaraan/store', 'KendaraanController@store')->name('kendaraan.store');
        Route::get('/kendaraan/tambah', 'KendaraanController@tambah')->name('kendaraan.tambah');
        Route::get('/kendaraan/hapus/{id}', 'KendaraanController@hapus')->name('kendaraan.hapus');
        Route::post('/kendaraan/update', 'KendaraanController@update')->name('kendaraan.update');
        Route::get('/kendaraan/edit/{id}', 'KendaraanController@edit')->name('kendaraan.edit');

        Route::get('/jadwal-ronda/mail-send/{tgl}', 'JadwalRondaController@sendEmail')->name('jadwalronda.sendEmail');

        // notification
        Route::get('/notification', 'PagesController@notification')->name('notification');
    });
    Route::name('rw.')->namespace('RW')->prefix('RW')->group(function () {
        // Dashboard
        Route::get('/dashboard-rw', 'DashboardAdminController@index')->name('dashboard');
        
        // User Management
        Route::get('data-login-warga', 'UserManagementController@dataloginwarga')->name('dataloginwarga');
        Route::get('data-login-warga/create', 'UserManagementController@dataloginwarga_create')->name('dataloginwarga_create');
        Route::post('data-login-warga/save', 'UserManagementController@dataloginwarga_save')->name('dataloginwarga_save');
        Route::get('data-login-warga/edit/{id}', 'UserManagementController@dataloginwarga_edit')->name('dataloginwarga_edit');
        Route::post('data-login-warga/update', 'UserManagementController@dataloginwarga_update')->name('dataloginwarga_update');
        Route::get('data-login-warga/hapus/{id}', 'UserManagementController@dataloginwarga_hapus')->name('dataloginwarga_hapus');
        
        Route::get('/rt/datatable', 'DataKependudukanController@datatable')->name('rt.datatable');
    
    
        Route::get('datawarga', 'DataKependudukannController@datawarga')->name('datawarga');
        Route::get('/datawarga/cetak_datawarga', 'DataKependudukannController@cetak_datawarga')->name('datawarga.cetak_datawarga');
        Route::get('pengaduan', 'DataKependudukannController@pengaduan')->name('pengaduan');
        Route::get('/pengaduan/cetak_pengaduan', 'DataKependudukannController@cetak_pengaduan')->name('pengaduan.cetak_pengaduan');
        Route::get('kendaraan', 'DataKependudukannController@kendaraan')->name('kendaraan');
        Route::get('/kendaraan/cetak_kendaraan', 'DataKependudukannController@cetak_kendaraan')->name('kendaraan.cetak_kendaraan');
        Route::get('keluarmasukwarga', 'DataKependudukannController@keluarmasukwarga')->name('keluarmasukwarga');
        Route::get('/tamu/cetak_tamu', 'DataKependudukannController@cetak_tamu')->name('tamu.cetak_tamu');
        Route::get('/pindah/cetak_pindah', 'DataKependudukannController@cetak_pindah')->name('pindah.cetak_pindah');
        Route::get('kritiksaran', 'DataKependudukannController@kritiksaran')->name('kritiksaran');
    });





    Route::name('kelurahan.')->namespace('kelurahan')->prefix('kelurahan')->group(function () {
        // Dashboard
        Route::get('/dashboard-kelurahan', 'DashboardAdminController@index')->name('dashboard');

        // User Management
        Route::get('data-login-warga', 'UserManagementController@dataloginwarga')->name('dataloginwarga');
        Route::get('data-login-warga/create', 'UserManagementController@dataloginwarga_create')->name('dataloginwarga_create');
        Route::post('data-login-warga/save', 'UserManagementController@dataloginwarga_save')->name('dataloginwarga_save');
        Route::get('data-login-warga/edit/{id}', 'UserManagementController@dataloginwarga_edit')->name('dataloginwarga_edit');
        Route::post('data-login-warga/update', 'UserManagementController@dataloginwarga_update')->name('dataloginwarga_update');
        Route::get('data-login-warga/hapus/{id}', 'UserManagementController@dataloginwarga_hapus')->name('dataloginwarga_hapus');
    
        Route::get('datawarga', 'DataKependudukanController@datawarga')->name('datawarga');
    
    });
});

Route::name('warga.')->namespace('warga')->middleware('auth:user')->prefix('warga')->group(function () {

    Route::get('/index', 'PagesController@index');
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::get('/berita', 'PagesController@berita')->name('berita');
    Route::get('/galeri', 'PagesController@galeri')->name('galeri');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/service', 'PagesController@service')->name('service');
   // surat domisili
    Route::post('/service/domisili/tambah', 'PagesController@tambah_domisili')->name('tambah_domisili');
    Route::post('/service/domisili/edit', 'PagesController@edit_domisili')->name('edit_domisili');
    Route::get('/service/domisili/kirim/{id}', 'PagesController@kirim_domisili')->name('kirim_domisili');
    Route::get('/service/domisili/cetak/{id}', 'PagesController@cetak_domisili')->name('cetak_domisili');
   // surat pengantar
    Route::post('/service/pengantar/tambah', 'PagesController@tambah_pengantar')->name('tambah_pengantar');
    Route::post('/service/pengantar/edit', 'PagesController@edit_pengantar')->name('edit_pengantar');
    Route::get('/service/pengantar/kirim/{id}', 'PagesController@kirim_pengantar')->name('kirim_pengantar');
    Route::get('/service/pengantar/cetak/{id}', 'PagesController@cetak_pengantar')->name('cetak_pengantar');
    // surat keterangan kematian
    Route::post('/service/kematian/tambah', 'PagesController@tambah_kematian')->name('tambah_kematian');
    Route::post('/service/kematian/edit', 'PagesController@edit_kematian')->name('edit_kematian');
    Route::get('/service/kematian/kirim/{id}', 'PagesController@kirim_kematian')->name('kirim_kematian');
    Route::get('/service/kematian/cetak/{id}', 'PagesController@cetak_kematian')->name('cetak_kematian');
    
    Route::get('/kegiatan', 'PagesController@kegiatan')->name('kegiatan');
    Route::get('/video', 'PagesController@video')->name('video');
    Route::get('/keuangan', 'PagesController@keuangan')->name('keuangan');
    Route::get('/datawargaaa', 'PagesController@datawargaa')->name('datawargaa');
    Route::get('/keamanan', 'PagesController@keamanan')->name('keamanan');
    Route::get('/data-warga', 'PagesController@datawarga')->name('datawarga');
    Route::post('/data-warga/update', 'PagesController@datawarga_update')->name('datawarga_update');
    Route::get('/pindah', 'PagesController@pindah')->name('pindah');
    Route::get('/profil', 'PagesController@profil')->name('profil');
    Route::post('/profil/update', 'PagesController@profil_update')->name('profil_update');

    

    Route::post('/datawarga/prosesdatawarga', 'PagesController@prosesdatawarga')->name('prosesdatawarga');
    Route::post('/datawarga/prosespindah', 'PagesController@prosespindah')->name('prosespindah');
    Route::post('/datawarga/akun', 'PagesController@akun')->name('akun');
    Route::post('/kendaraan/storekendaraan', 'PagesController@storekendaraan')->name('storekendaraan');
    Route::post('/kritiksaran/storekritiksaran', 'PagesController@storekritiksaran')->name('storekritiksaran');
    Route::post('/pengaduan/prosespengaduan', 'PagesController@prosespengaduan')->name('prosespengaduan');
});

