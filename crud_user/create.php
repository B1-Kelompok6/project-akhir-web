<?php 
require '../koneksi.php';

$error="";
if(isset($_GET['add'])){
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $role = $_GET['role'];

    $query = "INSERT INTO user VALUES
            ('','$username','$email','$password','$role');";       
    if(mysqli_query($conn, $query)) {
        echo "<script>
                alert('Berhasil Menambahkan data');
                document.location.href = '../crud_user.php';
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
    <!-- <link rel="stylesheet" href="crud_user.css"> -->
</head>
<body>
<div class="container">
    <br>
    <center><h2>Input Data</h2></center>

    <form action="" method="get">
     
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan username" required/>
        </div>
       <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" class="form-control" placeholder="Masukan email" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Masukan password" required/>
        </div>
        <div class="form-group">
            <label>Role:</label>
            <input type="text" name="role" class="form-control" placeholder="Masukan password" required/>
        </div>
            <button style="margin-top:10px" type="submit" name="add" class="btn btn-primary">Submit</button>
            <?php if($error != ''){ ?>
                <div style="color:red; text-align:right;" ><?php echo $error; ?></div>
            <?php } ?>
    </form>
</div>
</body>
</html>