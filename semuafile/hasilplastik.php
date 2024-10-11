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

// Mengambil ID paling terakhir dari tabel tb_kkaca
$query_last_record = mysqli_query($conn, "SELECT * FROM tb_plastik ORDER BY id DESC LIMIT 1");
$data_last_record = mysqli_fetch_assoc($query_last_record);

// Menyiapkan variabel untuk hasil penjualan
$botolbening = isset($data_last_record['botolbening']) ? $data_last_record['botolbening'] : 0;
$gelasplastik = isset($data_last_record['gelasplastik']) ? $data_last_record['gelasplastik'] : 0;
$botolwarna = isset($data_last_record['botolwarna']) ? $data_last_record['botolwarna'] : 0;
$id_terakhir = $data_last_record['id']; // Menyimpan ID terakhir

// Menghitung total berdasarkan jumlah dan harga per item
$total_botolbening = $botolbening * 2200;
$total_gelasplastik = $gelasplastik * 2200;
$total_botolwarna = $botolwarna * 2200;

// Total keseluruhan
$total_penjualan = $total_botolbening + $total_gelasplastik + $total_botolwarna;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shop Page</title>
  <link rel="stylesheet" href="shop-kertas.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* CSS untuk menempatkan tombol modal di tengah halaman */
    .center-modal {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      /* Menambahkan kolom untuk gambar dan tombol */
      height: 100vh;
      /* Mengisi tinggi viewport */
    }
    .d {
      display: none;
    }
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

  <div class="content center-modal">
    <!-- Gambar di atas tombol modal -->
    <img src="botol.png" alt="Deskripsi Gambar" class="img-fluid mb-3" /> <!-- Ganti your-image.png dengan nama file gambar Anda -->

    <!-- Button to trigger modal -->
    <div>
      <button type="button" class="btn btn-info btn-sn" data-bs-toggle="modal" data-bs-target="#view">
        <i class="bi bi-eye-fill"></i> Lihat Penjualan
      </button>
      <form action="proses/totalplastik.php" class="form-container" method="POST">
        <div class="d">
          <input type="number" class="form-control" id="floatingInput" placeholder="isi" name="totalplastik" value="<?= $total_penjualan ?>" required readonly>
        </div>
        <button type="submit" class="btn btn-secondary ms-2">Simpan Total</button>
      </form>
    </div>
  </div>

  <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hasil Penjualan Plastik</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate>
            <!-- Menampilkan ID terakhir -->
            <input type="hidden" value="<?php echo $id_terakhir; ?>" name="id_terakhir">

            <div class="mb-3">
              <div>
                <span>Botol Bening</span> <span class="float-end"><?php echo $botolbening ?> x 22000 = <?php echo $total_botolbening; ?></span>
              </div>
              <div>
                <span>Gelas Plastik</span> <span class="float-end"><?php echo $gelasplastik ?> x 22000 = <?php echo $total_gelasplastik; ?></span>
              </div>
              <div>
                <span>Botol Warna</span> <span class="float-end"><?php echo $botolwarna ?> x 22000 = <?php echo $total_botolwarna; ?></span>
              </div>
              <div>
                <span>_______________________________________________________________________________________________________________________________________________________________________+</span>
              </div>
              <div>
                <span class="font-weight-bold">Total</span> <span class="float-end font-weight-bold">= <?php echo $total_penjualan; ?></span>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Bootstrap dan Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>