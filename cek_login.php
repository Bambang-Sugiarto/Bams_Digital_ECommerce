<?php
//panggil koneksi 
include "koneksi.php";
$pass = md5($_POST['password']);
$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $pass);
$level = mysqli_escape_string($conn, $_POST['level']);

//cek username <terdaftar>
$cek_user = mysqli_query($conn, "SELECT * FROM tuser WHERE email = 
'$email' and level = '$level'");
$user_valid = mysqli_fetch_array($cek_user);

//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek pass sesuai or tidak
    if ($password == $user_valid['password']) {
        //jika pass sesuai maka buat session
        session_start();

        $_SESSION['email'] = $user_valid['email'];
        $_SESSION['level'] = $user_valid['level'];
        //uji level user
        if ($level == "User") {
            header('location:User.php');
        } elseif ($level == "Administrator") {
            header('location:Admin.php');
        }
    } else {
        echo "<script>alert('Maaf password anda tidak sesuai');
        document.location='Sign-in.php'</script>";
    }
} else {
    echo "<script>alert('Maaf email anda tidak terdaftar');
    document.location='Sign-in.php'</script>";
}
