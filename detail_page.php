<?php
include 'koneksi.php';

$id_tiket = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data = mysqli_fetch_array($query);

$query2 = "SELECT * FROM review WHERE id_tiket = $id_tiket";
$hasil = mysqli_query($conn, $query2);

$gambar = base64_encode($data['poster']);
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
        if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'pembeli')){
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
            }
        }else{
            if ($data['status_film'] == 'playing') { ?>
                <div class="welcome">
                    <?php
                    $email = $_SESSION['email'];
                    $query3 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                    if (mysqli_num_rows($query3) > 0) {
                        while ($data3 = mysqli_fetch_array($query3)) {
                            echo "<img src='img/avatar.png' alt='Avatar'>";
                            echo $data3['email'];
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
            <?php
            }else{ ?>
                <div class="welcome">
                    <?php
                    $email = $_SESSION['email'];
                    $query3 = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
                    if (mysqli_num_rows($query3) > 0) {
                        while ($data3 = mysqli_fetch_array($query3)) {
                            echo "<img src='img/avatar.png' alt='Avatar'>";
                            echo $data3['email'];
                        }
                    }
                    ?>
                </div>
                <ul class="nav">
                    <li><a href="user_page.php">Now Playing</a></li>
                    <li><a href="user_page2.php" class="active">Up Coming</a></li>
                    <li><a href="user_page3.php">About Us</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
        <?php 
            }
        }
        ?>

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
                $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : null;
                if ($data['status_film'] == 'playing') {?>
                    <p><b>Sinopsis:</b> <?php echo $data['sinopsis']; ?></p><br>
                    <p><b>Tanggal tayang:</b> <?php echo $data['jadwal_tayang']; ?></p>
                    <p><b>Waktu tayang:</b> <?php echo $data['waktu']; ?>:00</p>
                    <p><b>Harga tiket:</b> Rp <?php echo number_format($data['harga_tiket'], 0 , ',', '.'); ?></p>
                    <p><b>Durasi:</b> <?php echo $data['durasi']; ?> Menit</p>
                    <div class="detail-btn-container">
                        <button class="detail-btn review-btn" id="btn-review">Review</button>
                        <a href="<?php echo $data['trailer']; ?>" target="_blank"><button class="detail-btn trailer-btn">Trailer</button></a>
                        <a href="seat.php?id=<?php echo $data['id_tiket'] . '&id_user=' . $id_user; ?>"><button class="detail-btn buy-btn">Buy Ticket</button></a>
                    </div>
                    <?php
                }else{ ?>
                    <p><b>Sinopsis:</b> <?php echo $data['sinopsis']; ?></p><br>
                    <p><b>Tanggal tayang:</b> -</p>
                    <p><b>Waktu tayang:</b> -</p>
                    <p><b>Harga tiket:</b> -</p>
                    <p><b>Durasi:</b> <?php echo $data['durasi']; ?> Menit</p>
                    <div class="detail-btn-container">
                        <button class="detail-btn buy-btn2">Review</button>
                        <a href="<?php echo $data['trailer']; ?>" target="_blank"><button class="detail-btn trailer-btn">Trailer</button></a>
                        <button class="detail-btn buy-btn2">Buy Ticket</button>
                    </div>
                    <?php 
                    }
                    ?>
            </div>
        </div>
        <div class="popup">
            <div class="content">
                <span class="close">&times;</span>
                <h2><center>Review From Us<center></h2>
                <form>
                    <?php while ($data_hasil = mysqli_fetch_assoc($hasil)) { ?>
                    <p><b>SCORE:</b></p>
                    <p><?php echo $data_hasil['penilaian'] ?>/100</p>
                    <br>
                    <p><b>KOMENTAR:</b></p>
                    <p><?php echo $data_hasil['komentar'] ?></p>
                    <br>
                    <?php }?>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>