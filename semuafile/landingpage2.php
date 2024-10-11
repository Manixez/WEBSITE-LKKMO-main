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
  <title>Recygiene</title>
  <link rel="stylesheet" href="landingpage2.css" />
  <style>
    /* CSS untuk dropdown */
    .dropdown-content {
      display: none;
      /* Default tidak ditampilkan */
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      /* Lebar minimum */
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      /* Bayangan */
      z-index: 1;
      /* Agar berada di atas elemen lain */
      right: 0;
      /* Mengatur dropdown muncul di sebelah kanan gambar */
      border-radius: 4px;
      /* Membuat sudut dropdown menjadi bulat */
      overflow: hidden;
      /* Menyembunyikan elemen yang meluap */
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      /* Menyusun item dropdown dalam satu kolom */
      transition: background-color 0.2s;
      /* Efek transisi saat hover */
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .show {
      display: block;
      /* Tampilkan dropdown ketika 'show' ditambahkan */
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

  <section class="landing-page">
    <div class="overlay"></div>
    <div class="content">
      <h1>RECYGIENE</h1>
      <div class="logo-mid">
        <img src="recyle (2).png" alt="Recycle Logo" />
      </div>
      <p>
        Recygiene - solusi terdepan dalam jual beli sampah daur ulang yang
        bertujuan untuk menciptakan lingkungan yang lebih bersih dan
        berkelanjutan.
      </p>
      <div class="buttons">
        <button><a href="caradaurulang.php">Cara Daur Ulang</a></button>
        <button><a href="howwork.php">Jual Sampah</a></button>
      </div>
    </div>
  </section>

  <section class="landing-page-in">
    <div class="container">
      <div class="image-slide">
        <img src="slide (1).png" alt="Slide Image" />

        <div class="slide-caption">
          <h3>Daur Ulang untuk Kehidupan Berkelanjutan</h3>
          <div class="caption-info">
            <div class="date">
              <img src="Vector (5).png" alt="Date Icon" class="icon">
              <span>Maret, 2023</span>
            </div>
            <div class="author">
              <img src="Group.png" alt="Author Icon" class="icon">
              <span>Sumarni Arianto</span>
            </div>
          </div>
        </div>
      </div>



      <div class="sidebar">
        <div class="sidebar-header">
          <div class="tab latest">
            <img src="Vector (3).png" alt="Latest Icon">
            <span>Latest</span>
          </div>
          <div class="divider"></div>
          <div class="tab podcast">
            <img src="Vector (4).png" alt="Podcast Icon">
            <span>Podcast</span>
          </div>
        </div>


        <div class="article-list">
          <div class="article-item">
            <img src="image 4.png" alt="">
            <p>Tahapan Proses Daur Ulang Plastik</p>
          </div>
          <div class="article-item">
            <img src="laut.png" alt="">
            <p>Mari Kelola Sampah dengan Bijak Mulai Hari Ini</p>
          </div>
          <div class="article-item">
            <img src="image 4 (1).png" alt="">
            <p>8 Cara Menjaga Kebersihan Lingkungan, Yuk Terapkan!</p>
          </div>
          <div class="article-item">
            <img src="image 4 (2).png" alt="">
            <p>Di Bank Sampah, Tiga Jenis Limbah Ini Ada Harganya</p>
          </div>
        </div>
      </div>
    </div>
  </section>

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
  <script>
    // Menyimpan semua gambar dalam array
    const slides = document.querySelectorAll('.image-slide img');
    let currentSlide = 0;

    // Menampilkan gambar pertama
    slides[currentSlide].classList.add('active');

    // Fungsi untuk mengubah slide
    function showSlide(index) {
      slides[currentSlide].classList.remove('active'); // Menghapus gambar aktif
      currentSlide = (index + slides.length) % slides.length; // Mengatur index dengan mod
      slides[currentSlide].classList.add('active'); // Menampilkan gambar baru
    }

    // Event listener untuk panah kiri
    document.querySelector('.arrow.left').addEventListener('click', function() {
      showSlide(currentSlide - 1); // Pindah ke slide sebelumnya
    });

    // Event listener untuk panah kanan
    document.querySelector('.arrow.right').addEventListener('click', function() {
      showSlide(currentSlide + 1); // Pindah ke slide berikutnya
    });
  </script>



  <script src="landingpage.js"></script>
</body>

</html>