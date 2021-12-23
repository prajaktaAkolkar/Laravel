<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\DemoController;
use App\Http\Controllers\singleActionController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\registrationController;
use App\Http\Controllers\Customer;
//use App\Models\Customer;
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

Route::get('/home',[DemoController::class, 'index']);
Route::get('/about','App\Http\Controllers\DemoController@about'); //another way of calling Route
Route::get('/demo',singleActionController::class);
Route::resource('photo',photoController::class);
Route::get('/register',[registrationController::class,'index']);
Route::post('/register',[registrationController::class,'store']);
Route::get('/Customer',[Customer::class,'index']);
Route::post('/Customer',[Customer::class,'register']);
/*
Route::get('/home',function(){
  return view('homePage');
});

Route::get('/about',function(){
  return view('aboutPage');
});
Route::get('/demo', function () {
   return view('demo');
});*/

Route::get('/demo/{name}/{id?}', function ($name,$id = null) {
    $data = compact('name','id');
   // print_r($data);
   return view('demo')->with($data);
 });

 Route::get('/ex/{name?}',function($name = null){
     $demo ="<h2>html</h2>";
   $data= compact('name','demo');
   return view('home')->with($data);
 });

Route::any('/test', function(){
    echo "test the post request";
});