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
  <title>Shop Page</title>
  <link rel="stylesheet" href="shop-plastik.css" />
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

    <nav>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    </div>

    <div class="profile">
      <img src="Group.png" alt="profile-logo" />
    </div>

  </header>

  <div class="content">
    <a href="jenissampah.php">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 12l14 0" />
        <path d="M5 12l6 6" />
        <path d="M5 12l6 -6" />
      </svg>
      Plastik
    </a>
    <form action="proses/prosesplastik.php" class="form-container" method="POST">
    <div class="grid-container">
      <div class="item">
        <img src="botol.png" alt="botol" />
        <p>Botol Bening</p>

        <div class="item-info">
          <p>Rp2.200/kg</p>

          <div class="quantity">
            <input type="number" class="form-control" id="floatingInput" placeholder="isi" name="botolbening" required>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="gelas plastik.png" alt="gelas-plastik" />
        <p>Gelas Plastik</p>

        <div class="item-info">
          <p>Rp2.200/kg</p>

          <div class="quantity">
            <input type="number" class="form-control" id="floatingInput" placeholder="isi" name="gelasplastik" required>
            </button>
          </div>
        </div>
      </div>

      <div class="item">
        <img src="botol warna.png" alt="botol-warna." />
        <p>Botol Warna</p>

        <div class="item-info">
          <p>Rp2.200/kg</p>

          <div class="quantity">
            <input type="number" class="form-control" id="floatingInput" placeholder="isi" name="botolwarna" required>
          </div>
        </div>
      </div>

      <div class="footer">
        <button type="sumbit"class="jual-button">Simpan</button>
      </div>
    </div>
  </form>
</body>


</html>