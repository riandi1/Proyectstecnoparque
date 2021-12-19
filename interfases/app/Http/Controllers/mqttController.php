<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class mqttController extends Controller
{

    public function index()
    {
        
        return view('mqtt');
    }
}
