<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
    public function list($id_User)
    {
        return view('kelola_data.emergency_contact.list');
    }
}
