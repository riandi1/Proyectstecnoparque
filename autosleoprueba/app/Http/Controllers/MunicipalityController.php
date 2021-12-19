<?php

namespace App\Http\Controllers;

use App\Models\municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{

    // public function index()
    // {
        
    // }


    public function create()
    {
        $municipios = municipality::all();

        echo "hola mundo";
        return view('auth.register',compact('municipios'));
    }
}
