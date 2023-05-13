<?php
require '../koneksi.php';
$error = "";

$id_tiket = $_GET['id'];

if (isset($_POST['add'])) {
    $id_tiket = $_POST['id_tiket'];
    $penilaian = $_POST['score'];
    $komentar = $_POST['komentar'];

    $query = "INSERT INTO review VALUES ('','$penilaian', '$komentar', '$id_tiket')";

    if(mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil menambahkan review');
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
    <title>Add Review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <a href=""></a>
</head>
<body>
    <div class="container">
        <br>
        <center><h2>Add Review</h2></center>
        <br>
        <?php if($error != ''){ ?>
            <div style="color:red; text-align:right;" ><?php echo $error; ?></div>
        <?php } ?>
        <form action="" method="post">
        <div class="form-group">
            <label>Score Film (skala 1-100):</label>
            <input type="number" name="score" class="form-control" placeholder="Masukkan score" required>
        </div>
        <div class="form-group">
            <label>Komentar:</label>
            <textarea name="komentar" class="form-control" placeholder="Masukkan komentar" required style="height: 150px;"></textarea>
        </div>
        <input type="hidden" name="id_tiket" value="<?= $id_tiket ?>">

        <button type="submit" name="add" class="btn btn-primary">Submit</button>
        <a href="../crud_tiket.php" class="btn btn-secondary">Batal</a>
        <br>
        <br>
    </div>
</body>
</html>