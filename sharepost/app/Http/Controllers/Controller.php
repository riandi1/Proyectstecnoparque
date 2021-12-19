<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Jorenvh\Share\Share as ShareShare;
use Share;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $social = Share::page('https://viblo.asia/p/cach-su-dung-qr-code-in-laravel-Do754pvB5M6','Cách sử dụng QR code in laravel
        ')
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp()
        ->telegram()->getRawLinks();
        return view('socialshare',compact('social'));
    }
}
