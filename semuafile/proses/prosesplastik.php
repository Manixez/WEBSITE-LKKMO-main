<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$botolbening = (isset($_POST['botolbening'])) ? htmlentities($_POST['botolbening']) : "";
$gelasplastik = (isset($_POST['gelasplastik'])) ? htmlentities($_POST['gelasplastik']) : "";
$botolwarna = (isset($_POST['botolwarna'])) ? htmlentities($_POST['botolwarna']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_plastik (botolbening,gelasplastik,botolwarna) values ('$botolbening','$gelasplastik','$botolwarna')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../hasilplastik.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
?>