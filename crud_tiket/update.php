<?php
include '../koneksi.php';

$error = "";

if(isset($_POST['update'])){
    $id_tiket = $_POST['id_tiket'];
    $judul = $_POST['judul_film'];
    $status = $_POST['status'];
    $jadwal = $_POST['jadwal_tayang'];
    $waktu = $_POST['waktu'];
    $harga = $_POST['harga_tiket'];
    $sinopsis = $_POST['sinopsis'];
    $durasi = $_POST['durasi'];
    $rating = $_POST['rating'];
    $studio = $_POST['studio'];
    $trailer = $_POST['trailer'];

    // periksa apakah tag input poster diisi atau tidak
    if(!empty($_FILES['poster']['tmp_name'])){
        // Jika tag input poster diisi, maka baca file gambar yang di-upload
        $poster = $_FILES['poster']['tmp_name'];
        $isi_poster = addslashes(file_get_contents($poster));

        $query = "UPDATE tiket SET judul_film='$judul', status_film='$status', jadwal_tayang='$jadwal', 
                waktu='$waktu', harga_tiket='$harga', poster='$isi_poster', sinopsis='$sinopsis', 
                durasi='$durasi', rating='$rating', studio='$studio', trailer='$trailer' WHERE id_tiket='$id_tiket'";
    }else{
        $query = "UPDATE tiket SET judul_film='$judul', status_film='$status', jadwal_tayang='$jadwal', 
        waktu='$waktu', harga_tiket='$harga', sinopsis='$sinopsis', durasi='$durasi', rating='$rating', 
        studio='$studio', trailer='$trailer' WHERE id_tiket='$id_tiket'";
    }
    
    if(mysqli_query($conn, $query)){
    echo "<script>
            alert('Berhasil mengubah data tiket');
            document.location.href = '../crud_tiket.php';
          </script>";
    }else{
        $error = "Gagal mengubah data tiket: " . mysqli_error($error);
    }
}

$id_tiket = $_GET['id'];
$query = "SELECT * FROM tiket WHERE id_tiket='$id_tiket'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <center><h2>Update Data </h2></center>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="id_tiket" value="<?php echo $row['id_tiket'] ?>">
                <label>Judul Film:</label>
                <input type="text" name="judul_film" class="form-control" placeholder="Masukkan judul film" value="<?php echo $row['judul_film'] ?>" required>
            </div>
            <div class="form-group">
                <label>Status :</label>
                <input type="text" name="status" class="form-control" placeholder="Masukkan status film" value="<?php echo $row['status_film'] ?>" required>
            </div>
            <div class="form-group">
                <label>Jadwal Tayang:</label>
                <input type="date" name="jadwal_tayang" class="form-control" placeholder="Masukkan jadwal tayang" value="<?php echo $row['jadwal_tayang'] ?>">
            </div>
            <div class="form-group">
                <label>Waktu:</label>
                <input type="time" name="waktu" class="form-control" placeholder="Masukkan jam tayang" value="<?php echo $row['waktu'] ?>">
            </div>
            <div class="form-group">
                <label>Harga Tiket:</label>
                <input type="number" name="harga_tiket" class="form-control" placeholder="Masukkan harga tiket" value="<?php echo $row['harga_tiket'] ?>">
            </div>
            <div class="form-group">
                <label>Poster:</label>
                <input type="file" name="poster" class="form-control">
            </div>
            <div class="form-group">
                <label>Sinopsis:</label>
                <textarea name="sinopsis" class="form-control" placeholder="Masukkan sinopsis" required rows="5"><?php echo $row['sinopsis'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Durasi:</label>
                <input type="number" name="durasi" class="form-control" placeholder="Masukkan durasi film" value="<?php echo $row['durasi'] ?>" required>
            </div>
            <div class="form-group">
                <label>Rating:</label>
                <input type="text" name="rating" class="form-control" placeholder="Masukkan rating film" value="<?php echo $row['rating'] ?>" required>
            </div>
            <div class="form-group">
                <label>Studio:</label>
                <input type="text" name="studio" class="form-control" placeholder="Masukkan studio" value="<?php echo $row['studio'] ?>" required>
            </div>
            <div class="form-group">
                <label>Trailer:</label>
                <input type="text" name="trailer" class="form-control" placeholder="Masukkan link youtube trailer" value="<?php echo $row['trailer'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="../crud_tiket.php" class="btn btn-secondary">Batal</a><br><br>
        </form>
    </div>
</body>
</html>