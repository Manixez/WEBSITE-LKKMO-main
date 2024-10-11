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
  <title>Contact Us Page with Dropdown</title>
  <link rel="stylesheet" href="profile.css" />
  <style>
    /* Pusatkan kotak di tengah halaman */
    .contact-section {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 100px;
    }

    .contact-container {
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

    .contact-info {
      margin-top: 20px;
      font-size: 1.2rem;
    }

    .contact-info img {
      width: 24px;
      height: 24px;
      margin-right: 10px;
    }

    .contact-info p {
      margin: 10px 0;
    }
  </style>
</head>

<body>
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

  <!-- Contact Us Section -->
  <div class="contact-section">
    <div class="contact-container">
      <h1>Contact Us</h1>
      <p>If you have any questions or need assistance, feel free to contact us!</p>

      <!-- Contact Information -->
      <div class="contact-info">
        <p>
          <img src="whatsapp-logo.png" alt="WhatsApp Logo" />
          <strong>WhatsApp:</strong> +62 812 2233 4455
        </p>
        <p>
          <img src="gmail-logo.png" alt="Gmail Logo" />
          <strong>Email:</strong> kelompok2@gmail.com
        </p>
      </div>
    </div>
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