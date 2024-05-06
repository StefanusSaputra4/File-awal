<?php

// Connection
require 'functions.php';
if (!isset($_SESSION["login"])){
  header('location: logout.php');
  exit;
}

if (!isset($_GET["name"])){
  header('location: logout.php');
  exit;
}

$username = $_GET["name"];
if (isset($_POST["tambah"])){
  tambah($username, $_POST);
}
if(isset($_GET["selesai"])){
  $todo = $_GET["selesai"];
  $result = mysqli_query($conn, "UPDATE activity SET Status = 'yes' WHERE Username = '$username' AND `To Do` = '$todo'");
}
if (isset($_GET["hapus"])){
  $todo = $_GET["hapus"];
  $result = mysqli_query($conn,"DELETE FROM activity WHERE Username = '$username' AND `To Do` = '$todo'");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>To-do List</title>
  </head>
  <body>
    <link rel="stylesheet" href="style.css" />
    <!-- Navbar -->
  <section class="foto">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><i class="bi bi-cup-hot"></i> Pembelajaran Platform 2024</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <a class="nav-link active btn btn-primary" href="logout.php">Logout</a>
            <a class="nav-link active btn btn-secondary" href="beranda.php">Home</a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir navbar -->

    <!-- Container -->
    <div id="con">
      <div class="container container-md shadow-sm text-dark" id="container" style="padding-top: 110px;">
        <!-- Jumbotron -->
        <!-- <section class="jumbotron text-center"> -->
        <div class="form-wrapper"> <!-- Added form wrapper -->
        <form class="text-light" action="" method="post" class="form-inline">
          <div class="form-group mx-sm-3 mb-2">
            <input type="text" name="aktivitas" class="form-control" placeholder="Masukan Aktivitas Anda">
            <button class="btn btn-primary" type="submit" name="tambah">Tambah</button>
          </div>
        </form>
        <!-- </section> -->
        <!-- Akhir Jumbotron -->
      </div>
      </div>
    </div>
    <!-- End Container -->
    <!-- Container -->
    <div id="con">
      <div class="container container-md shadow-sm text-dark" id="container">
        <!-- Jumbotron -->
        <!-- <section class="jumbotron text-center"> -->
        <form action="" method="post" class="form-inline justify-content-center text-light">
          <table cellpadding="10" cellpadding="0" class="table table-bordered new-tabel">
            <?php
              $i = 0;
              $login_result = mysqli_query($conn, "SELECT * FROM activity WHERE Username = '$username'");
              while ($row = mysqli_fetch_assoc($login_result)){
                $i += 1;
                if ($i == 1){
            ?>
            <tr>
              <th>No.</th>
              <th>Aktivitas</th>
              <th>Tombol Selesai</th>
              <th>Tombol Hapus</th>
            </tr>ss
            <?php
                }
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <?php 
              $row2 = $row["To Do"];
              if($row["Status"] === "no"){
                echo "
                <td>$row2</td>
                <td><button class='btn btn-white' name='selesai $i' id='selesai $i'><a href='to-do.php?name=$username&selesai=$row2'>Selesai</a></button></td>";
              } elseif ($row["Status"] === "yes"){
                echo "
                <td><s>$row2</s></td>
                <td><button class='btn btn-white' name='selesai $i' id='selesai $i' disabled>Selesai</button></td>";
              } 
              echo"
              <td><button class='btn btn-white' name='hapus$i id='hapus$i'><a href='to-do.php?name=$username&hapus=$row2'>Hapus</a></button></td>"
              ?>
            </tr>
            <?php 
              }
            ?>
        </form>
        
        <!-- </section> -->
        <!-- Akhir Jumbotron -->
      </div>
    </div>
    <!-- End Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>