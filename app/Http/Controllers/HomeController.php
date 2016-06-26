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
                ->select('tanggal','tipe',DB::raw('SUM(jumlah) as jumlah'))
                ->groupBy('tanggal','tipe')
                ->where(function($query){
                  $search = \Request::get('s');
                  $query->orWhere('desc','like','%'.$search.'%')
                  ->orWhere('jumlah','like','%'.$search.'%')
                  ->orWhere('tanggal','like','%'.$search.'%')
                  ->orWhere('nomor_bukti','like','%'.$search.'%');
                })
                ->orderBy('tanggal')
                ->get();
      }
      elseif (isset($dari) and isset($ke)) { //SELESAI search tanggal dari ke
        $dari = \Request::get('dari'); //<-- use global request
        $ke = \Request::get('ke'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)
                ->select('tanggal','tipe',DB::raw('SUM(jumlah) as jumlah'))
                ->groupBy('tanggal','tipe')
                ->whereBetween('tanggal',[$dari,$ke])
                ->orderBy('tanggal')
                ->get();
      }
      elseif (isset($tahun)) { //SELESAI search tahun
        $tahun = \Request::get('tahun'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)
                ->where('tanggal','like','%'.$tahun.'%')
                ->select('tanggal','tipe',DB::raw('SUM(jumlah) as jumlah'))
                ->groupBy('tanggal','tipe')
                ->orderBy('tanggal')
                ->get();
      }

      else{
        $data = \App\Data::where('users_id',$users_id)
                ->select('tanggal','tipe',DB::raw('SUM(jumlah) as jumlah'))
                ->groupBy('tanggal','tipe')
                ->orderBy('tanggal')
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
