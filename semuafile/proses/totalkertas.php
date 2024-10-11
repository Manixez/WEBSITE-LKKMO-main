<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$totalkertas = (isset($_POST['totalkertas'])) ? htmlentities($_POST['totalkertas']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_totalkertas (totalkertas) values ('$totalkertas')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../jenissampah.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
