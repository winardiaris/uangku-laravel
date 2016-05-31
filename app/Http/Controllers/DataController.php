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
      $search = \Request::get('s'); //<-- we use global request to get the param of URI
      $users_id =  Auth::user()->id;

      if(isset($search)){
        $data = \App\Data::where('users_id',$users_id)
                ->where(function($query){
                  $search = \Request::get('s');
                  $query->orWhere('desc','like','%'.$search.'%')
                  ->orWhere('value','like','%'.$search.'%')
                  ->orWhere('date','like','%'.$search.'%')
                  ->orWhere('token','like','%'.$search.'%');
                })
                ->orderBy('date','desc')
                ->get();
      }else{
        $data = \App\Data::where('users_id',$users_id)->get();
      }
    // dd($data);
   return view('data.index',['data' => $data]);
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

      if ($request->hasFile('token_img')) {
        $photo = $request->file('token_img');
        $filename = str_random(6) . "." . $photo->getClientOriginalExtension();
        $path = public_path() . '/img';
        $photo->move($path, $filename);

        $request['token_image']="img/".$filename;

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

    public function getSaldo(){
      $users_id =  Auth::user()->id;

      $in = \App\Data::where('type','in')->where('users_id',$users_id)->select('value')->sum('value');
      $out = \App\Data::where('type','out')->where('users_id',$users_id)->select('value')->sum('value');
      $saldo = (int)$in - (int)$out;
      return $saldo;
    }
}
