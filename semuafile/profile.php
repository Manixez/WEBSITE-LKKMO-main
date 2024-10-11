<?php
session_start();
include "proses/connect.php";
// Check if session is set
if (!isset($_SESSION['username_elsampah'])) {
  echo "Anda perlu login untuk mengakses halaman ini.";
  exit();
}

// Menjalankan query untuk mendapatkan data pengguna
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elsampah]'");
if ($query) {
  $hasil = mysqli_fetch_array($query);

  // Pastikan data yang diambil valid
  if ($hasil) {
    $username = $hasil['username']; // Ganti dengan nama kolom yang sesuai
    $domisili = $hasil['domisili']; // Ganti dengan nama kolom yang sesuai
    $email = $hasil['email']; // Ganti dengan nama kolom yang sesuai
    $nomor = $hasil['nomor']; // Ganti dengan nama kolom yang sesuai
  } else {
    echo "Data pengguna tidak ditemukan.";
    exit();
  }
} else {
  echo "Query gagal: " . mysqli_error($conn);
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Page with Dropdown</title>
  <link rel="stylesheet" href="profile.css" />
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

  <!-- Profile Section -->
  <div class="profile-section">
    <div class="profile-container">
      <div class="profile-content">
        <div class="profile-picture">
          <img src="profile.png" alt="Profile Picture" class="profile-pic" />
          <div class="camera-icon">
            <img src="camera-icon.png" alt="Camera" />
          </div>
        </div>

        <h1>Profile</h1>
        <form>
          <div class="input-group">
            <input
              type="text"
              id="username"
              placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" readonly />
          </div>
          <div class="input-group">
            <input type="text" id="text" placeholder="Domisili" value="<?php echo htmlspecialchars($domisili); ?>" readonly />
          </div>
          <div class="input-group">
            <input
              type="email"
              id="email"
              placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" readonly />
          </div>
          <div class="input-group">
            <input type="text" id="text" placeholder="Phone" value="<?php echo htmlspecialchars($nomor); ?>" readonly />
          </div>
        </form>
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