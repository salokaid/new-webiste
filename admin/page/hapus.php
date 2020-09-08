<?php

    include ("../../configdb/config.php");

    $id_product = $_GET['id_product'];

    $query = "DELETE FROM product WHERE id_product='$id_product' ";
    $hasil_query = mysqli_query($koneksi, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='dashboard.php';</script>";
    }

?>