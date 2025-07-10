<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOKO PUTRA SUGEMA</title>

  <!-- Bootstrap CSS (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons (CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom Font (Optional) -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .product-card img {
      height: 180px;
      object-fit: cover;
    }
  </style>
</head>

<body class="bg-light">

  <header class="bg-dark text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h2 class="mb-0">PUTRA SUGEMA</h2>
      <nav>
        <a href="#minuman" class="text-white mx-2">Minuman</a>
        <a href="#makanan" class="text-white mx-2">Makanan</a>
        <a href="#alatmandi" class="text-white mx-2">Alat Mandi</a>
        <a href="#pencuci" class="text-white mx-2">Pencuci</a>
      </nav>
    </div>
  </header>

  <!-- Hero -->
  <section class="bg-secondary text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Selamat Datang di Toko Putra Sugema</h1>
      <p class="lead">Toko sembako lengkap dan terpercaya</p>
    </div>
  </section>

  <!-- Produk Makanan -->
  <section id="makanan" class="py-5">
    <div class="container">
      <h2 class="mb-4">Produk Makanan</h2>
      <p class="text-muted mb-4">Kebutuhan pokok seperti beras, minyak, mie instan, dan lainnya tersedia lengkap.</p>
      <div class="row g-4">

        <!-- Produk 1 -->
        <div class="col-md-3">
          <div class="card product-card">
            <img src="{{ asset('img/makanan/beras.jpg') }}" class="card-img-top" alt="Beras Ramos 5kg">
            <div class="card-body text-center">
              <h5 class="card-title">Beras Ramos 5kg</h5>
              <p class="card-text">Beras putih pulen, kualitas premium untuk kebutuhan harian Anda.</p>
              <button class="btn btn-primary">Beli</button>
            </div>
          </div>
        </div>

        <!-- Produk 2 -->
        <div class="col-md-3">
          <div class="card product-card">
            <img src="{{ asset('img/makanan/minyak.jpg') }}" class="card-img-top" alt="Minyak Goreng 1L">
            <div class="card-body text-center">
              <h5 class="card-title">Minyak Goreng 1L</h5>
              <p class="card-text">Minyak jernih dan sehat, cocok untuk menggoreng atau menumis.</p>
              <button class="btn btn-primary">Beli</button>
            </div>
          </div>
        </div>

        <!-- Produk 3 -->
        <div class="col-md-3">
          <div class="card product-card">
            <img src="{{ asset('img/makanan/mie-instan.jpg') }}" class="card-img-top" alt="Indomie Goreng">
            <div class="card-body text-center">
              <h5 class="card-title">Indomie Goreng</h5>
              <p class="card-text">Mie instan favorit dengan bumbu khas dan tekstur kenyal.</p>
              <button class="btn btn-primary">Beli</button>
            </div>
          </div>
        </div>

        <!-- Produk 4 -->
        <div class="col-md-3">
          <div class="card product-card">
            <img src="{{ asset('img/makanan/gula.jpg') }}" class="card-img-top" alt="Gula Pasir 1kg">
            <div class="card-body text-center">
              <h5 class="card-title">Gula Pasir 1kg</h5>
              <p class="card-text">Gula murni berkualitas tinggi untuk kebutuhan dapur Anda.</p>
              <button class="btn btn-primary">Beli</button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">© {{ date('Y') }} Toko Putra Sugema. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
