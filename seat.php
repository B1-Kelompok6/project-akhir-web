<?php 
include "koneksi.php";

if(!isset($_SESSION['email']) || ($_SESSION['role'] != 'pembeli')){
  header("Location: login.php");
}

$id_tiket = $_GET['id'];
$id_user = $_GET['id_user'];

$query = "SELECT * FROM bioskop";
$data = mysqli_query($conn, $query);

$query_harga = mysqli_query($conn, "SELECT * FROM tiket WHERE id_tiket = $id_tiket");
$data_harga = mysqli_fetch_array($query_harga);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/seat.css" />
    <title>Movie Seat Booking</title>
  </head>
  <body>  
    <div class="movie-container">
      <form method="POST" action="pesan.php?id=<?php echo $id_tiket . '&id_user=' . $id_user; ?>"
      <label> Pilih bioskop:</label>
      <select name="bioskop" id="movie">;
        <?php while($row = mysqli_fetch_assoc($data)) {
          echo '<option value="' . $row['nama_bioskop'] . '">' . $row['nama_bioskop'] . '</option>';
        } ?>
      </select>
    </div>
    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>Sold</small>
      </li>
    </ul>
    <div class="container">
      <div class="screen"></div>

      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>

      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
      </div>
      <div class="row">
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat sold"></div>
        <div class="seat"></div>
      </div>
    </div>
    
    <br>
    <p class="text">Anda telah memilih <span id="count">0</span> kursi.</p>
      <input type="hidden" name="jumlah_tiket" id="jumlah-tiket" value="1">
    <p>Harga per tiket: Rp <span id="harga-tiket"><?= $data_harga['harga_tiket'] ?></span></p>
      <input type="hidden" name="harga_tiket" id="input-harga-tiket" value="<?= $data_harga['harga_tiket'] ?>">
    <p>Total harga: Rp <span id="total-harga"></span></p>
      <input type="hidden" name="total_harga" id="input-total-harga">
    
      <button type="submit" id="pesan">Lanjutkan</button>
    <a href="user_page.php">Kembali</a>
    </form>
    
    <script>
      const seats = document.querySelectorAll(".row .seat:not(.sold)");
      const count = document.getElementById("count");
      const jumlahTiketInput = document.getElementById("jumlah-tiket");
      const hargaTiket = document.getElementById("harga-tiket");
      const inputHargaTiket = document.getElementById("input-harga-tiket");
      const totalHarga = document.getElementById("total-harga");
      const inputTotalHarga = document.getElementById("input-total-harga");

      let jumlahTiket = +jumlahTiketInput.value;

      function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll(".row .seat.selected");
        const selectedSeatsCount = selectedSeats.length;

        count.innerText = selectedSeatsCount;

        const currentHargaTiket = parseFloat(hargaTiket.innerText.replace("Rp. ", ""));
        const currentTotalHarga = selectedSeatsCount * currentHargaTiket;

        totalHarga.innerText = currentTotalHarga.toLocaleString("id-ID");
        inputHargaTiket.value = currentHargaTiket;
        inputTotalHarga.value = currentTotalHarga;

        jumlahTiket = selectedSeatsCount;
        jumlahTiketInput.value = jumlahTiket;
      }

      seats.forEach((seat) => {
        seat.addEventListener("click", (e) => {
          if (seat.classList.contains("selected")) {
            seat.classList.remove("selected");
          } else {
            seat.classList.add("selected");
          }

          updateSelectedCount();
        });
      });

      jumlahTiketInput.addEventListener("input", (e) => {
        jumlahTiket = +e.target.value;
        updateSelectedCount();
      });
    </script>
  </body>
</html>

