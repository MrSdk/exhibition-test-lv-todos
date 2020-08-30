<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\User;
use Auth;

class AuthController extends Controller
{
   public function showLogin(){
       return view('login');
   }

   public function showRegister(){
       return view('register');
   }

   public function login(Request $request){ 

    $errors = new MessageBag();

    request()->validate([
        'email' => 'required',
        'password' => 'required|min:3',
    ]);


    $credentials = $request->only('email', 'password');
          
    if (Auth::attempt( $credentials ))
    { 

        return redirect('/user/items');
    }  
    
    // add your error messages:
    $errors->add('error','Your details aren\'t found!');

    return back()->withErrors($errors);

}

public function register(Request $request){

    $errors = new MessageBag();
    request()->validate([
        'email' => 'required',
        'password' => 'required|min:3'
    ]);


    $user = new User;
    
    $user->email = $request['email'];
    $user->password = \Hash::make($request['password']) ;
      
    // try {
       $user->save(); 
    // } catch (\Throwable $th) {
       
    //     $errors->add('error','This email already exist!');

    //     return back()->withErrors($errors);
    // }
    
    auth()->login($user);
    return redirect('/user/items');
}

public function logout(){
    auth()->logout();

    return redirect('/login');
}

}
