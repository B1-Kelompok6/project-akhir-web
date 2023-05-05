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
  <title>Up Coming</title>
  <link rel="stylesheet" href="style.css">
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
                <li><a href="upcoming_page.php" class="active">Up Coming</a></li> 
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>