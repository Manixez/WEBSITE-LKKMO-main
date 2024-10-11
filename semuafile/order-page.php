<?php
session_start();
include "proses/connect.php";

// Check if session is set
if (!isset($_SESSION['username_elsampah'])) {
  echo "Anda perlu login untuk mengakses halaman ini.";
  exit();
}

// Mengambil data user
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elsampah]'");
$hasil = mysqli_fetch_array($query);

// Mengambil ID paling terakhir dari tabel tb_totalalluminium
$query_last_record_alluminium = mysqli_query($conn, "SELECT * FROM tb_totalalluminium ORDER BY id DESC LIMIT 1");
$data_last_record_alluminium = mysqli_fetch_assoc($query_last_record_alluminium);

// Mengambil ID paling terakhir dari tabel tb_totalkertas
$query_last_record_kertas = mysqli_query($conn, "SELECT * FROM tb_totalkertas ORDER BY id DESC LIMIT 1");
$data_last_record_kertas = mysqli_fetch_assoc($query_last_record_kertas);

// Mengambil ID paling terakhir dari tabel tb_totalplastik
$query_last_record_plastik = mysqli_query($conn, "SELECT * FROM tb_totalplastik ORDER BY id DESC LIMIT 1");
$data_last_record_plastik = mysqli_fetch_assoc($query_last_record_plastik);

// Mengambil ID paling terakhir dari tabel tb_totalkaca
$query_last_record_kaca = mysqli_query($conn, "SELECT * FROM tb_totalkaca ORDER BY id DESC LIMIT 1");
$data_last_record_kaca = mysqli_fetch_assoc($query_last_record_kaca);

// Menyiapkan variabel untuk hasil penjualan
$totalalluminium = isset($data_last_record_alluminium['totalalluminium']) ? $data_last_record_alluminium['totalalluminium'] : 0;
$totalkertas = isset($data_last_record_kertas['totalkertas']) ? $data_last_record_kertas['totalkertas'] : 0;
$totalplastik = isset($data_last_record_plastik['totalplastik']) ? $data_last_record_plastik['totalplastik'] : 0;
$totalkaca = isset($data_last_record_kaca['totalkaca']) ? $data_last_record_kaca['totalkaca'] : 0;

// Menghitung total penjualan
$total_penjualan = $totalalluminium + $totalkertas + $totalplastik + $totalkaca;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Order</title>
  <link rel="stylesheet" href="order-page.css" />
  <style>
    .d {
      display: none;
    }
  </style>
</head>

<body>
  <header>
    <div class="left-header">
      <div class="logo">
        <img src="Vector.png" alt="Home Logo" />
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

  <div class="container">
    <div class="order-header">
      <h2>Your Order</h2>
      <span class="brand">RECYGIENE</span>
    </div>

    <div class="progress-bar">
      <div class="progress">
        <div class="progress-step-status">
          <div class="progress-step-container active">
            <div class="progress-step active"></div>
          </div>
          <p>Checkout</p>
        </div>
        <div class="line"></div>
        <div class="progress-step-status">
          <div class="progress-step-container">
            <div class="progress-step"></div>
          </div>
          <p>Status</p>
        </div>
      </div>
    </div>

    <div class="order-details">
      <div class="item">
        <img src="botol.png" alt="Botol Bir" />
        <div class="item-info">
          <h3>Total Plastik</h3>
          <p>Rp.<?php echo $totalplastik ?>,00</p>
        </div>
      </div>
      <div class="item">
        <img src="kardus.png" alt="Koran" />
        <div class="item-info">
          <h3>Total Kertas</h3>
          <p>Rp.<?php echo $totalkertas ?>,00</p>
        </div>
      </div>
      <div class="item">
        <img src="kaca (1).png" alt="Kaca" />
        <div class="item-info">
          <h3>Total Kaca</h3>
          <p>Rp.<?php echo $totalkaca ?>,00</p>
        </div>
      </div>
      <div class="item">
        <img src="kaleng susu.png" alt="Kaleng" />
        <div class="item-info">
          <h3>Total Alluminium</h3>
          <p> Rp.<?php echo $totalalluminium ?>,00</p>
        </div>
      </div>
    </div>
    <div class="total">
      <p>Subtotal: <span>Rp. <?php echo $total_penjualan ?>,00</span></p>
      <h3>TOTAL: <span>Rp. <?php echo $total_penjualan ?>,00</span></h3>
    </div>
  </div>

  <form action="proses/totalpenjualan.php" class="form-container" method="POST">
    <!-- Input hidden untuk menyimpan total_penjualan -->
    <input type="hidden" name="total_penjualan" value="<?php echo $total_penjualan; ?>">

    <div class="btn-container">
      <!-- Tombol submit -->
      <button type="submit" class="sell-btn">Jual</button>
    </div>
  </form>

</body>

</html>