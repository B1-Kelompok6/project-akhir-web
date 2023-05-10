<?php
// Menghubungkan ke database
include 'koneksi.php';

// Mengambil id tiket dari URL
$id_tiket = $_GET['id'];

// Mengambil data tiket yang dipilih
$query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data = mysqli_fetch_array($query);

// Mengubah data poster menjadi format gambar
$gambar = base64_encode($data['poster']);

// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Page</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body class="body-detail">
    <div class="containerr">
        <nav class="wrapper">
        <div class="prof">
            <div class="fname">Cinema</div>
            <div class="lname">KW</div>
        </div>
        <?php 
        if ($data['status_film'] == 'playing') {?>
            <ul class="nav">
                <li><a href="index.php" class="active">Now Playing</a></li>
                <li><a href="upcoming_page.php">Up Coming</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        <?php
        }else{ ?>
            <ul class="nav">
                <li><a href="index.php" >Now Playing</a></li>
                <li><a href="upcoming_page.php" class="active">Up Coming</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        <?php 
        }?>
        </nav>
        <div class="tiket-detail">
        <img src="data:image/jpeg;base64,<?php echo $gambar; ?>" alt="Poster Film">
            <div class="tiket-detail-info">
                <h2><?php echo $data['judul_film']; ?></h2>
                
                <div class="tiket-detail-a">
                    <p><?php echo $data['rating']; ?></p>
                    <p><?php echo $data['studio']; ?></p>
                </div>

                <?php 
                if ($data['status_film'] == 'playing') {?>
                    <p><b>Sinopsis:</b> <?php echo $data['sinopsis']; ?></p><br>
                    <p><b>Tanggal tayang:</b> <?php echo $data['jadwal_tayang']; ?></p>
                    <p><b>Waktu tayang:</b> <?php echo $data['waktu']; ?> WITA</p>
                    <p><b>Harga tiket:</b> Rp <?php echo number_format($data['harga_tiket'], 0 , ',', '.'); ?></p>
                    <p><b>Durasi:</b> <?php echo $data['durasi']; ?> Menit</p>
                    <div class="detail-btn-container">
                        <button class="detail-btn review-btn" id="btn-review">Review</button>
                        <button class="detail-btn trailer-btn">Trailer</button>
                        <button class="detail-btn buy-btn">Buy Ticket</button>
                    </div>
                    <?php
                }else{ ?>
                    <p><b>Sinopsis:</b> <?php echo $data['sinopsis']; ?></p><br>
                    <p><b>Tanggal tayang:</b> -</p>
                    <p><b>Waktu tayang:</b> -</p>
                    <p><b>Harga tiket:</b> Rp -,</p>
                    <p><b>Durasi:</b> <?php echo $data['durasi']; ?> Menit</p>
                    <div class="detail-btn-container">
                        <button class="detail-btn buy-btn2" disabled>Review</button>
                        <button class="detail-btn trailer-btn">Trailer</button>
                        <button class="detail-btn buy-btn2">Buy Ticket</button>
                    </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>