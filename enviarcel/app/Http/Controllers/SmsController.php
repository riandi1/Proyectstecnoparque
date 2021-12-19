<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        // Nexmo::message()->send([
        //     'to' => 'receiver',
        //     'from' => 'sender',
        //     'text' => 'texto sms de prueba'
        // ]);
        // echo "se envio el mensaje";
        $basic  = new \Vonage\Client\Credentials\Basic("1c0ba6b1", "AEMoS8FalCiCHTDj");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("573146133941", BRAND_NAME, 'Se acaba de enviar un sms')
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
