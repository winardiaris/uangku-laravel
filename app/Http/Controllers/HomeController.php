<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
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
      
        $users_id =  Auth::user()->id;
        $data = DB::select("select 
          (select count(*) from `data` where `date` like '%2015%' and `users_id`='$users_id') as '2015' ,
(select count(*) from `data` where `date` like '%2016%' and `users_id`='$users_id') as '2016' ");
        return view('home',compact('data'));
        /* return $data; */
    }
    public function welcome()
    {
        return view('welcome');
    }

}
