<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as PsrLoggerInterface;
use App\Http\Requests;
use Auth;

class DataController extends Controller
{
    protected $log;
    public function __construct(PsrLoggerInterface $log)
    {
      $this->log = $log;
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
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
                ->where(function($query){
                  $search = \Request::get('s');
                  $query->orWhere('keterangan','like','%'.$search.'%')
                  ->orWhere('jumlah','like','%'.$search.'%')
                  ->orWhere('tanggal','like','%'.$search.'%')
                  ->orWhere('bukti','like','%'.$search.'%');
                })
                ->orderBy('tanggal','desc')
                ->paginate(30);
      }
      elseif (isset($dari) and isset($ke)) { //SELESAI search tanggal dari ke
        $dari = \Request::get('dari'); //<-- use global request
        $ke = \Request::get('ke'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)->whereBetween('tanggal',[$dari,$ke])->orderBy('tanggal','desc')->paginate(30);
      }
      elseif (isset($tahun)) { //SELESAI search tahun
        $tahun = \Request::get('tahun'); //<-- use global request
        $data = \App\Data::where('users_id',$users_id)->where('tanggal','like','%'.$tahun.'%')->orderBy('tanggal','desc')->paginate(30);
      }

      else{
        $data = \App\Data::where('users_id',$users_id)->orderBy('tanggal','desc')->paginate(30);
      }
   return view('data.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $users_id =  Auth::user()->id;
      $request['users_id']=$users_id;

      if ($request->hasFile('bukti_gbr')) {
        $photo = $request->file('bukti_gbr');
        $filename = str_random(6) . "." . $photo->getClientOriginalExtension();
        $path = public_path() . '/img';
        $photo->move($path, $filename);

        $request['bukti_gambar']=$filename;

        // \App\Data::create($request);
        // return dd($request->all());
      }
        \App\Data::create($request->all());


      $this->log->info('Data baru telah dibuat. ID: ' . $request->id);
      return redirect()->route('data.index');
      //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = \App\Data::findOrFail($id);
      return view('data.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = \App\Data::findOrFail($id);
      return view('data.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,PsrLoggerInterface $log)
    {
      $data = \App\Data::findOrFail($id);
      if ($request->hasFile('bukti_gbr')) {
        $photo = $request->file('bukti_gbr');
        $filename = str_random(6) . "." . $photo->getClientOriginalExtension();
        $path = public_path() . '/img';
        $photo->move($path, $filename);

        $request['bukti_gambar']=$filename;
      }

      $data->update($request->all());
      $log->info("Data telah diperbaharui. ID: " . $id);
      return redirect()->route('data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PsrLoggerInterface $log,$id)
    {
      \App\Data::findOrFail($id)->delete();
      $log->info("Data telah dihapus. ID: " . $id);
      return redirect()->route('data.index');
    }

    public function getSaldo(){//melihatkan saldo semua
      $users_id =  Auth::user()->id;

      $in = \App\Data::where('tipe','in')->where('users_id',$users_id)->select('jumlah')->sum('jumlah');
      $out = \App\Data::where('tipe','out')->where('users_id',$users_id)->select('jumlah')->sum('jumlah');
      $saldo = (int)$in - (int)$out;
      return $saldo;
    }

    public function getTahunData(){
      $users_id =  Auth::user()->id;
      $arr = array();
      $tahun = \App\Data::where('users_id',$users_id)->select('tanggal')->groupBy('tanggal')->get();
      foreach($tahun as $tahun_){
        $t=substr($tahun_['tanggal'],0,4);
        array_push($arr,$t);
      }
      $r=array_values(array_unique($arr));
      return json_encode($r);
    }

    public function g(){
      $users_id =  Auth::user()->id;
      $op = \Request::get('op');
      switch ($op) {
        case 'getsaldo':
          return $this->getSaldo();
          break;
        case 'gettahundata':
          return $this->getTahunData();
          break;

        default:
          return "error";
          break;
      }
    }
}
