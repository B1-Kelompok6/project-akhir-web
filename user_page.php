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
  <title>Ticket</title>
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
                <li><a href="user_page.php" class="active">Now Playing</a></li>
                <li><a href="user_page2.php">Up Coming</a></li>
                <li><a href="user_page3.php">About Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM tiket WHERE status_film = 'playing'");

        // Cek apakah ada data
        if (mysqli_num_rows($query) > 0) {
            ?>
            <div class="tiket-container">
            <?php
            // Looping data dari tabel tiket_nonton_bioskop
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <div class="tiket-item">
                    <?php $gambar = base64_encode($data['poster']);?>
                    <a href="detail_tiket.php">
                        <img src="data:image/jpeg;base64,<?php echo $gambar; ?>" alt="Poster Film">
                    </a>
                    <div class="tiket-info">
                        <h2><?php echo $data['judul_film']; ?></h2>
                        <br>
                        <div class="tiket-a">
                            <p><?php echo $data['rating']; ?></p>
                            <p><?php echo $data['studio']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        } else {
            echo "Tidak ada data tiket nonton bioskop.";
        }

        // Menutup koneksi database
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
