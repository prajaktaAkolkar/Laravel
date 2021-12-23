<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Customer;

class Customer extends Controller
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
 $customer = new customer;
 $customer->name = $request['name'];
 $customer->email = $request['email'];
 $customer->password = md5($request['password']);
 $customer->save();
 
  }}
