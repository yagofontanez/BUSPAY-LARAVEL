<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QrCodeController extends Controller
{
    public function generate(Request $request)
    {
        $response = Http::post('https://api.qr-code-generator.com/v1/create?access-token=85sI3GRNqOoKq9rbCQP1nlAlsBiLe5EcVyjcRsLRAJ5ZtEHLa6Y8_2GV6L0Xo7EI', [
            "frame_name" => "no-frame",
            "qr_code_text" => "https://qrco.de/bfWPFS",
            "image_format" => "SVG",
            "qr_code_logo" => "scan-me-square"
        ]);

        return response($response->body(), 200)
            ->header('Content-Type', 'image/svg+xml');
    }
}
