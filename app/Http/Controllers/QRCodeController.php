<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{
    public function index()
    {
        // URL Default untuk QR Code
        $defaultUrl = "https://alii16.github.io/portofolio/";
        $qrCodePath = $this->generateAndSaveQrCode($defaultUrl, 200);

        return view('welcome', compact('qrCodePath', 'defaultUrl'));
    }

    public function generateQrCode(Request $request)
    {
        $text = $request->input('qrCode', "https://alii16.github.io/portofolio/");
        $size = $request->input('size', 150);

        // Simpan QR Code ke storage
        $qrCodePath = $this->generateAndSaveQrCode($text, $size);

        // Simpan data QR Code ke session history
        $history = session('qr_history', []);
        $history[] = [
            'text' => $text,
            'size' => $size,
            'qrCodePath' => $qrCodePath,
            'timestamp' => now()->format('Y-m-d H:i:s'),
        ];
        session(['qr_history' => $history]);

        return back()->with([
            'qrCodePath' => $qrCodePath,
            'text' => $text,
            'size' => $size,
        ]);
    }


    private function generateAndSaveQrCode($text, $size)
    {
        // Tambahkan ukuran ke nama file agar unik
        $fileName = md5($text . $size) . ".png";
        $filePath = "public/qrcodes/" . $fileName;
    
        // Jika file belum ada, buat dan simpan
        if (!Storage::exists($filePath)) {
            $qrCode = QrCode::format('png')
                ->size($size) // Ukuran QR Code
                ->errorCorrection('H')
                ->generate($text);
            
            // Simpan QR Code ke storage Laravel
            Storage::put($filePath, $qrCode);
        }
    
        // Mengembalikan URL yang dapat diakses dari browser
        return "storage/qrcodes/" . $fileName;
    }

    public function downloadQrCode($filename)
    {
        $filePath = storage_path("app/public/qrcodes/" . $filename);

        if (!file_exists($filePath)) {
            return back()->with('error', 'QR Code tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    public function history()
    {
        $history = session('qr_history', []);
        return view('history', compact('history'));
    }

    public function scan()
    {
        return view ('/scan');
    }
    
}
