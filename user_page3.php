<?php 
include "koneksi.php";

if(!isset($_SESSION['email']) || $_SESSION['role'] != 'pembeli'){
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <nav class="wrapper">
            <div class="prof">
                <div class="fname">Cinema</div>
                <div class="lname">KW</div>
            </div>
            <div class="welcome">
                <?php
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                if (mysqli_num_rows($query) > 0) {
                    // Looping data dari tabel user
                    while ($data = mysqli_fetch_array($query)) {
                        // Menampilkan sapaan dengan nama user
                        echo "Halo, ".$data['username']."!";
                    }
                }
                ?>
            </div>
            <ul class="nav">
                <li><a href="user_page.php">Now Playing</a></li>
                <li><a href="user_page2.php">Up Coming</a></li>
                <li><a href="user_page3.php" class="active">About Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <section class="parallax">
        <img src="img/kursi.jpg" id="kursi" width="100%">
        <img src="img/aboutteks.png" id="aboutteks" width="50%">
    </section>

    <section class="sec">
        <h2>Cinema <span>KW</span></h2>
        <p>
        Cinema KW adalah sebuah aplikasi tiket bioskop yang memungkinkan pengguna untuk dengan mudah membeli tiket bioskop 
        dari kenyamanan rumah mereka sendiri. Aplikasi ini memberikan pengguna akses ke jadwal film terbaru di berbagai 
        bioskop terkemuka di seluruh kota. Pengguna dapat melihat daftar film, lokasi bioskop, jadwal penayangan, 
        harga tiket, dan tempat duduk yang tersedia dalam satu aplikasi.<br><br>
        Cinema KW menawarkan pengalaman beli tiket yang nyaman, cepat, dan aman. 
        Dengan antarmuka yang mudah dipahami, aplikasi ini cocok untuk pengguna dari segala usia dan latar belakang. 
        Jadi tunggu apa lagi? Gunakan website Cinema KW sekarang dan nikmati pengalaman menonton film yang menyenangkan dengan mudah dan cepat!
        </p>
    </section>

    <script src="js/script.js"></script>
</body>
</html>