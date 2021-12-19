<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        // textos que llevara el correo
        $details=[
            'title' => 'Correo de su amigo y servidor riandi',
            'body'=> 'este es un ensayo'
        ];
        // asia donde recibira el correo y enviar los detalles del correo al mailer
        Mail::to("rendondiaza944@gmail.com")->send(new TestMail($details));
        return "Correo electronico enviado";
    }
}
