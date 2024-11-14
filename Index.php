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
<body>
    <?php
        // Start the session and include your database connection file
    session_start();
    // Include your database connection file here
    $host = "localhost"; // Database host
    $user = "root"; // Database username
    $password = ""; // Database password
    $dbname = "perpani"; // Database name

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch news
    $sql_news = "SELECT * FROM berita ORDER BY tgl_post DESC"; // Adjust the query as needed
    $result_news = $conn->query($sql_news);

    // Fetch sponsors
    $sql_sponsors = "SELECT * FROM sponsors"; // Adjust the query as needed
    $result_sponsors = $conn->query($sql_sponsors);

    $sql_carousel = "SELECT gambar FROM event"; // Adjust the query as needed
    $result = $conn->query($sql_carousel);
    ?>

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
            <div class="submenu"></div>
        </div>
        <a href="">Berita</a>
        <div class="extras">
            <a href="#">Tentang</a>
            <div class="submenu">
                <a href="Sejarah.php">Sejarah PERPANI</a>
                <a href="">Sekilas Perpani</a>
            </div>
        </div>
        <a href="#">Organisasi</a>
        <a href="#">Galeri</a>
        <div class="nav-connect">
            <p class="connect">Connect With Us</p>
            <a href="#"><i aria-hidden="true" class="fa fa-instagram fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-youtube fa-2x"></i></a>
            <a href="#"><i aria-hidden="true" class="fa fa-envelope fa-2x"></i></a>
        </div>
    </nav>

    <div class="content">
    <div id="carouselExampleInterval" class="carousel slide w-80" data-bs-ride="carousel">
        <div class="carousel-inner" id="carousel-inner">
        <?php
        // Query the database for image file paths
        $result = $conn->query("SELECT gambar FROM event");

        if ($result->num_rows > 0) {
            $isFirst = true; // Variable to track the first item
            while ($row = $result->fetch_assoc()) {
                $image = htmlspecialchars($row['gambar']); // Sanitize output
                echo '<div class="carousel-item ' . ($isFirst ? 'active' : '') . '">'; // Set first item as active
                echo '<img src="' . $image . '" class="d-block w-100" alt="Slide">';
                echo '</div>';
                $isFirst = false; // Set to false after the first iteration
            }
        } else {
            echo '<div class="carousel-item active"><img src="placeholder.jpg" class="d-block w-100" alt="No Images Available"></div>'; // Placeholder if no images
        }

        // Close the connection
        $conn->close();
        ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>
    </div>
</div>

        <div class="news">
            <div class="Updated">
                <h2>News Update</h2>
                <a href="Berita.php">View All</a>
            </div>
            <div class="news-item">
                <?php
                 if ($result_news && $result_news->num_rows > 0) {
                    while ($row = $result_news->fetch_assoc()) {
                        $newsId = htmlspecialchars($row['id']);
                        echo '<a href="berita.php?id=' . $newsId . '" class="news-content">';
                        echo '<p>' . date('d F Y', strtotime($row['tgl_post'])) . '</p>';
                        echo '<h3>' . htmlspecialchars($row['judul']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['isi']) . '</p>';
                        echo '</a>';
                    }
                } else {
                    echo '<div class="news-item"><p>No news available.</p></div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="sponsor">
        <h2>A THANK YOU TO OUR PROUD SPONSORS</h2>
        <div class="sponsor-list">
            <?php
            if ($result_sponsors->num_rows > 0) {
                while ($row = $result_sponsors->fetch_assoc()) {
                    echo '<img src="' . htmlspecialchars($row['logo_path']) . '" alt="Logo ' . htmlspecialchars($row['name']) . '">';
                }
            } else {
                echo "No sponsors available.";
            }
            ?>
        </div>
    </div>

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
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2 /umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>