<?php

    include ("../../configdb/config.php");

    $id_product = $_GET['id_product'];

    $query = "SELECT * FROM product WHERE id_product = '$id_product'";
    $result = mysqli_query($koneksi, $query);

    if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }

    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='dashboard.php';</script>";
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <!-- <img src="../assets/img/logo-small.png"> -->
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Saloka 
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="dashboard.php">
              <p>Daftar Produk</p>
            </a>
          </li>
          <li>
            <a href="tambah.php">
              <p>Tambah Produk</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Selamat datang</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="../../index.html">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-10">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Update Produk</h5>
              </div>
              <div class="card-body">

                <form action="proses_edit.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <label for="nama_product">Nama Produk</label>
                      <input name="id_product" value="<?php echo $data['id_product']; ?>"  hidden />
                      <input type="text" class="form-control" name="nama_product" value="<?php echo $data['nama_product']; ?>">
                    </div>
                    <div class="col-md-5 pr-1">
                      <label>Kode Produk</label>
                      <input type="text" class="form-control" name="kode_product" value="<?php echo $data['kode_product']; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 mt-3 pr-1">
                      <label>Harga Produk</label>
                      <input type="text" class="form-control" name="harga_product" value="<?php echo $data['harga_product']; ?>">
                    </div>
                    <div class="col-md-5 pr-1 mt-3">
                      <label>Stok Produk</label>
                      <input type="text" class="form-control" name="stok_product" value="<?php echo $data['stok_product']; ?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 pr-1 mt-3">
                      <label>Deskripsi Produk</label>
                      <textarea class="form-control" name="description" rows="3"><?php echo $data['description']; ?></textarea>
                    </div>
                    <div class="col-md-5 pr-1 mt-3">
                      <label>Gambar Produk</label>
                      <img name="image" src="gambar/<?php echo $data['image']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                       <input type="file" name="gambar_produk" />
                       <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-5 pr-1 mt-3">
                      <label>Tanggal Upload Produk</label>
                      <input type="date" class="form-control" name="created_date" value="<?php echo $data['created_date']; ?>">
                    </div> 
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto mt-3">
                      <button type="submit" class="btn btn-primary btn-round" name="edit"> Edit Produk</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
