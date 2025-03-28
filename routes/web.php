<?php

use App\Models\BiodataModel;
use App\Models\QualityControlModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\DataBiodataController;
use App\Http\Controllers\HasilDakurController;
use App\Http\Controllers\HasilDataUkurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\QualityControlContoller;
use App\Http\Controllers\UserController;
use App\Models\HasilDakurModel;

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


//login
route::get('/login', [LoginController::class, 'login'])->name('login');
route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
//logout
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//register
route::get('/register', [LoginController::class, 'register'])->name('register');
route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::group(['middleware' => 'revalidate'], function () {
    Route::middleware(['auth', 'approved'])->group(function () {


        Route::middleware(['role:admin'])->group(function () {
            //dashboard
            route::get('/dashboard', [AdminController::class, 'index']);
            route::get('/dashboard', [
                AdminController::class,
                'dashboard'
            ])->name('dashboard');

            //biodata
            route::get('/biodata', [
                BiodataController::class,
                'index'
            ])->name('biodata');
            route::get('/tambahbiodata', [BiodataController::class, 'tambahbiodata'])->name('tambahbiodata');
            route::post('/insertbiodata', [BiodataController::class, 'insertbiodata'])->name('insertbiodata');
            Route::get('/tampilbiodata/{id}', [BiodataController::class, 'tampilbiodata'])->name('tampilbiodata');
            Route::post('/updatebiodata/{id}', [BiodataController::class, 'updatebiodata'])->name('updatebiodata');
            Route::get('/delete/{id}', [BiodataController::class, 'delete'])->name('delete');
            Route::post('/biodata/import', [BiodataController::class, 'import'])->name('biodata.import');
           
            //qualitycontol
            route::get('/qualitycontrol', [
                QualityControlContoller::class,
                'index'
            ])->name('qualitycontrol');
            route::get('/tambahquality', [QualityControlContoller::class, 'tambahquality'])->name('tambahquality');
            route::post('/insertquality', [QualityControlContoller::class, 'insertquality'])->name('insertquality');
            Route::get('/tampilquality/{id}', [QualityControlContoller::class, 'tampilquality'])->name('tampilquality');
            Route::post('/updatequality/{id}', [QualityControlContoller::class, 'updatequality'])->name('updatequality');
            Route::get('/deletequality/{id}', [QualityControlContoller::class, 'deletequality'])->name('deletequality');

            //hasildakur
            route::get('/hasildakur', [
                HasilDakurController::class,
                'index'
            ])->name('hasildakur');
            route::get('/tambahhasildakur', [HasilDakurController::class, 'tambahhasildakur'])->name('tambahhasildakur');
            route::post('/inserthasildakur', [HasilDakurController::class, 'inserthasildakur'])->name('inserthasildakur');
            Route::get('/tampilhasildakur/{id}', [HasilDakurController::class, 'tampilhasildakur'])->name('tampilhasildakur');
            Route::post('/updatehasildakur/{id}', [HasilDakurController::class, 'updatehasildakur'])->name('updatehasildakur');
            Route::get('/deletehasildakur/{id}', [HasilDakurController::class, 'deletehasildakur'])->name('deletehasildakur');
            Route::post('/projects/delete-selected', [HasilDakurController::class, 'deleteSelected'])->name('projects.deleteSelected');
            Route::get('/hasilfilterdakur', [HasilDakurController::class, 'filter'])->name('hasilfilterdakur');
            Route::get('/print/{id}', [HasilDakurController::class, 'print'])->name('printdakur');
            Route::post('/projects/print-selected', [HasilDakurController::class, 'printSelected'])->name('projects.printSelected');

            //proyek
            route::get('/proyek', [
                ProyekController::class,
                'index'
            ])->name('proyek');
            route::get('/tambahproyek', [ProyekController::class, 'tambahproyek'])->name('tambahproyek');
            route::post('/insertproyek', [ProyekController::class, 'insertproyek'])->name('insertproyek');
            Route::get('/tampilproyek/{id}', [ProyekController::class, 'tampilproyek'])->name('tampilproyek');
            Route::post('/updateproyek/{id}', [ProyekController::class, 'updateproyek'])->name('updateproyek');
            Route::get('/deleteproyek/{id}', [ProyekController::class, 'deleteproyek'])->name('deleteproyek');

            //profile
            Route::get(
                '/profile',
                [ProfileController::class, 'edit']
            )->name('profileedit');
            Route::post('/profile', [ProfileController::class, 'update'])->name('profileupdate');

            //approve user
            Route::get('/users', [UserController::class, 'index'])->name('users');
            Route::get('/users/approve/{id}', [UserController::class, 'approve'])->name('usersapprove');
            Route::get('/deleteapprove/{id}', [AdminController::class, 'deleteapprove'])->name('deleteapprove');
        });


        //frdakur
        route::get('/', [
            HasilDakurController::class,
            'frindex'
        ])->name('frdakur');
        route::post('/insertfrdakur', [HasilDakurController::class, 'insertfrdakur'])->name('insertfrdakur');

        //manual
        route::get('/manual', [
            HasilDakurController::class,
            'manual'
        ])->name('manual');
        route::post('/insertmanual', [HasilDakurController::class, 'insertmanual'])->name('insertmanual');

        //frbiodata
        route::get('/frbiodata', [
            BiodataController::class,
            'frindex'
        ])->name('frbiodata');
        route::post('/insertfrbiodata', [BiodataController::class, 'insertfrbiodata'])->name('insertfrbiodata');
    });
});
