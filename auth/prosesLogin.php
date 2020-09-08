<?php

    // mengaktifkan session php
    session_start();

    include ("../configdb/config.php");

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // menyeleksi data dengan username dan password yang sesuai
        $data = mysqli_query($koneksi,"SELECT * FROM account WHERE username='".$username."' and password='".md5($password)."' ");

        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);

        if($cek > 0){
            $datas = mysqli_fetch_assoc($data);

                // buat session login dan username
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";

                // alihkan ke halaman dashboard index
                header("location:../admin/page/dashboard.php");

        }else{
            header("location:login.php?r=err");
        }
    }

?>