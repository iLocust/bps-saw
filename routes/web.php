<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KriteriasController;
use App\Http\Controllers\SubkriteriasController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\RankingController;


use App\Http\Controllers;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pekerja;
use App\Http\Controllers\Pengawas;


Route::redirect('/', '/login');

Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'role:admin', 'as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::get('home', [Admin\HomeController::class, 'home'])->name('home');
        Route::get('/penugasan', [Admin\PekerjaanController::class, 'penugasan'])->name('jobs.penugasan');
        Route::post('/penugasan', [Admin\PekerjaanController::class, 'storePenugasan'])->name('jobs.penugasan.store');

        // Route::get('/pekerjaan', function () {
        //     return view('pekerjaan');
        // });
    });

    Route::group(['middleware' => 'role:pekerja', 'as' => 'pekerja.', 'prefix' => 'pekerja'], function () {
        Route::get('home', [Pekerja\HomeController::class, 'home'])->name('home');
        Route::get('/pekerjaan', [Pekerja\HomeController::class, 'pekerjaan'])->name('pekerjaan');
        Route::post('pekerjaan/{id}/selesai', [Pekerja\HomeController::class, 'selesai'])->name('pekerjaan.selesai');

    });

    Route::group(['middleware' => 'role:pengawas', 'as' => 'pengawas.', 'prefix' => 'pengawas'], function () {
        Route::get('home', [Pengawas\HomeController::class, 'home'])->name('home');
        Route::get('/penugasan', [Pengawas\PekerjaanController::class, 'penugasan'])->name('jobs.penugasan');
        Route::post('/penugasan', [Pengawas\PekerjaanController::class, 'storePenugasan'])->name('jobs.penugasan.store');
    });

    // Hanya admin dan pengawas
    Route::group(['middleware' => 'role:admin,pengawas'], function () {
        Route::get('surat-tugas/create', [Controllers\SuratTugasController::class, 'create'])->name('surat-tugas.create');
        Route::post('surat-tugas', [Controllers\SuratTugasController::class, 'store'])->name('surat-tugas.store');
        Route::get('pegawai/create', [Controllers\PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('pegawai/create', [Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('list-job', [Controllers\PenugasanKerjaController::class, 'index'])->name('list-job');
        Route::delete('job/{job}', [Controllers\PenugasanKerjaController::class, 'delete'])->name('list-job.delete');
        
        // Route::get('add-pekerja', [Controllers\RegisterController::class, 'create'])->name('register.create');
        // Route::post('add-pekerja', [Controllers\RegisterController::class, 'store'])->name('register.store');


    });

    Route::redirect('/home', 'login')->name('home');

    Route::get('/setting', function () {
        return view('features-setting');
    });

    // Route::get('/setting-details', function () {
    //     return view('features-setting-details');
    // });
    Route::get('settings/create', [Controllers\UsersController::class, 'create'])->name('settings.create');
    Route::post('settings/store', [Controllers\UsersController::class, 'store'])->name('settings.store');

    Route::get('/kriteria',[KriteriasController::class, 'index'])->name('kriteria');
    Route::get('kriterias/create', [Controllers\KriteriasController::class, 'create'])->name('kriterias.create');
    Route::post('kriterias/store', [Controllers\KriteriasController::class, 'store'])->name('kriterias.store');
    Route::delete('kriterias/{kriteria}', [Controllers\KriteriasController::class, 'delete'])->name('kriterias.delete');

    Route::get('/subkriteria',[SubkriteriasController::class, 'index'])->name('subkriteria');
    Route::get('subkriterias/create', [Controllers\SubkriteriasController::class, 'create'])->name('subkriterias.create');
    Route::post('subkriterias/store', [Controllers\SubkriteriasController::class, 'store'])->name('subkriterias.store');
    Route::delete('subkriterias/{subkriteria}', [Controllers\SubkriteriasController::class, 'delete'])->name('subkriterias.delete');

    Route::get('/penilaian',[PenilaianController::class, 'index'])->name('penilaian');
    Route::get('penilaian/create',[PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('penilaian/store',[PenilaianController::class, 'store'])->name('penilaian.store');

    Route::get('/normalisasi',[NormalisasiController::class, 'index'])->name('normalisasi');

    Route::get('/ranking',[RankingController::class, 'index'])->name('ranking');

    
    Route::get('/503', function () {
        return view('/app/503');
    });

    Route::get('/credits', function () {
        return view('/app/credits');
    });

});
