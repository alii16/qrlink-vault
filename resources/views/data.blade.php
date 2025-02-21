<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>QR Code Generator</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Logis
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">
          <span style="color: red;">Ali</span>
          <span style="color: #fad02c;" class="d-none d-sm-inline"> polanunu</span>
        </h1>
      </a>
      

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/">Home<br></a></li>
          <li><a href="/scanner">Scanner</a></li>
          <li><a href="{{ route('history') }}" class="active">History</a></li>
          <li><a href="pricing.html">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @if (Route::has('login'))
          <nav class="-mx-3 flex flex-1 justify-end">
              @auth
                  <a class="btn-getin" href="{{ url('/dashboard') }}"">Dashboard</a>
              @else
                  <a class="btn-getin" href="{{ route('login') }}">Sign In</a>

                  @if (Route::has('register'))
                      <a class="btn-getstarted" href="{{ route('register') }}">Sign Up</a>
                  @endif
              @endauth
          </nav>
      @endif

    </div>
  </header>

  <main class="main">
    <section id="hero" class="hero section dark-background">
        <img src="assets/img/world-dotted-map.png" alt="" class="hero-bg" data-aos="fade-in">
        <div class="container">
            <form action="{{ route('history.clear') }}" method="GET" class="clear-history">
                <button type="submit" class="Btn">
                    <div class="sign"><i class="bi bi-trash3-fill"></i></div>
                    <div class="text">Clear</div>
                </button>
            </form>            
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10" data-aos="fade-up">
                    <div class="row mt-3">
                        <!-- From Uiverse.io by vinodjangid07 --> 
  
  
  
                        @if(count($currentData) > 0)
                            @foreach($currentData as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="card qr-card text-center px-3">
                                        <div class="header d-flex justify-content-between align-items-center">
                                            <div class="status-indicators d-flex gap-2">
                                                <div class="circle red"></div>
                                                <div class="circle yellow"></div>
                                                <div class="circle green"></div>
                                            </div>
                                            <p class="bash mb-0"> {{ $item['size'] }}x{{ $item['size'] }}</p>
                                        </div>

                                        <div class="qr-info">
                                            <img src="{{ asset($item['qrCodePath']) }}" alt="QR Code" class="qr-image img-fluid">
                                            <div class="info-text">
                                                <p class="info" ><strong>Text / URL:</strong> {{ $item['text'] }}</p>
                                                <p class="timestamp">{{ $item['timestamp'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="empty-message text-center">You haven't generated any QR Codes yet.</p>
                        @endif
                    </div>

                    <!-- Pagination -->
                    <div class="pagination mt-4 d-flex justify-content-center">
                        <!-- Arrow Kiri -->
                        @if($page > 1)
                            <a href="{{ url('history?page=' . ($page - 1)) }}" class="btn btn-primary mx-2">&laquo;</a>
                        @else
                            <span class="btn btn-secondary mx-2 disabled">&laquo;</span>
                        @endif

                        <!-- Menampilkan Nomor Halaman -->
                        @php
                            // Menentukan halaman mulai dan akhir untuk menampilkan maksimal 5 nomor
                            $startPage = max(1, $page - 2);  // Menentukan halaman mulai (2 halaman sebelumnya)
                            $endPage = min($totalPages, $page + 2);  // Menentukan halaman akhir (2 halaman setelahnya)
                        @endphp

                        @for($i = $startPage; $i <= $endPage; $i++)
                            <a href="{{ url('history?page=' . $i) }}" class="btn {{ $i == $page ? 'btn-primary' : 'btn-secondary' }} mx-1">
                                {{ $i }}
                            </a>
                        @endfor

                        <!-- Arrow Kanan -->
                        @if($page < $totalPages)
                            <a href="{{ url('history?page=' . ($page + 1)) }}" class="btn btn-primary mx-2">&raquo;</a>
                        @else
                            <span class="btn btn-secondary mx-2 disabled">&raquo;</span>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>
</main>


<style>
.console {
    background-color: transparent;
    color: white;
    border-radius: 12px;
    border: 2px solid transparent;
    border-image: linear-gradient(to right, #8000ff, #ff00ff, #00bfff, #0000ff) 1;
}

.header {
    margin-top: 1px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.status-indicators .circle {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

.red { background-color: red; }
.yellow { background-color: yellow; }
.green { background-color: green; }

/* Card Styling */
.qr-card {
    background: linear-gradient(to right, #222222, #1a1a1a);
    color: white;
    border-radius: 12px;
    border: 2px solid transparent;
    border-image: linear-gradient(to right, #8000ff, #ff00ff, #00bfff, #0000ff) 1;
    box-shadow: 0px 4px 8px rgba(255, 0, 0, 0.2);
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.qr-card:hover {
    transform: translateX(-5px) translateY(-5px);
    box-shadow: 6px 6px 12px 3px #00bfff;
}

/* QR and Info Layout */
.qr-info {
    display: flex;
    justify-content: space-between;
    align-items: flex-start; /* Mengatur agar gambar dan teks sejajar di atas */
    margin-top: 15px;
}

.qr-image {
    width: 50%;
    max-width: 130px;
    height: auto;
    border-radius: 5px;
}

.info-text {
    width: 50%;
    padding-left: 15px;
    text-align: left;
}

.info {
    font-size: 14px;
    color: #ddd;
    margin-bottom: 5px;
}

.timestamp {
    font-size: 12px;
    color: #bbb;
}

.pagination {
    margin-top: 20px;
}

.pagination .btn {
    font-size: 14px;
}

</style>



  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <h1 class="sitename">
              <span style="color: red;">Ali</span>
              <span style="color: #fad02c;"> polanunu</span>
            </h1>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Logis</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    function updateDateTime() {
        const now = new Date();
  
        // Daftar nama hari dalam bahasa Indonesia
        const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  
        // Ambil informasi waktu
        const day = days[now.getDay()]; // Ambil nama hari
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
  
        // Update elemen dengan ID yang sesuai
        document.getElementById("day").textContent = day;
        document.getElementById("hours").textContent = hours;
        document.getElementById("minutes").textContent = minutes;
        document.getElementById("seconds").textContent = seconds;
    }
  
    // Jalankan setiap detik
    setInterval(updateDateTime, 1000);
    updateDateTime(); // Panggil sekali agar langsung muncul saat halaman dimuat
  </script>
  
</body>

</html>