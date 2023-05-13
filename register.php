<?php 
include "koneksi.php";

$error = "";
if (isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO user (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if(mysqli_query($conn, $query)){
        echo"
        <script>
            alert('Registrasi akun berhasil!');
            window.location.href = 'login.php';
        </script>";
    } else {
        $error = "Registrasi akun gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
</head>
    <body>
        <div class='register'>
        <h1>REGISTER</h1>
        <form action="" method="post">
            Username:
            <input type="text" name="username" required>
            <br>
            Email:
            <input type="email" name="email" required>
            <br>
            Password:
            <input type="password" name="password" required>
            <br>
            <select name="role" required>
                <option value="pembeli">Pembeli</option>
            </select>
            <br><br>
            <button type="submit" name="register">REGISTER</button>
            <br>
            <p> sudah punya akun? <a href="login.php">Login</a></p>
            <?php if($error != ''){ ?>
                <div style="color: red;"><?php echo $error; ?></div>
            <?php } ?>
        </div>
        </form>
    </body>
</html>
