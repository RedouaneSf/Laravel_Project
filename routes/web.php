<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/home', function () {
    return view('home');
});
/* route page*/

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('pages.home');
Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('pages.about');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('pages.contact');
Route::get('/gallerie', [App\Http\Controllers\PagesController::class, 'gallerie'])->name('pages.gallerie');
/*Route::get('/car', [App\Http\Controllers\PagesController::class, 'cars'])->name('pages.car');*/

/*Car route*/
Route::get('/car/create', [App\Http\Controllers\CarsController::class, 'create'])->name('createCar');
Route::resource('/car',App\Http\Controllers\CarsController::class);
/*Auth route*/
Auth::routes();

/*loueur car*/
Route::get('/loueur/cars', [App\Http\Controllers\LoursController::class, 'indexbyuser'])->name('loueur.car');

Route::get('auth/home', [App\Http\Controllers\Auth\HomeController::class, 'index'])->name('auth.home')->middleware('isAdmin');
Route::get('loueur/home', [App\Http\Controllers\Loueur\HomeController::class, 'index'])->name('loueur.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
Route::get('/change-status-loueur/{id}',[App\Http\Controllers\LoursController ::class,'changeStatusCar']);
Route::get('/Loueur/profile', [App\Http\Controllers\LoursController::class, 'profile'])->name('Loueur.profile');
//update
Route::get('/Loueur/profile/{profile}/edit',[App\Http\Controllers\LoursController::class,'edit'])->name('ProfileLoueur.edit');
Route::put('/Loueur/profile/{profile}',[App\Http\Controllers\LoursController::class,'update'])->name('ProfileLoueur.update');

/*Reservation*/

Route::get('/reservation/{idCar}', [App\Http\Controllers\ReservationController::class, 'show'])
->where('idCar','\d+')
->name('reservation.show');

Route::post('/Profile/store', [App\Http\Controllers\ReservationController::class, 'store'])->name('store');
Route::get('/Loueur/reservation', [App\Http\Controllers\LoursController::class, 'indexbyreservation'])->name('loueur.reservation');

Route::get('/change-status/{idCar}',[App\Http\Controllers\CarsController::class,'changeStatus']);


/*-Client routes-*/

Route::get('/client/index', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
Route::get('/client/reservation', [App\Http\Controllers\ClientController::class, 'showreservation'])->name('client.reservation');
Route::get('/Client/profile', [App\Http\Controllers\ClientController::class, 'profile'])->name('client.profile');
//update
Route::get('/Client/profile/{profile}/edit',[App\Http\Controllers\ClientController::class,'edit'])->name('ProfileClient.edit');
Route::put('/Client/profile/{profile}',[App\Http\Controllers\ClientController::class,'update'])->name('ProfileClient.update');


/*Admin Routes*/
Route::get('/Admin/index', [App\Http\Controllers\AdminController::class, 'index2'])->name('admin.index');
Route::get('/Admin/profile', [App\Http\Controllers\AdminController::class, 'profile'])->name('admin.profile');
Route::get('/Admin/dashboard', [App\Http\Controllers\AdminController::class, 'Dashboard'])->name('admin.dashboard');
Route::get('/change-status-admin/{id}',[App\Http\Controllers\AdminController ::class,'changeStatusAdmin']);
//update
Route::get('/Admin/profile/{profile}/edit',[App\Http\Controllers\AdminController::class,'edit'])->name('Profile.edit');
Route::put('/Admin/profile/{profile}',[App\Http\Controllers\AdminController::class,'update'])->name('Profile.update');


/*client search*/
Route::post('/search', [App\Http\Controllers\ClientController::class, 'search'])->name('admin.index');

/*lieu route */
Route::get('/Lieu/index', [App\Http\Controllers\LieuController::class, 'index'])->name('Lieu.index');
Route::post('/Lieu/index', [App\Http\Controllers\LieuController::class, 'store']);
Route::get('/Lieu/dropdown', [App\Http\Controllers\LieuController::class, 'selectVille'])->name('Lieu.dropdown');
Route::get('/Lieu/showdrop', [App\Http\Controllers\LieuController::class, 'selectdropdown'])->name('Lieu.selectdrop');

/*extra route */
Route::get('/extra/index', [App\Http\Controllers\ExtraController::class, 'index'])->name('extra.index');
Route::get('/extra/create', [App\Http\Controllers\ExtraController::class, 'create'])->name('extra.create');
Route::post('/extra/store', [App\Http\Controllers\ExtraController::class, 'store'])->name('extra.store');

//delete
Route::delete('/Extra/{id}',[App\Http\Controllers\ExtraController::class,'destroy'])->name('extra.destroy');

//update



Route::resource('/extra',App\Http\Controllers\ExtraController::class);

