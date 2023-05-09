<?php
include '../koneksi.php';

if(isset($_POST['update'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE user SET username='$username', email='$email', password='$password', role='$role' WHERE id_user='$id_user'";
    mysqli_query($conn, $query);
    echo "<script>
            alert('Berhasil mengubah data user');
            document.location.href = '../crud_user.php';
          </script>";
}

$id_user = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user='$id_user'";
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
        <center><h2>Update Data User</h2></center>
        <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username" value="<?php echo $row['username'] ?>" required/>
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email" value="<?php echo $row['email'] ?>" required/>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan password" value="<?php echo $row['password'] ?>" required/>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <input type="text" name="role" class="form-control" placeholder="Masukan role" value="<?php echo $row['role'] ?>" required/>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="../crud_user.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>