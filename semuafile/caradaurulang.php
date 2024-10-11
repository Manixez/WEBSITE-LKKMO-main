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
            margin-top: 80px;
            margin-bottom: 80px;
            /* Margin atas untuk memberi jarak dari atas */
        }

        .about-container {
            background-color: rgba(0, 0, 0, 0.75);
            /* Warna hitam dengan transparansi 75% */
            color: #fff;
            /* Warna putih untuk teks */
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            /* Lebar penuh */
            max-width: 1800px;
            /* Atur lebar maksimal */
            text-align: left;
            /* Mengatur teks rata kiri */
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
            <h1><b>Cara Daur Ulang Sampah (Reduce, Reuse, Recycle)</b></h1>
            <h3><b>Reduce (Mengurangi)</b></h3>
            <p>
                Reduce adalah mengurangi pemakaian barang-barang yang bisa menimbulkan sampah. Teknik daur ulang sampah
                ini adalah cara yang paling mudah dilakukan supaya jumlah sampah nggak semakin meningkat
            </p>
            <p>
                Contohnya, ketika belanja, kita bisa membawa tas belanja sendiri dari rumah sehingga kita tidak perlu tas plastik
                dari toko. Selain itu, kita juga bisa membawa botol minum sendiri dari rumah ketika bepergian
            </p>
            <h3><b>Reuse (Menggunakan Kembali)</b></h3>
            <p>
                Setelah reduce, kita juga harus melakukan reuse. Seperti namanya, reuse adalah menggunakan kembali
                barang-barang yang ada di sekeliling kita dengan semaksimal mungkin. Artinya, kalau barangnya masih
                layak pakai, jangan keburu dibuang ya, guys. Contohnya, saat kita belanja online, biasanya paket kita akan
                dibungkus dengan bubble wrap dan kardus, kan? Nah, bubble wrap dan kardus itu bisa kita simpan untuk
                digunakan kembali. Jadi, kalau belanja online, bubble wrap dan kardusnya jangan langsung dibuang, ya!
            </p>
            <p>
                Selain itu, kita juga bisa mengurangi penggunaan barang-barang yang mudah rusak atau barang yang
                hanya sekali pakai dan beralih ke barang-barang yang lebih reusable. Contohnya, untuk membersihkan
                wajah dari debu atau make up, biasanya kita akan menggunakan kapas sekali pakai, kan? Nah, saat ini
                sudah tersedia lho, kapas yang bisa digunakan berkali-kali atau biasa disebut sebagai reusable cotton
                pads. Kapas ini bisa dicuci dan digunakan berulang kali, sehingga tidak banyak menimbulkan sampah dan
                tentunya kita bisa jadi lebih hemat juga karena kita jadi nggak perlu beli kapas terus-menerus
            </p>

            <h3><b>Recycle (Mendaur Ulang)</b></h3>
            <p>
                Apa sih yang dimaksud dengan daur ulang? Daur ulang atau recycle adalah proses pengolahan limbah menjadi barang baru yang memiliki manfaat dan bisa digunakan kembali. Paham, kan? Nah, terus apa saja contoh daur ulang itu? Contohnya, kalau kita punya kain perca atau kain-kain bekas yang biasanya berupa potongan dari kain utuh, bisa dijahit dengan kain perca lainnya menjadi gorden. Contoh lainnya yaitu plastik bungkus bekas makanan atau deterjen bisa dikumpulkan dan dijahit menjadi taplak meja anti air
            </p>
            <p>
                Selain itu, kita juga bisa mengolah botol plastik bekas air mineral menjadi vas bunga atau wadah alat tulis. Bisa juga mengolah sedotan plastik dan kertas bekas menjadi hiasan berbentuk bunga.
            </p>
            <p>
                Itu dia penjelasan tentang 3R yaitu Reduce, Reuse, dan Recycle untuk mengurangi dan mendaur ulang sampah. Teknik 3R ini juga bermanfaat dalam menghemat penggunaan sumber daya alam, lho! Selain itu, bisa juga untuk mendapatkan penghasilan, karena hasil dari daur ulang bisa kita jual ke masyarakat. Nah, mulai sekarang, yuk lakukan teknik 3R ini!
            </p>
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