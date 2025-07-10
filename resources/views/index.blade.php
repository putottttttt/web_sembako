<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>TOKO PUTRA SUGEMA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="img/logotoko.jpeg" alt="" class="img-fluid">
    </div>

    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="/img/logo.png" alt=""> -->
      <h1 class="sitename">PUTRA SUGEMA</h1>
    </a>

    <div class="social-links text-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class=""></i>Home</a></li>
        <li><a href="#minuman"><i class=""></i> MINUMAN</a></li>
        <li><a href="#makanan"><i class=""></i> MAKANAN</a></li>
        <li><a href="#alatmandi"><i class=""></i> ALATMANDI</a></li>
        <li><a href="#pencuci"><i class=""></i> PENCUCI</a></li>
        <li><a href="{{ route('keranjang') }}"><i class="bi bi-cart"></i> KERANJANG</a></li>
        <li><a href="{{ route('purchases.history') }}"><i class="bi bi-clock-history"></i> RIWAYAT</a></li>
        <li class="mt-3">
          <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Yakin ingin logout?')">
              <i class="bi bi-box-arrow-right"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="img/gambartoko.jpg" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>PUTRA SUGEMA</h2>
        <p>TOKO <span class="typed" data-typed-items="SEMBAKO">SEMBAKO</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section><!-- /Hero Section -->

    
    <section id="minuman" class="minuman section">

  <!-- Section Minuman -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Produk Minuman</h2>
    <p>Berbagai pilihan minuman segar dan kemasan, cocok untuk stok harian di rumah Anda.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      @foreach($minuman as $product)
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100">
          <img src="{{ $product->gambar ? 'img/' . $product->gambar : 'img/default-product.jpg' }}" 
               class="card-img-top" 
               alt="{{ $product->nama }}" 
               style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            
            <div class="btn-group w-100" role="group">
              <form action="{{ route('beli.produk') }}" method="POST" class="flex-fill">
                @csrf
                <input type="hidden" name="nama" value="{{ $product->nama }}">
                <input type="hidden" name="harga" value="{{ $product->harga }}">
                <button type="submit" class="btn btn-primary btn-sm w-100">Keranjang</button>
              </form>
              <a href="{{ route('purchases.create', $product->id) }}" class="btn btn-success btn-sm flex-fill ml-1">
                Beli Langsung
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

    <!-- Skills Section -->
 <section id="makanan" class="makanan section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Produk Makanan</h2>
    <p>Kebutuhan pokok sehari-hari seperti beras, minyak, mie instan, dan lainnya tersedia di toko kami.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      @foreach($makanan as $product)
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100">
          <img src="{{ $product->gambar ? 'img/' . $product->gambar : 'img/default-product.jpg' }}" 
               class="card-img-top" 
               alt="{{ $product->nama }}" 
               style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            
            <div class="btn-group w-100" role="group">
              <form action="{{ route('beli.produk') }}" method="POST" class="flex-fill">
                @csrf
                <input type="hidden" name="nama" value="{{ $product->nama }}">
                <input type="hidden" name="harga" value="{{ $product->harga }}">
                <button type="submit" class="btn btn-primary btn-sm w-100">Keranjang</button>
              </form>
              <a href="{{ route('purchases.create', $product->id) }}" class="btn btn-success btn-sm flex-fill ml-1">
                Beli Langsung
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</section>



   <section id="alatmandi" class="alatmandi section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Produk Alat Mandi</h2>
    <p>Berbagai kebutuhan mandi harian tersedia, mulai dari sabun, sampo, pasta gigi, hingga tisu.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      @foreach($alatmandi as $product)
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100">
          <img src="{{ $product->gambar ? 'img/' . $product->gambar : 'img/default-product.jpg' }}" 
               class="card-img-top" 
               alt="{{ $product->nama }}" 
               style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            
            <div class="btn-group w-100" role="group">
              <form action="{{ route('beli.produk') }}" method="POST" class="flex-fill">
                @csrf
                <input type="hidden" name="nama" value="{{ $product->nama }}">
                <input type="hidden" name="harga" value="{{ $product->harga }}">
                <button type="submit" class="btn btn-primary btn-sm w-100">Keranjang</button>
              </form>
              <a href="{{ route('purchases.create', $product->id) }}" class="btn btn-success btn-sm flex-fill ml-1">
                Beli Langsung
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</section>


  <section id="pencuci" class="produk-pencuci section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Produk Pencuci</h2>
    <p>Berbagai produk pencuci untuk kebutuhan rumah tangga, mulai dari sabun cuci piring, detergen, hingga cairan pel lantai.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-center">
      @foreach($pencuci as $product)
      <div class="col-lg-3 col-md-6">
        <div class="card text-center h-100">
          <img src="{{ $product->gambar ? 'img/' . $product->gambar : 'img/default-product.jpg' }}" 
               class="card-img-top" 
               alt="{{ $product->nama }}" 
               style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">{{ $product->nama }}</h5>
            <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
            
            <div class="btn-group w-100" role="group">
              <form action="{{ route('beli.produk') }}" method="POST" class="flex-fill">
                @csrf
                <input type="hidden" name="nama" value="{{ $product->nama }}">
                <input type="hidden" name="harga" value="{{ $product->harga }}">
                <button type="submit" class="btn btn-primary btn-sm w-100">Keranjang</button>
              </form>
              <a href="{{ route('purchases.create', $product->id) }}" class="btn btn-success btn-sm flex-fill ml-1">
                Beli Langsung
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</section>


  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/typed.js/typed.umd.js"></script>
  <script src="vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="vendor/waypoints/noframework.waypoints.js"></script>
  <script src="vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="js/main.js"></script>
</body>
</html>