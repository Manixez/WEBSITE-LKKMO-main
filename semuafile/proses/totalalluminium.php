<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$totalalluminium = (isset($_POST['totalalluminium'])) ? htmlentities($_POST['totalalluminium']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_totalalluminium (totalalluminium) values ('$totalalluminium')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../jenissampah.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
