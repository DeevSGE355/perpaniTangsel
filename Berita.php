<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persatuan Panahan Indonesia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="icon" href="Image/PPI.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/af434fda0d.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #2d6a4f;">
    <header class="header-container">
        <div class="header-left">
            <img src="Image/PPI.png" alt="Emblem Persatuan Panahan Indonesia" class="emblem">
        </div>
        <div class="header-right">
            <img src="Image/Olympics.png" alt="Logo Olimpiade" class="Olympics">
            <img src="Image/KOI.png" alt="Logo KONI" class="emblem1">
        </div>
    </header>

    <nav>
      <a href="#">Beranda</a>
      <div class="extras">
          <a href="#">Event</a>
          <div class="submenu">
          </div>
      </div>
      <a href="">Berita</a>
      <div class="extras">
          <a href="#">Tentang</a>
          <div class="submenu">
              <a href="Sejarah.html">Sejarah PERPANI</a>
              <a href="">Sekilas Perpani</a>
          </div>
      </div>
      <a href="#">Organisasi</a>
      <a href="#">Galeri</a>
      <div class="nav-connect">
          <p class="" style="margin-top: 1rem;">Connect With Us</p>
          <a href="#"><i aria-hidden="true" class="fa fa-instagram fa-2x"></i></a>
          <a href="#"><i aria-hidden="true" class="fa fa-youtube fa-2x"></i></a>
          <a href="#"><i aria-hidden="true" class="fa fa-envelope fa-2x"></i></a>
      </div>
  </nav>

    <main class="berita">
      <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Image\shutterstock_781561837.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Image/image.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Image/LOGO ATAS-01.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      </div>

      <div id="news-article" style="display: none;">
        <h2 id="article-title"></h2>
        <p id="article-date"></p>
        <p id="article-content"></p>
        <button onclick="goBack()">Back to News</button>
      </div>
      
      <div class="highlight">
      <div class="beritaterupdate">
        <h2>News Update</h2>
        <h3>HIGHLIGHT</h3>
      </div>
      <div class="news-item" onclick="showArticle('Title Here', 'Date Here', 'Content Here')">
        <article class="news-content">
          <p>Date Here</p>
          <h3>Title Here</h3>
          <p>Summary or excerpt of the news article.</p>
      </article>
      </div>
    </div>
    </main>

    <footer>
        <div class="footer-logo">
            <img src="Image/Untitled-1-03.png" alt="Logo PerpaniTangsel">
        </div>
        <div class="footer-description">
            <p>Website Pengprov PERPANITANGSEL merupakan sumber informasi terpercaya yang mengulas kegiatan dan prestasi olahraga panahan di DKI Jakarta dengan lengkap dan terkini.</p>
        </div>
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7000063528744!2d106.81594046147374!3d-6.170908060448664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5b872813b63%3A0x370474d7495defc3!2sKONI%20Provinsi%20DKI%20Jakarta!5e0!3m2!1sen!2sid!4v1730983442724!5m2!1sen!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-contact">
            <h4>Alamat</h4>
            <p class="alamat">Kantor KONI DKI Jakarta Lt. 3, ruang 38. Jl. Tanah Abang I Kel. Petojo Selatan, Jakarta Pusat 10160 <br><br> perpanidkijakarta@gmail.com</p>
        </div>
        <div class="footer-sosmed">
            <p>CONNECT WITH US</p>
            <a href="#"><i class="fa fa-instagram fa-3x"></i></a>
            <a href="#"><i class="fa fa-youtube fa-3x"></i></a>
            <a href="#"><i class="fa fa-envelope fa-3x"></i></a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>