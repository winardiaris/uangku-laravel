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
      
      $search = \Request::get('s'); //<-- use global request
      $dari = \Request::get('dari'); //<-- use global request
      $ke = \Request::get('ke'); //<-- use global request
      $tahun = \Request::get('tahun'); //<-- use global request
      $users_id =  Auth::user()->id;

      if(isset($search)){
        $data = \App\Data::where('users_id',$users_id)
                ->select('date','type',DB::raw('SUM(value) as value'))
                ->groupBy('date','type')
                ->where(function($query){
                  $search = \Request::get('s');
                  $query->orWhere('desc','like','%'.$search.'%')
                  ->orWhere('value','like','%'.$search.'%')
                  ->orWhere('date','like','%'.$search.'%')
                  ->orWhere('token','like','%'.$search.'%');
                })
                ->orderBy('date')
                ->get();
      }
      elseif (isset($dari) and isset($ke)) { //SELESAI search date dari ke
        $dari = \Request::get('dari'); //<-- use global request
        $ke = \Request::get('ke'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)
                ->select('date','type',DB::raw('SUM(value) as value'))
                ->groupBy('date','type')
                ->whereBetween('date',[$dari,$ke])
                ->orderBy('date')
                ->get();
      }
      elseif (isset($tahun)) { //SELESAI search tahun
        $tahun = \Request::get('tahun'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)
                ->where('date','like','%'.$tahun.'%')
                ->select('date','type',DB::raw('SUM(value) as value'))
                ->groupBy('date','type')
                ->orderBy('date')
                ->get();
      }

      else{
        $data = \App\Data::where('users_id',$users_id)
                ->select('date','type',DB::raw('SUM(value) as value'))
                ->groupBy('date','type')
                ->orderBy('date')
                ->get();
      }
        return view('home',compact('data'));
    }
    public function welcome()
    {
        return view('welcome');
    }
    public function about(){
      return view('about');
    }

}
