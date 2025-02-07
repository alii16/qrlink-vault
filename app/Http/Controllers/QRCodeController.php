<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Response;

class QRCodeController extends Controller
{
    public function index()
    {
        // Default QR Code
        $defaultUrl = "https://alii16.github.io/portofolio/";
        $defaultSize = 200;
        $qrCode = QrCode::size($defaultSize)->generate($defaultUrl);

        return view('welcome', compact('qrCode', 'defaultUrl', 'defaultSize'));
    }

    public function generateQrCode(Request $request)
    {
        // Ambil input dari user
        $text = $request->input('qrCode'); 
        $size = $request->input('size', 150); // Default size tetap 150 jika tidak dipilih
    
        // Pastikan tidak kosong, jika kosong pakai default link
        if (empty($text)) {
            $text = "https://alii16.github.io/portofolio/";
        }
    
        // Generate QR Code
        $qrCode = QrCode::size($size)->generate($text);
    
        return back()->with([
            'qrCode' => $qrCode,
            'text' => $text,
            'size' => $size,
        ]);
    }
    
    public function scan()
    {
        return view('scan');
    }
    
}
