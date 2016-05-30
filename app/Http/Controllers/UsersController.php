<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

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
  public function index()
  {
      return view('users.index');
  }
  public function edit()
  {
      return view('users.edit');
  }
  public function update(Request $request, $id)
  {
      // return view('data.create');
      dd($request->all());
      //
  }
}
