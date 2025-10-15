<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    
    public function index()
    {
        // dd('masuk');
        
            // return view('kelola_data.fakultas.list',compact('send'));
            return view('kelola_data.sotk-formasi.list');
    }

}
