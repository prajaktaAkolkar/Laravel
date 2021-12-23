<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class registrationController extends Controller
{
   public function index()
   {
   return view('form');
   }
  
   public function store(Request $request){
    /* $request -> validate([
         'name' => 'required',
         'email' => 'required |email',
         'password' => 'required',
         'password-confirmed'=> 'required|same:password'
     ]);*/ 
     echo "<pre>";
print_r($request->all());
$registration = new registration;
$registration->name = $request['name'];
$registration->email = $request['email'];
$registration->password = md5($request['password']);
$registration->save();

 }
   
}
