<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\NomorAkun;
class NomorAkunController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
    }
    public function index()
    {
      $search = \Request::get('s');
      if(isset($search)){
        $data=NomorAkun::where('nomor_akun','like','%'.$search.'%')
          ->orWhere('nama_akun','like','%'.$search.'%')
                              ->orderBy('nomor_akun','asc')
                              ->paginate(30);

      }else{
        $data = NomorAkun::orderBy('nomor_akun','asc')->paginate(30);
      }

      return view('nomorakun.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data_nomor_akun=NomorAkun::whereRaw('LENGTH(nomor_akun)<=4')->orderBy('nomor_akun','asc')->pluck('nama_akun','nomor_akun');
      return view('nomorakun.create',compact('data_nomor_akun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      NomorAkun::create($request->all()) ;
      return redirect()->route('nomorakun.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = NomorAkun::findOrFail($id);
        return view('nomorakun.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
      $data = NomorAkun::findOrFail($id);
      $data_nomor_akun=NomorAkun::whereRaw('LENGTH(nomor_akun)<=4')->orderBy('nomor_akun','asc')->pluck('nama_akun','nomor_akun');
      return view('nomorakun.edit',compact('data','data_nomor_akun'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nomorakun=NomorAkun::findOrFail($id);
      $nomorakun->update($request->all());
      return redirect()->route('nomorakun.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      NomorAkun::findOrFail($id)->delete();
      return redirect()->route('nomorakun.index');
    }
}
