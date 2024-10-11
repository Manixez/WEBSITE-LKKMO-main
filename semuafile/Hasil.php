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


// Get all records from tb_skck
$query = mysqli_query($conn, "SELECT * FROM tb_informasi");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hasil Penjualan</title>
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
      max-width: 800px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
      margin-bottom: 20px;
      font-size: 2rem;
      color: #fff;
    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid #fff;
      padding: 10px;
    }

    th {
      background-color: #333;
      color: #fff;
    }

    td {
      background-color: #fff;
      color: #000;
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
      <h1>Hasil Penjualan</h1>

      <!-- Tabel hasil penjualan -->
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Total Penjualan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($result as $row) {
          ?>
            <tr>
              <th scope="row"><?php echo $no++ ?></th>
              <td><?php echo $row['nama'] ?></td>
              <td><?php echo $row['gmail'] ?></td>
              <td><?php echo $row['telepon'] ?></td>
              <td><?php echo $row['total'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
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