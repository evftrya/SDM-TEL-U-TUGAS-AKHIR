<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        // dd('masuk');
        
        // return view('kelola_data.fakultas.list',compact('send'));
        return view('kelola_data.sotk-level.list');
    }
    public function new(){
        return view('kelola_data.sotk-level.input');   
    }

    public function view(){
        return view('kelola_data.sotk-level.input');   
    }
    public function create(Request $request){
        dd($request);
        return view('kelola_data.sotk-level.list');   
    }

    public function update($idLevel){
        // dd('update',$idLevel);
        return view('kelola_data.sotk-level.update');   
    }
}
