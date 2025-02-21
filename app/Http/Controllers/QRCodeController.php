<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class QRCodeController extends Controller
{
    public function index()
    {

        $defaultUrl = "https://alii16.github.io/portofolio/";
        $qrCodePath = $this->generateAndSaveQrCode($defaultUrl, 200, 1);

        return view('index', compact('qrCodePath', 'defaultUrl'));
    }

    public function generateQrCode(Request $request)
    {
        $text = $request->input('qrCode', "https://alii16.github.io/portofolio/");
        $size = $request->input('size', 150);
        $margin = 1; // Tambahkan margin

        $qrCodePath = $this->generateAndSaveQrCode($text, $size, $margin);

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

    private function generateAndSaveQrCode($text, $size, $margin)
    {

        $fileName = md5($text . $size . $margin) . ".png";
        $filePath = "public/qrcodes/" . $fileName;

        // Jika file belum ada, buat dan simpan
        if (!Storage::exists($filePath)) {
            $qrCode = QrCode::format('png')
                ->size($size)
                ->margin($margin)
                ->errorCorrection('H')
                ->generate($text);

            Storage::put($filePath, $qrCode);
        }

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

    public function history(Request $request)
    {
        $history = session()->get('qr_history', []);

        if (!is_array($history)) {
            $history = [];
        }

        $perPage = 6;

        $page = max(1, (int) $request->query('page', 1));

        $totalPages = ceil(count($history) / $perPage);

        $chunks = array_chunk($history, $perPage);

        $currentData = $chunks[$page - 1] ?? [];

        return view('data', compact('currentData', 'page', 'totalPages'));
    }

    public function clearHistory()
    {
        $history = session()->get('qr_history', []);

        if (!empty($history)) {

            foreach ($history as $item) {
                $filePath = storage_path('app/public/qrcodes/' . basename($item['qrCodePath']));

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        session()->forget('qr_history');

        return redirect()->route('history')->with('success', 'History dan QR code terkait berhasil dihapus.');
    }

    public function scan()
    {
        return view('/scanner');
    }
}
