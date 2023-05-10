<?php 
include 'koneksi.php';

if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'admin')){
  header("Location: login.php");
  exit();
}

$query = "SELECT * FROM user";

if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $query .= " WHERE username LIKE '%$search%' OR email LIKE '%$search%'";
}

// cek apakah parameter sort di-set
if (isset($_GET['sort'])) {
  // jika parameter sort di-set, ambil nilai sort dan pastikan hanya memilih kolom yang valid
  $valid_columns = array('username', 'email', 'role');
  $sort = mysqli_real_escape_string($conn, $_GET['sort']);
  if (in_array($sort, $valid_columns)) {
    // buat query SQL dengan perintah ORDER BY sesuai dengan nilai sort
    $query .= " ORDER BY $sort";
  }
}

$result = mysqli_query($conn, $query);

if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/crud.css">
    <title>Document</title>
</head>
<body>
  <div class="container">
    <nav class="wrapper">
        <div class="prof">
            <div class="fname">Cinema</div>
            <div class="lname">KW</div>
        </div>
        <?php if($_SESSION['role'] == 'admin'): ?>
            <ul class="nav">
              <li><a href="crud_tiket.php">Data Tiket</a></li>
              <li><a href="crud_user.php" class="active">Data User</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php else: ?>
            <ul class="nav">
              <li><a href="crud_tiket.php" class="active">Data Tiket</a></li>
              <li><a href="riwayat_pembelian.php">Riwayat Pembelian</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php endif; ?>
    </nav>
    <div class="table-user">
        <form method="GET" action="">
          <div class="search-container">
            <input type="text" name="search" placeholder="Search..." class="search-input">
            <button type="submit" class="search-button">Search</button>
          </div>
        </form>
        <div class ="tes">
        <a href="crud_user/create.php" class="btn-primary">Add Data</a>
        <a href="crud_user.php" class=btn-secondary>Refresh</a>
        </div>
        <table class="tabel">
            <thead>
            <tr class="table-judul">           
              <th>No</th>
              <th><a style="color:orange" href="?sort=username">Username</a></th>
              <th><a style="color:orange" href="?sort=email">Email</a></th>
              <th>Password</th>
              <th><a style="color:orange" href="?sort=role">Role</a></th>
              <th>Action</th>
            </tr>
            </thead>
            <?php
              $i=1;
              while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><?php echo $row['role']?></td>
                <td>
                    <a href="crud_user/update.php?id=<?php echo $row['id_user']?>" class="btn-danger" role="button">Update</a>
                    <a href="crud_user/delete.php?id=<?php echo $row['id_user']?>" class="btn-warning" role="button">Delete</a>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </table>
        <br>
    </div>
  </div>
</body>
</html>