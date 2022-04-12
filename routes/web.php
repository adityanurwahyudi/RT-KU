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
        
        // Kriteria
        Route::get('/kriteria', 'KriteriaController@kriteria')->name('kriteria');

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

        // Surat Domisili
        Route::post('/surat/domisili/verifikasi', 'PagesController@verifikasi_domisili')->name('verifikasi_domisili');
        Route::get('/surat/domisili/delete/{id}', 'PagesController@delete_domisili')->name('delete_domisili');

        // Jadwal Ronda
        Route::get('/jadwal-ronda', 'JadwalRondaController@index')->name('jadwalronda');
        Route::get('/jadwal-ronda/datatable', 'JadwalRondaController@datatable')->name('jadwalronda.datatable');
        Route::get('/jadwal-ronda/create', 'JadwalRondaController@create')->name('jadwalronda.create');
        Route::post('/jadwal-ronda/save', 'JadwalRondaController@save')->name('jadwalronda.save');
        Route::get('/jadwal-ronda/edit/{id}', 'JadwalRondaController@edit')->name('jadwalronda.edit');
        Route::post('/jadwal-ronda/update', 'JadwalRondaController@update')->name('jadwalronda.update');
        Route::get('/jadwal-ronda/hapus/{id}', 'JadwalRondaController@hapus')->name('jadwalronda.hapus');
        Route::get('/jadwal-ronda/mail-send/{tgl}', 'JadwalRondaController@sendEmail')->name('jadwalronda.sendEmail');
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
    });
});

Route::name('warga.')->namespace('warga')->middleware('auth:user')->prefix('warga')->group(function () {

    Route::get('/index', 'PagesController@index');
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::get('/berita', 'PagesController@berita')->name('berita');
    Route::get('/galeri', 'PagesController@galeri')->name('galeri');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/service', 'PagesController@service')->name('service');
    Route::post('/service/domisili/tambah', 'PagesController@tambah_domisili')->name('tambah_domisili');
    Route::post('/service/domisili/edit', 'PagesController@edit_domisili')->name('edit_domisili');
    Route::get('/service/domisili/kirim/{id}', 'PagesController@kirim_domisili')->name('kirim_domisili');
    Route::get('/service/domisili/cetak/{id}', 'PagesController@cetak_domisili')->name('cetak_domisili');
    Route::get('/kegiatan', 'PagesController@kegiatan')->name('kegiatan');
    Route::get('/video', 'PagesController@video')->name('video');
    Route::get('/keuangan', 'PagesController@keuangan')->name('keuangan');
    Route::get('/keamanan', 'PagesController@keamanan')->name('keamanan');
    Route::get('/data-warga', 'PagesController@datawarga')->name('datawarga');
    Route::post('/data-warga/update', 'PagesController@datawarga_update')->name('datawarga_update');
    Route::get('/pindah', 'PagesController@pindah')->name('pindah');
    
});
