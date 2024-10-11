<?php
session_start();
include "proses/connect.php";
// Check if session is set
if (!isset($_SESSION['username_elsampah'])) {
  echo "Anda perlu login untuk mengakses halaman ini.";
  exit();
}
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elsampah]'");
$hasil = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us Page with Dropdown</title>
  <link rel="stylesheet" href="aboutus.css" />
  <style>
    /* Pusatkan kotak di tengah halaman */
    .about-section {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 100px;
      /* Buat agar kotak berada di tengah secara vertikal */
    }

    .about-container {
      background-color: #000;
      /* Warna hitam untuk kotak */
      color: #fff;
      /* Warna putih untuk teks */
      padding: 30px;
      border-radius: 10px;
      max-width: 600px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #fff;
    }

    p {
      font-size: 1.2rem;
      line-height: 1.6;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <!-- Profile Icon with Dropdown -->
  <header>
    <div class="left-header">
      <div class="logo">
        <a href="landingpage2.php">
          <img src="Vector.png" alt="Recygiene Logo" />
        </a>
      </div>
      <nav>
        <ul>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li>
            <?php if ($hasil['level'] == 1) { ?>
              <a href="hasil.php" id="layanan">Hasil Penjualan</a>
            <?php } ?>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Profile Icon with Dropdown -->
    <div class="profile">
      <img src="Group.png" alt="Profile Logo" class="profile-icon" id="profile-btn" />
      <!-- Dropdown tools -->
      <div id="tools-dropdown" class="dropdown-content">
        <a href="profile.php">Profile</a>
        <a href="proses/proseslogout.php">Log Out</a>
      </div>
    </div>
  </header>

  <!-- About Us Section -->
  <div class="about-section">
    <div class="about-container">
      <h1>Tentang Kami</h1>
      <p>
        Selamat datang di Recygiene! Kami berdedikasi untuk mempromosikan keberlanjutan melalui
        kesadaran daur ulang dan kebersihan.
      </p>
      <p>
        Misi kami adalah menginspirasi orang untuk mengurangi
        limbah dan mengadopsi kebiasaan ramah lingkungan guna menciptakan planet yang lebih bersih
        dan lebih sehat.
      </p>
      <p>
        Bersama-sama, kita dapat membuat perbedaan. Bergabunglah dengan kami dalam perjalanan
        menuju masa depan yang lebih hijau!
      </p>

    </div>

    <!-- Script for Dropdown Functionality -->
    <script>
      // Saat user mengklik profile button
      document.getElementById("profile-btn").addEventListener("click", function() {
        document.getElementById("tools-dropdown").classList.toggle("show");
      });

      // Tutup dropdown saat mengklik di luar area dropdown
      window.onclick = function(event) {
        if (!event.target.matches(".profile-icon")) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
              openDropdown.classList.remove("show");
            }
          }
        }
      };
    </script>
</body>

</html>