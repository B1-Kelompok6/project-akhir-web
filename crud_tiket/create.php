<?php
require '../koneksi.php';

$error = "";

if (isset($_POST['add'])) {
    $judul = $_POST['judul_film'];
    $status = $_POST['status'];
    $jadwal = $_POST['jadwal_tayang'];
    $waktu = $_POST['waktu'];
    $harga = $_POST['harga_tiket'];
    $sinopsis = $_POST['sinopsis'];
    $durasi = $_POST['durasi'];
    $rating = $_POST['rating'];
    $studio = $_POST['studio'];

    // Membaca file gambar yang di-upload
    $poster = $_FILES['poster']['tmp_name'];
    $isi_poster = addslashes(file_get_contents($poster));

    // Query untuk menyimpan data ke dalam tabel tiket
    $query = "INSERT INTO tiket VALUES ('','$judul', '$status', '$jadwal', '$waktu', '$harga', '$isi_poster', '$sinopsis', '$durasi', '$rating', '$studio')";

    if(mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil Menambahkan data tiket');
                document.location.href = '../crud_tiket.php';
            </script>";
    } else {
        $error = "Gagal menambahkan data : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <a href=""></a>
</head>
<body>
    <div class="container">
        <br>
        <center><h2>Input Data Tiket</h2></center>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Judul Film:</label>
            <input type="text" name="judul_film" class="form-control" placeholder="Masukkan judul film" required>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <input type="text" name="status" class="form-control" placeholder="Masukkan status film" required>
        </div>
        <div class="form-group">
            <label>Jadwal Tayang:</label>
            <input type="date" name="jadwal_tayang" class="form-control" placeholder="Masukkan jadwal tayang">
        </div>
        <div class="form-group">
            <label>Waktu:</label>
            <input type="time" name="waktu" class="form-control" placeholder="Masukkan jam tayang">
        </div>
        <div class="form-group">
            <label>Harga Tiket:</label>
            <input type="number" name="harga_tiket" class="form-control" placeholder="Masukkan harga tiket">
        </div>
        <div class="form-group">
            <label>Poster:</label>
            <input type="file" name="poster" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Sinopsis:</label>
            <textarea name="sinopsis" class="form-control" placeholder="Masukkan sinopsis" required></textarea>
        </div>
        <div class="form-group">
            <label>Durasi:</label>
            <input type="number" name="durasi" class="form-control" placeholder="Masukkan durasi film" required>
        </div>
        <div class="form-group">
            <label>Rating:</label>
            <input type="text" name="rating" class="form-control" placeholder="Masukkan rating film" required>
        </div>
        <div class="form-group">
            <label>Studio:</label>
            <input type="text" name="studio" class="form-control" placeholder="Masukkan studio" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
        <a href="../crud_tiket.php" class="btn btn-secondary">Batal</a>
        <?php if($error != ''){ ?>
            <div style="color:red; text-align:right;" ><?php echo $error; ?></div>
        <?php } ?>
    </div>
</body>
</html>