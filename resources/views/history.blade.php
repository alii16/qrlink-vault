<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>History QR Code</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F5F5F5;
            text-align: center;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .card {
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .qr-image {
            width: 150px;
            height: auto;
            margin: 10px 0;
        }
        .info {
            font-size: 14px;
            color: #555;
        }
        .timestamp {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }
        .button {
            background-color: #FF9800;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 20px;
            display: inline-block;
        }
        .empty-message {
            font-size: 18px;
            color: #888;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h1>History QR Code</h1>
    <a href="/" class="button">KEMBALI</a>
    <div class="container">
        @if(count($history) > 0)
            @foreach($history as $item)
                <div class="card">
                    <img src="{{ asset($item['qrCodePath']) }}" alt="QR Code" class="qr-image">
                    <p class="info"><strong>Text / URL:</strong> {{ $item['text'] }}</p>
                    <p class="info"><strong>Size:</strong> {{ $item['size'] }}x{{ $item['size'] }}</p>
                    <p class="timestamp">{{ $item['timestamp'] }}</p>
                </div>
            @endforeach
        @else
            <p class="empty-message">Belum ada QR Code yang di-generate.</p>
        @endif
    </div>
</body>
</html>
