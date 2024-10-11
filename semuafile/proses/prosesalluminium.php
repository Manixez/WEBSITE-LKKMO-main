<?php
include "connect.php";

// Inisialisasi variabel $message
$message = "";

$kalengsusu = (isset($_POST['kalengsusu'])) ? htmlentities($_POST['kalengsusu']) : "";
$kalengminuman = (isset($_POST['kalengminuman'])) ? htmlentities($_POST['kalengminuman']) : "";

$query = mysqli_query($conn, "INSERT INTO tb_alluminium (kalengsusu,kalengminuman) values ('$kalengsusu','$kalengminuman')");
if (!$query) {
    $message = '<script>alert("data gagal dimasukkan")</script>';
} else {
    $message = '<script>alert("data berhasil dimasukkan");
                window.location="../hasilalluminium.php"</script>
                </script>';
}
// Pastikan variabel $message selalu terdefinisi sebelum dicetak
echo $message;
?>