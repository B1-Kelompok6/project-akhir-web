<?php
include ("koneksi.php");

session_unset();



$error = '';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password' AND role='$role'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['username'];
        $_SESSION['pass'] = $user['password'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'pembeli') {
            header('Location: user_page.php');
        } else if ($user['role'] == 'staff') {
            header('Location: crud_tiket.php');
        } else if ($user['role'] == 'admin') {
            header('Location: crud_tiket.php');
        }
        exit();
    } else {
        $error = "Email, password, atau role anda salah.";
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
        <div class='login'>
        <h1>LOGIN</h1>
        <form action="" method="post">
            Email:
            <input type="email" name="email" required>
            <br>
            Password:
            <input type="password" name="password" required>
            <br>
            <select name="role" required>
                <option value="pembeli">Pembeli</option>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
            </select>
            <br>
            <button type="submit" name="login">LOGIN</button>
            <br>
            <p> belum punya akun? <a href="register.php">Daftar</a></p>
            <?php if($error != ''){ ?>
                <div style="color: red; text-align:center;"><?php echo $error; ?></div>
            <?php } ?>
        </div> 
        </form>
    </body>
</html>