<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurdController;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::get('/curd_create',[CurdController::class,'create'])->name('curd.create');
Route::get('/curd_show',[CurdController::class,'show']);
Route::get('/curd_delete/{id}',[CurdController::class,'destroy'])->name('curd.delete');
Route::get('/curd_force-delete/{id}',[CurdController::class,'forceDelete'])->name('curd.force-delete');
Route::get('/curd_restore/{id}',[CurdController::class,'restore'])->name('curd.restore');
Route::post('/curd_submit',[CurdController::class,'store']);
Route::get('/curd_edit/{id}',[CurdController::class,'edit']);
Route::post('curd_update/{id}',[CurdController::class,'update'])->name('curd.update');
Route::get('/curd_trash',[CurdController::class,'trash']);
Route::get('get-all-session', function(){
    $session= session()->all();
    p($session);
});

Route::get('set-session',function(Request $request) {
    $request->session()->put('user_name','laravel');
    $request->session()->put('user_id',123);
    $request ->session()->flash('status','Success');
    return redirect('get-all-session');
});

Route::get('destroy-session',function(){
    session()->forget('user_name');
    session()->forget('user_id');
    return redirect('get-all-session');
});