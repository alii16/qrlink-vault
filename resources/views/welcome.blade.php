<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>QR Code Generator</title>
    <meta name="description" content="">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FFFDE7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            position: relative;
        }
        .container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 80%;
        }
        .left-section {
            text-align: left;
        }
        .left-section h1 {
            font-size: 48px;
            color: #000;
            margin: 0;
        }
        .left-section h2 {
            font-size: 48px;
            color: #FF9800;
            margin: 0;
        }
        .left-section p {
            font-size: 16px;
            color: #000;
        }
        .button {
            background-color: #C6FF00;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
        }
        .form-container {
            background-color: #F5F5F5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #C6FF00;
            text-align: left;
            width: 250px;
            position: relative;
        }
        .form-container::before {
            content: '';
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 200px;
            background: #C6FF00;
            filter: blur(50px);
            z-index: -1;
            border-radius: 50%;
        }
        .form-container h3 {
            margin-top: 0;
            font-size: 18px;
            color: #000;
            text-align: center;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container .input-text {
            max-width: 92%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #C6FF00;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }
        .result {
            text-align: center;
            margin-top: 20px;
        }
        .result p {
            font-size: 12px;
            color: #000;
        }
        .download {
            font-size: 12px;
            margin-top: 5px;
        }
        .header {
            position: absolute;
            top: 20px;
            left: 10%;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            width: 80%;
            align-items: center;
        }
        .flex {
            display: flex;
            align-items: center;
        }
        .header .logo {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .nav-link {
            position: relative;
            font-size: 18px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -3px;
            width: 0;
            height: 2px;
            background: #FF2D20;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover {
            color: #FF2D20;
        }

        .nav-link:hover::after {
            width: 100%;
        } 

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 16px;
            color: #000;
            font-weight: bold;
        }

        .gradient-text {
            font-weight: bold;
            display: inline-block;
            background: linear-gradient(to right, blue, purple, pink);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 3s linear infinite alternate;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .social-icons {
            margin-top: 10px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .social-icons a i {
            font-size: 18px;
        }

        /* Warna sesuai brand */
        .social-icons a:nth-child(1) { color: #1877F2; } /* Facebook */
        .social-icons a:nth-child(2) { color: #E4405F; } /* Instagram */
        .social-icons a:nth-child(3) { color: #1DA1F2; } /* Twitter */
        .social-icons a:nth-child(4) { color: #333; } /* GitHub */

        /* Hover Effect */
        .social-icons a:hover {
            opacity: 0.7;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .left-section {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-container {
                width: 100%;
            }
            .header {
                display: none;
            }
            .form-container .input-text {
            max-width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="flex">
            <img src="{{ asset('image/logo.png')}}" alt="" class="logo">
        <span>ALI POLANUNU</span>
        </div>
        @if (Route::has('login'))
            <nav class="nav-links flex space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link" style="margin-left: 20px">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    
    </div>
    
    
    
    <div class="container">
        <div class="left-section">
            <h1>Welcome To</h1>
            <h2>QR Code Generator</h2>
            <p>Generate your text or URL to QR Code</p>
            <a href="#" class="button" onclick="window.location.href='/scan'">QR CODE SCANNER</a>
            <a href="{{ route('history') }}" class="button" style="margin-left: 10px">YOUR HISTORY</a>
        </div>
        <div class="form-container">
            <h3>QR Code Generator</h3>
            <form id="qr-form" action="{{ route('generate-qr-code') }}" method="POST">
                @csrf
                <label for="text-url">Enter Text or URL</label>
                <input type="text" class="input-text" id="qr-input" name="qrCode" placeholder="Type something" required>
                <label for="size">Qr Code Size</label>
                <select id="size" name="size">
                    <option value="100">100x100</option>
                    <option value="150" selected>150x150</option>
                    <option value="200">200x200</option>
                    <option value="250">250x250</option>
                    <option value="300">300x300</option>
                </select>
                <button type="submit">GENERATE QR CODE</button>
                <div class="result">
                    @if(session('qrCodePath'))
                        <p>QR Code ({{ session('size') }}x{{ session('size') }}):</p>
                        <img src="{{ asset('storage/qrcodes/' . basename(session('qrCodePath'))) }}" alt="QR Code">
                        <br>
                        <a href="{{ route('download-qr', ['filename' => basename(session('qrCodePath'))]) }}" 
                            class="download" download>
                             Download QR Code
                        </a>
                    @endif
                </div>
            
            </form>
        </div>
    </div>
    <footer>
        <p>Made with 💡 by <span class="gradient-text">Ali Polanunu</span></p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
            <a href="#"><i class="fab fa-github"></i> GitHub</a>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/YOUR_FA_KIT.js" crossorigin="anonymous"></script>

</body>
</html>