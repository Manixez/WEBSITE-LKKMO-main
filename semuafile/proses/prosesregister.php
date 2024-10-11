<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$domisili = (isset($_POST['domisili'])) ? htmlentities($_POST['domisili']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$nomor = (isset($_POST['nomor'])) ? htmlentities($_POST['nomor']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";

$select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
if (mysqli_num_rows($select) > 0) {
    $message = '<script>alert("Username telah ada")</script>';
} else {
    $query = mysqli_query($conn, "INSERT INTO tb_user (username,domisili,email,nomor,password,level) values ('$username','$domisili','$email','$nomor','$password','$level')");
    if (!$query) {
        $message = '<script>alert("data gagal dimasukkan")</script>';
    } else {
        $message = '<script>alert("data berhasil dimasukkan");
                window.location="../create.php"</script>';
    }
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
?>