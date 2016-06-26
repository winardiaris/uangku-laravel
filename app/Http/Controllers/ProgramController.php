<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Http\Requests;

class ProgramController extends Controller
{
     public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $search = \Request::get('s');
      if(isset($search)){
        $data=Program::where('program','like','%'.$search.'%')
          ->orWhere('program','like','%'.$search.'%')
                              ->orderBy('program','asc')
                              ->paginate(30);

      }else{
        $data = Program::orderBy('program','asc')->paginate(30);
      }

      return view('program.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      Program::create($request->all());
      return redirect()->route('program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = Program::findOrFail($id);
      return view('program.view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data = Program::findOrFail($id);
      return view('program.edit',compact('data'));
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
      $data = Program::findOrFail($id);
      $data->update($request->all());
        
      return redirect()->route('program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Program::findOrFail($id)->delete();
      return redirect()->route('program.index');
      
    }
}
