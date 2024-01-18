<?php

use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crudcontroller;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function (){
//     return Auth::guard('crud')->check();
// });

Route::get('/',[loginController::class, 'loginpage'])->name('login')->middleware('guest:crud');
Route::post('loginauth',[loginController::class, 'login'])->name('login.auth');


Route::middleware('auth:crud')->group(function () {

    Route::get('/create', [Crudcontroller::class, 'create'])->name('crud.create');
    Route::post('/store', [Crudcontroller::class, 'store'])->name('crud.store');
    Route::get('/{id}/delete', [Crudcontroller::class, 'delete'])->name('crud.delete');
    Route::get('/{id}/edit', [Crudcontroller::class, 'edit'])->name('crud.edit');           //get id from table->edit button
    Route::put('/{id}/update', [Crudcontroller::class, 'update'])->name('crud.update');     //get id from table->edit button //use put or patch mathod for update data
    Route::get('/{id}/see', [Crudcontroller::class, 'see'])->name('crud.see');
    Route::get('/dashboard', [Crudcontroller::class, 'dashboard'])->name('crud.dashboard');

    Route::get('/logout', [loginController::class, 'logout'])->name('crud.logout');
    Route::get('/authinfo', [loginController::class, 'authinfo'])->name('crud.authinfo');
    //partners route
    Route::get('/partnerindex', [PartnerController::class, 'index'])->name('partnerindex');
    Route::post('/storpartner', [PartnerController::class, 'storpartner'])->name('storepartner');

});
