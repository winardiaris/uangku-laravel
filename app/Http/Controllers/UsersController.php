<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use App\User;
use Validator;
use App\Http\Requests;
use Auth;

class UsersController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  protected function validator(array $data)
  {
     return Validator::make($data, [
         'name' => 'required|max:255',
         'email' => 'required|email|max:255|unique:users',
         'password' => 'required|min:6|confirmed',
     ]);
  }
  public function index()
  {
      return view('users.index');
  }
  public function edit()
  {
      return view('users.edit');
  }
  public function update(Request $request,PsrLoggerInterface $log)
  {
    $id =  Auth::user()->id;
    $this->validate($request, [
        'name' => 'required|max:255',
        'password' => 'required|confirmed',
    ]);
    $credentials = $request->only(
            'name','email', 'password', 'password_confirmation'
    );
    $user = \Auth::user();
    $user->name = $credentials['name'];
    $user->password = bcrypt($credentials['password']);
    $user->save();





    $log->info("User telah diperbaharui. ID: " . $id);
    return redirect('/user');
  }



}
