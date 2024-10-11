<?php
    session_start();
    include "connect.php";
    $username = (isset ($_POST['username'])) ? htmlentities($_POST['username']) : "" ;
    $password = (isset ($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "" ;
    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if($hasil){
        $_SESSION['username_elsampah'] = $username;
        $_SESSION['level_elsampah'] = $hasil['level'];
        header('location:../landingpage2.php');
    }else{ ?>
        <script>
            alert("Username atau password yang anda masukkan SALAH !!!");
            window.location="../login.php"
        </script>
<?php   
    }
?>