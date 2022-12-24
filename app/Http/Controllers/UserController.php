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
    public function viewSignIn(){
      return view('sign_in');
    }

    public function viewSignUp(){
      return view('sign_up');
    }

    public function signIn(Request $request) {
      $credentials = [
        'email' => $request->email,
        'password' => $request->password
      ];
      // Need to use cookies!!!!!!!!
      if(Auth::attempt($credentials, $request->remember)){
        return redirect('/home');
      }
      return back()->withErrors([
        'fail' => 'Wrong Email/Password'
      ]);
    }

    public function signUp(Request $request) {
      $rules = [
        'username' => 'required|min:5|max:20|unique:users,username',
        'email' => 'required|email:rfc,dns|unique:users,email',
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

    public function viewProfile(){
      return view('profile', [
        'username' => auth()->user()->username,
        'email' => auth()->user()->email,
        'address' => auth()->user()->address,
        'phone' => auth()->user()->phone_number,
        'role' => auth()->user()->is_admin ? 'admin' : 'member'
      ]);
    }

    public function viewEditProfile(){
      return view('edit_profile', [
        'username' => auth()->user()->username,
        'email' => auth()->user()->email,
        'address' => auth()->user()->address,
        'phone_number' => auth()->user()->phone_number
      ]);
    }

    public function editProfile(Request $request){
      $user = User::find(auth()->user()->id);

      $rules = [
        'username' => 'required|min:5|max:20|unique:users,username,'.$user->id,
        'email' => ['required','email:rfc,dns','unique:users,email,'.$user->id],
        'phone_number' => 'required|min:10|max:13|regex:/^[0-9]+$/',
        'address' => 'required|min:5'
      ];

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      $user['username'] = $request->username;
      $user['email'] = $request->email;
      $user['phone_number'] = $request->phone_number;
      $user['address'] = $request->address;
      $user->save();

      return redirect('/profile');
    }

    public function viewEditPassword(){
      return view('edit_password');
    }

    public function editPassword(Request $request){
      $user = User::find(auth()->user()->id);
      if(!Hash::check($request->old_password, $user->password)){
        return back()->withErrors([
          'fail' => 'Password doesn\'t match!'
        ]);
      }

      $rule = ['new_password' => 'required|min:5|max:20'];
      $validator = Validator::make($request->all(), $rule);

      if($validator->fails()){
        return back()->withErrors($validator);
      }

      $user->password = Hash::make($request->new_password);
      $user->save();
      return redirect('/profile');
    }
}
