<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StreamController extends Controller
{
    public function fetchStream()
    {
        $esp32StreamUrl = "http://192.168.1.100:81/stream"; 

        
        return new StreamedResponse(function () use ($esp32StreamUrl) {
            $stream = fopen($esp32StreamUrl, 'r');
            if ($stream) {
                while (!feof($stream)) {
                    echo fread($stream, 1024);
                    flush();
                }
                fclose($stream);
            }
        }, 200, [
            'Content-Type' => 'video/mp4', 
            'Cache-Control' => 'no-cache',
            'Connection' => 'keep-alive',
        ]);
    }
}
