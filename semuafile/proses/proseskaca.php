<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$botolbir = (isset($_POST['botolbir'])) ? htmlentities($_POST['botolbir']) : "";
$botolsirup = (isset($_POST['botolsirup'])) ? htmlentities($_POST['botolsirup']) : "";
$botolkecap = (isset($_POST['botolkecap'])) ? htmlentities($_POST['botolkecap']) : "";
$botolminuman = (isset($_POST['botolminuman'])) ? htmlentities($_POST['botolminuman']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_kaca (botolbir,botolsirup,botolkecap,botolminuman) values ('$botolbir','$botolsirup','$botolkecap','$botolminuman')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../hasilkaca.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
