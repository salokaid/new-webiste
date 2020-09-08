<?php
    // mengaktifkan session php
    session_start();
    include ("../../configdb/config.php");

    if (isset($_POST['edit'])) {
        $id_product = $_POST['id_product'];
        $nama_product = $_POST['nama_product'];
        $kode_product = $_POST['kode_product'];
        $harga_product = $_POST['harga_product'];
        $stok_product  = $_POST['stok_product'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $created_date = $_POST['created_date'];


        //cek dulu jika ada gambar produk jalankan coding ini
        if($image != "") {
          $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
          $x = explode('.', $image); //memisahkan nama file dengan ekstensi yang diupload
          $ekstensi = strtolower(end($x));
          $file_tmp = $_FILES['image']['tmp_name'];   
          $angka_acak     = rand(1,999);
          $nama_gambar_baru = $angka_acak.'-'.$image; //menggabungkan angka acak dengan nama file sebenarnya
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query  = "UPDATE product SET nama_product = '$nama_product', kode_product = '$kode_product', harga_product = '$harga_product', stok_product = '$stok_product', description = '$description', image = '$nama_gambar_baru', created_date = '$created_date' WHERE id_product = '$id_product'";
                    
                    $result = mysqli_query($koneksi, $query);
                    
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil diubah.');window.location='dashboard.php';</script>";
                    }

            } else {     
                //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah.php';</script>";
            }
        } else {
            $query  = "UPDATE product SET nama_product = '$nama_product', kode_product = '$kode_product', harga_product = '$harga_product', stok_product = '$stok_product', description = '$description', image = '$nama_gambar_baru', created_date = '$created_date' WHERE id_product = '$id_product'";

            $result = mysqli_query($koneksi, $query);
            // periska query apakah ada error
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil diubah.');window.location='dashboard.php';</script>";
            }
        }
    }
        
?>