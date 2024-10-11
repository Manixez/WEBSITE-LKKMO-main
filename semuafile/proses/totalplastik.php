<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$totalplastik = (isset($_POST['totalplastik'])) ? htmlentities($_POST['totalplastik']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_totalplastik (totalplastik) values ('$totalplastik')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../jenissampah.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
