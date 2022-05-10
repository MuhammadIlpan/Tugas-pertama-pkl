<?php

// aktifkan section

session_start();

//panggil koneksi data base

include "koneksi.php";


@$pass = md5($_POST['password']);
@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);


$login = mysqli_query($koneksi, "SELECT * FROM tuser  where username  ='$username'
 and status = 'AKTIF' ");

$data = mysqli_fetch_array($login);

//uji jika username password sesuai

if($data){ 
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['passsword'] = $data['password'];
    $_SESSION['nama_pengguna'] = $data['nama_pengguna'];

    //arahkan ke arah admin
    echo "succes";
    header('location:admin.php');
    
}else{
    echo "<script>
    alert('Maaf, Login Gagal, Pastikan Username dan Password anda Benar...
    !');
    document.location='index.php';
    </script>";
   echo "gagal";
    
}

?>