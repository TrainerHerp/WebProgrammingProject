<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signIn(Request $request) {
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];
      if(Auth::attempt($credentials, $request->remember)){
        return redirect('/home');
      }
      return back()->withErrors([
        'fail' => 'Wrong Email/Password'
      ]);
    }

    public function signUp(Request $request) {
      $rules = [
        'username' => 'required|min:5|max:20|unique:users',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:5|max:20',
        'phone_number' => 'required|min:10|max:13|regex:/^[0-9]+$/',
        'address' => 'required|min:5'
      ];

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      $newUser = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone_number' => $request->phone_number,
        'address' => $request->address,
      ]);

      TransactionHeader::create(['user_id' => $newUser->id]);

      return redirect('/sign-in');
    }

    public function signOut(Request $request){
      Auth::logout();
      return redirect('/sign-in');
    }
}
