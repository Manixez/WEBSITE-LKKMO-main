<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$totalkaca = (isset($_POST['totalkaca'])) ? htmlentities($_POST['totalkaca']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_totalkaca (totalkaca) values ('$totalkaca')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../jenissampah.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
