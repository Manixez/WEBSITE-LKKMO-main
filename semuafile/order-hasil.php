<?php
session_start();
include "proses/connect.php";

// Check if session is set
if (!isset($_SESSION['username_elsampah'])) {
  echo "Anda perlu login untuk mengakses halaman ini.";
  exit();
}

// Mengambil data user dari tabel
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$_SESSION[username_elsampah]'");
$hasil = mysqli_fetch_array($query);

// Mengambil ID paling terakhir dari tabel tb_totalpenjualan
$query_last_record_totalpenjualan = mysqli_query($conn, "SELECT * FROM tb_totalpenjualan ORDER BY id DESC LIMIT 1");
$data_last_record_totalpenjualan = mysqli_fetch_assoc($query_last_record_totalpenjualan);

// Variabel untuk menampilkan profil
$username = $hasil['username'];
$domisili = $hasil['domisili'];
$email = $hasil['email'];
$nomor = $hasil['nomor'];
$total_penjualan = isset($data_last_record_totalpenjualan['total_penjualan']) ? $data_last_record_totalpenjualan['total_penjualan'] : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your Order</title>
  <link rel="stylesheet" href="order-page.css" />

</head>

<body>
  <header>
    <div class="left-header">
      <a href="landingpage2.php">
        <div class="logo">
          <img src="Vector.png" alt="Home Logo" />
        </div>
      </a>
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
          <div class="progress-step-container">
            <div class="progress-step"></div>
          </div>
          <p>Status</p>
        </div>
        <div class="line"></div>
        <div class="progress-step-status">
          <div class="progress-step-container active">
            <div class="progress-step active"></div>
          </div>
          <p>Checkout</p>
        </div>
      </div>
    </div>

    <div class="order-details">
      <h3>Profile Seller</h3>
      <form>
        <div class="order-details">
          <h3>Hasil Penjualan</h3>
          <div class="profile-info">
            <div class="info-item">
              <strong>Username:</strong>
              <span><?php echo htmlspecialchars($username); ?></span>
            </div>
            <div class="info-item">
              <strong>Domisili:</strong>
              <span><?php echo htmlspecialchars($domisili); ?></span>
            </div>
            <div class="info-item">
              <strong>Email:</strong>
              <span><?php echo htmlspecialchars($email); ?></span>
            </div>
            <div class="info-item">
              <strong>Phone:</strong>
              <span><?php echo htmlspecialchars($nomor); ?></span>
            </div>
            <div class="info-item">
              <strong>Hasil Penjualan:</strong>
              <span>Rp. <?php echo $total_penjualan ?>,00</span>
            </div>
          </div>
        </div>

        <style>
          .profile-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
            margin-bottom: 25px;
          }

          .info-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ddd;
          }

          .info-item strong {
            font-weight: bold;
            color: #333;
          }

          .info-item span {
            color: #555;
          }
        </style>

      </form>
    </div>

    <div class="total">
      <h3>Langkah Mu Mengubah Dunia</h3>
      <p>Terima Kasih</p>
    </div>

  </div>
  <form action="proses/informasi.php" class="form-container" method="POST">
    <input type="hidden" class="form-control" id="floatingInput" value="<?php echo $hasil['username']; ?>" name="nama" readonly required>
    <input type="hidden" class="form-control" id="floatingInput" value="<?php echo $hasil['email']; ?>" name="gmail" readonly required>
    <input type="hidden" class="form-control" id="floatingInput" value="<?php echo $hasil['nomor']; ?>" name="telepon" readonly required>
    <input type="hidden" name="total" value="<?php echo $total_penjualan; ?>">
    <div class="btn-container">
      <!-- Ubah type="button" menjadi type="submit" -->
      <button type="submit" class="sell-btn">Simpan dan kirimkan</button>
    </div>
  </form>

  </main>
</body>

</html>