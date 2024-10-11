<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$kardus = (isset($_POST['kardus'])) ? htmlentities($_POST['kardus']) : "";
$koran = (isset($_POST['koran'])) ? htmlentities($_POST['koran']) : "";
$kertashvs = (isset($_POST['kertashvs'])) ? htmlentities($_POST['kertashvs']) : "";
$wadahtelur = (isset($_POST['wadahtelur'])) ? htmlentities($_POST['wadahtelur']) : "";
$bukubekas = (isset($_POST['bukubekas'])) ? htmlentities($_POST['bukubekas']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_kertas (kardus,koran,kertashvs,wadahtelur,bukubekas) values ('$kardus','$koran','$kertashvs','$wadahtelur','$bukubekas')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../hasilkertas.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
