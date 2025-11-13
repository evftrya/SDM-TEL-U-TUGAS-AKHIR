<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        // dd($levels);

        // dd('masuk');
        
        // return view('kelola_data.fakultas.list',compact('send'));
        return view('kelola_data.sotk-level.list',compact('levels'));
    }
    public function new(){
        $levels = Level::all();
        dd($levels);
        return view('kelola_data.sotk-level.input', compact('levels'));   
    }

    public function view(){
        dd($levels);

        return view('kelola_data.sotk-level.input');   
    }
    public function create(Request $request){
        // dd($request);
        // $level = Level::create($request);
        // dd($level);
        return view('kelola_data.sotk-level.list');   
    }

    public function update($idLevel){
        // dd('update',$idLevel);
        return view('kelola_data.sotk-level.update');   
    }
}
