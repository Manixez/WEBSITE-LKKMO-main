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
  <title>Jenis Sampah</title>
  <link rel="stylesheet" href="jenis sampah.css" />
  <style>
  </style>
</head>

<body>
  <header>
    <div class="left-header">
      <div class="logo">
        <a href="landingpage2.php">
          <img src="Vector.png" alt="Home Logo" />
        </a>
      </div>
    </div>

    <div class="center-header">
      <div class="recycle-logo">
        <img src="recyle (2).png" alt="Recycle Logo" />
      </div>
    </div>

    <div class="profile">
      <img src="Group.png" alt="Profile Logo" />
    </div>
  </header>

  <div class="content">
    <h2>Jenis Sampah</h2>
    <p>====== Harap isi Semua Jenis Sampah !!! Harap isi 0 Jika tidak memiliki Barang !!! ======</p>
    <a href="shop-kertas.php">
      <div class="grid-container">
        <div class="item">
          <img src="kardus.png" alt="kardus" />
          <p>Kertas</p>
        </div>
    </a>

    <a href="shop-plastik.php">
      <div class="item">
        <img src="botol bekas.png" alt="botol bekas" />
        <p>Plastik</p>
      </div>
    </a>

    <a href="shop-aluminium.php">
      <div class="item">
        <img src="kaleng susu.png" alt="kaleng susu" />
        <p>Aluminium</p>
      </div>
    </a>

    <a href="shop-kaca.php">
      <div class="item">
        <img src="Kaca (1).png" alt="kaca" />
        <p>Kaca</p>
      </div>
  </div>
  </div>
  </a>

  <div class="footer">
    <a href="order-page.php">
      <button class="jual-button">Jual</button>
    </a>
  </div>

  <script src="jenis-sampah.js"></script>
</body>

</html>