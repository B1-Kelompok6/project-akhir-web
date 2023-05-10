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
  <div class="container2">
			<nav class="wrapper">
				<div class="prof">
					<div class="fname">Cinema</div>
					<div class="lname">KW</div>
				</div>
				<ul class="nav">
					<li><p></p></li>
					<li><a href="index.php" class="active">Now Playing</a></li>
					<li><a href="upcoming_page.php">Up Coming</a></li>
					<li><a href="about_us.php">About Us</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>
	</div>
  
    <div class="movie-container">
      <label> Pilih bioskop:</label>
      <select id="movie">
        <option value="1">CGV Plaza Mulia</option>
        <option value="2">Pentacity XXI</option>
        <option value="3">Cinépolis Living Plaza</option>
        <option value="4">SCP 21</option>
        <option value="5">Platinum Cineplex</option>
        <option value="6">Movimax Kaza City</option>
      </select>
    </div>
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
    
    <p class="text">
      Anda telah memilih <span id="count">0</span> kursi 
    </p>
    <a href="pesan.php" id="pesan" >Oke</a>
    <script src="js/seat.js"></script>
  </body>
</html>

