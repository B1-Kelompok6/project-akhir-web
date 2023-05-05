<?php 
session_start();
if(!isset($_SESSION['email']) || $_SESSION['role'] != 'staff'){
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
<div class="container">
        <nav class="wrapper">
            <div class="prof">
                <div class="fname">Cinema</div>
                <div class="lname">KW</div>
            </div>
            <ul class="nav">
                <li><a href="" class="active">Data Tiket</a></li>
                <li><a href="">Riwayat Pembelian</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
</body>
</html>