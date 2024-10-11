<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$gmail = (isset($_POST['gmail'])) ? htmlentities($_POST['gmail']) : "";
$telepon = (isset($_POST['telepon'])) ? htmlentities($_POST['telepon']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_informasi (nama,gmail,telepon,total) values ('$nama','$gmail','$telepon','$total')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../landingpage2.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
