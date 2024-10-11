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
        }

        .about-container {
            background-color: rgba(0, 0, 0, 0.75);
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 1800px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #fff;
        }

        h3 {
            margin-bottom: 10px;
            font-size: 1.8rem;
            color: #fff;
        }

        img {
            width: 87%;
            height: auto;
            border-radius: 10px;
            margin: 20px auto;
            /* margin atas/bawah 20px, margin kiri/kanan auto untuk pusat */
            display: block;
            /* agar gambar dianggap sebagai blok dan bisa dipusatkan */
        }


        .word-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 40px;
            font-size: 2rem;
            font-weight: bold;
        }

        .word {
            flex: 1;
            text-align: center;
        }

        .submit-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 40px;
        }

        .submit-button:hover {
            background-color: darkgreen;
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
            <h3><b>HOW OUR WEBSITE WORK</b></h3>
            <img src="carakerja.png" alt="Image Describing Recycling" />

            <!-- Tiga kata di kiri, tengah, kanan -->
            <div class="word-container">
                <div class="word">Separate your trash</div>
                <div class="word">Inform Us</div>
                <div class="word">Get Your Cas</div>
            </div>
            
            <a href="jenissampah.php">
            <button class="submit-button">Masuk</button>
            </a>
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