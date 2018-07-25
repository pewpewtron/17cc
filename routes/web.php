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

/*=========================================================================================
                                    LANDING ROUTE
=========================================================================================*/

Route::get('/', function () {
    return view('landing.landing');
});

Route::get('/comming', function () {
    return view('comming-soon');
});

Route::get('/faq', function () {
    return view('landing.faq');
});

Route::prefix('landing')->group(function(){
    Route::get('/pemrograman','LandingController@showPemrograman')->name('detail.prog');
    Route::get('/desainWeb','LandingController@showWeb')->name('detail.web');
    Route::get('/cerdasCermat','LandingController@showLcc')->name('detail.lcc');
    Route::get('/ideBisnis','LandingController@showIdea')->name('detail.idea');
    Route::get('/pengembangan-aplikasi-android','LandingController@showPaa')->name('detail.si');
});

/*=========================================================================================
                                    PESERTA ROUTE
=========================================================================================*/
/* AUTH PESERTA */

//response for ajax
Route::get('/participant/{id}', 'ParticipantController@show');

Route::get('/login', 'Auth\GroupLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\GroupLoginController@login');
Route::post('/logout', 'Auth\GroupLoginController@logout');

Route::prefix('daftar')->group(function(){
    Route::get('/pemrograman', 'Auth\GroupRegisterController@showProgRegistrationForm')->name('regis.prog');
    Route::get('/cerdascermat', 'Auth\GroupRegisterController@showLccRegistrationForm')->name('regis.lcc');
    Route::get('/desainweb', 'Auth\GroupRegisterController@showWebRegistrationForm')->name('regis.web');
    Route::get('/idebisnis', 'Auth\GroupRegisterController@showIdeaRegistrationForm')->name('regis.idea');
    Route::get('/android', 'Auth\GroupRegisterController@showPaaRegistrationForm')->name('regis.paa');
});

Route::post('/daftar', 'Auth\GroupRegisterController@register');

Route::resource('dashboard','DashboardController');

Route::get('/verifikasi','DashboardController@showVerificationForm');
Route::post('/verifikasi','DashboardController@uploadVerification');

Route::get('/upload','DashboardController@showUploadDataForm');
Route::post('/upload','DashboardController@uploadData');

Route::get('/uploadVideoAPK','DashboardController@showUploadVideoAPKForm');
Route::post('/uploadVideoAPK','DashboardController@uploadVideoAPK');

Route::get('/setting','DashboardController@showSettingForm');

Route::resource('/pesanUser','UserMassageController');

Route::get('/pesanUserKeluar','UserMassageController@pesanTerkirim');

Route::get('/pesanUserKeluarShow/{pesanUserKeluarShow}','UserMassageController@showMsgOut');

Route::delete('/pesanUserKeluar/{pesanUserKeluar}','UserMassageController@deletUserMsg');

Route::post('/change/password', 'DashboardController@gantiPassword');

Route::get('/verifyemail/{token}','Auth\GroupRegisterController@verify');

/*=========================================================================================
                                    ADMIN ROUTE
=========================================================================================*/

Route::get('/verifikasiPeserta','AdminController@showFormPembayaran');

Route::get('/logUpload','AdminController@showFormLogUpload');

Route::get('/tambahPeserta','AdminController@showFormTambahPeserta');

Route::get('/tambahJuri','AdminController@showFormTambahJuri');

Route::get('/inputFormPenilaian','AdminController@showFormInputPenilaian');

Route::resource('/pesanAdmin','AdminMassageController');

Route::get('/pesanAdminKeluar','AdminMassageController@showMsgOut');

Route::get('/pesanAdminKeluar/{pesanAdminKeluar}','AdminMassageController@msgOutShow');

Route::delete('/pesanAdminKeluar/{pesanAdminKeluar}','AdminMassageController@deleteMsg');

Route::post('/tambahJuriSimpan','AdminController@storeJury');

Route::post('/simpanPeserta','AdminController@storeGroup');

Route::post('/simpan','AdminController@storePeserta');

Route::get('/kelolakompetisi/{kelolakompetisi}','AdminController@showKelolaKompetisi');

Route::put('/simpanKompetisi/{simpanKompetisi}','AdminController@updateKompetisi');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@index')->name('admin.index');
    Route::get('/', 'AdminController@index')->name('admin.index');
    
    Route::get('/verif_group','AdminController@showFormVerifikasi');
    Route::post('/verif_group','AdminController@verifikasi');
    Route::post('/cetak-peserta','AdminController@print')->name('admin.cetakpeserta');
});

/*=========================================================================================
                                    JURY ROUTE
=========================================================================================*/

Route::prefix('juri')->group(function(){
    Route::get('/login', 'Auth\JuryLoginController@showLoginForm')->name('jury.login');
    Route::post('/login', 'Auth\JuryLoginController@login')->name('jury.login');
    Route::post('/logout', 'Auth\JuryLoginController@logout')->name('jury.logout');
    Route::get('/dashboard', 'JuryController@index')->name('jury.index');
    Route::get('/', 'JuryController@index')->name('jury.index');
});

Route::get('/rekap-nilai','JuryController@showRekapNilai');

Route::resource('/form-nilai','ScoreListController');

Route::get('/rekap-nilai-detail','JuryController@showFormDetailRekap');

Route::resource('/pesan','ScoreReqController');

Route::get('/juriSetting','JuryController@showFormSetting');

Route::put('/juriSetting/{juriSetting}','JuryController@updateJuri');

Route::get('/showform','JuryController@showFormDinamis');