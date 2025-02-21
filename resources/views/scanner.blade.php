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
          <li><a href="/scanner" class="active">Scanner</a></li>
          <li><a href="{{ route('history') }}">History</a></li>
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
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/world-dotted-map.png" alt="" class="hero-bg" data-aos="fade-in">

      <div class="container">
        <div class="row gy-4 d-flex justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2 data-aos="fade-up">Welcome To <br> <span style="color: #fad02c;">QR Code Scanner</span></h2>
            <p data-aos="fade-up" data-aos-delay="100">Scan your QR Code or Barcode to reveal exciting features!</p>           

            <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">
              
              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span id="day" class="purecounter"></span>
                  <p>Day</p>
                </div>
              </div>
              
              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span id="hours" class="purecounter"></span>
                  <p>Hours</p>
                </div>
              </div>
              
              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span id="minutes" class="purecounter"></span>
                  <p>Minutes</p>
                </div>
              </div>
              
              <div class="col-lg-3 col-6">
                <div class="stats-item text-center w-100 h-100">
                  <span id="seconds" class="purecounter"></span>
                  <p>Seconds</p>
                </div>
              </div>              

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 card glassmorphism shadow-lg border-0 rounded-lg" data-aos="zoom-out">
            <div class="card-body text-center p-4">
              <h4 class="card-title fw-bold text-white">Scaner</h4>
              <p class="card-text text-white mb-2">Scan your QR Code or Barcode</p></p>
            
              <aside class="console">
                <div class="header">
                  <div class="status-indicators">
                    <div class="circle red"></div>
                    <div class="circle yellow"></div>
                    <div class="circle green"></div>
                  </div>
                  <p class="bash">camera</p>
                </div>
                <div class="output mb-0">
                  <div id="reader"></div>
                  <p style="color: #fff; margin-bottom: 15px;">QR Code value:</p>
                  <p id="decodedText">Belum ada QR Code yang dipindai.</p>
                </div>
              </aside>
              <style>
                .console {
                  background-color: transparent; /* Membuat latar belakang transparan */
                  color: white;
                  padding: 10px 10px 20px 10px;
                  border-radius: 20%;
                  margin-top: 0;
                  width: 100%;
                  max-width: 30rem;
                  font-family: 'Courier New', monospace;

                  /* Border */
                  border: 2px solid transparent; /* Mengatur border dasar menjadi transparan */
                  border-image: linear-gradient(to right, #8000ff, #ff00ff, #00bfff, #0000ff) 1;

                }


              
                .header {
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
                  padding: 0px;
                }
              
                .status-indicators {
                  display: flex;
                  gap: 8px;
                }
              
                .circle {
                  width: 12px;
                  height: 12px;
                  border-radius: 50%;
                }
              
                .red {
                  background-color: red;
                }
              
                .yellow {
                  background-color: yellow;
                }
              
                .green {
                  background-color: green;
                }
              
                .bash {
                  font-size: 0.875rem; /* 14px */
                }
              </style>
              
            </div>            
        </div>
      </div>

    </section><!-- /Hero Section -->
  </main>

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

  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

  <script>
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Code matched = ${decodedText}`, decodedResult);
    
        let resultText = document.getElementById("decodedText");
        resultText.textContent = decodedText; 
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: {width: 250, height: 250} }, false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
  
</body>

</html>