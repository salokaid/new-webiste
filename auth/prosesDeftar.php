<?php

    // mengaktifkan session php
    session_start();

    include ("../configdb/config.php");

    if (isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cek = mysqli_query($koneksi, "SELECT username FROM account WHERE username = '$username'");
        if (mysqli_fetch_assoc($cek)) {
            header("location:register.php?r=err");

            return false;
        }

        $query = "INSERT INTO account (nama, username, password) VALUES ('$nama', '$username', md5('$password'))";
        $data = mysqli_query($koneksi, $query);

        if ($data) {
            echo "<script LANGUAGE='JavaScript'>
            window.alert('Data register Berhasil Ditambahkan')
            window.location.href='login.php';
            </script>";
        }
        
    }

?>