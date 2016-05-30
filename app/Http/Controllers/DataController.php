<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class DataController extends Controller
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
        return view('data.index');
    }
    public function graph()
    {
        return view('data.graph');
    }
    public function create()
    {
        return view('data.create');
    }
    public function store(Request $request)
    {
        // return view('data.create');
        dd($request->all());
        //
    }
}
