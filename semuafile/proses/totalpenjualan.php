<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$total_penjualan = (isset($_POST['total_penjualan'])) ? htmlentities($_POST['total_penjualan']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_totalpenjualan (total_penjualan) values ('$total_penjualan')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../order-hasil.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
