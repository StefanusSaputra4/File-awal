<?php
// Connection
require 'functions.php';
if (isset($_POST["register"])) {
  if (empty($username) || empty($password)) {
      echo "<script>alert('Jangan Kosongkan username!')</script>";
    } else {
        if (registrasi($_POST) > 0) {
            echo "<script>alert('User baru telah ditambahkan')</script>";
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Registration Page</title>
</head>
<body>
<link rel="stylesheet" href="style.css"/>
<!-- Navbar -->
<section class="foto">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="bi bi-cup-hot"></i>Tugas PHP Platform 2024</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link active btn btn-primary" href="index.php">Home</a>
                    <a class="nav-link active btn btn-secondary" href="login.php">Login</a>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir navbar -->
    <!-- Container -->
    <div id="con">
        <div class="container container-md shadow-sm text-dark" id="container" style="padding-top: 110px;">
            <div class="form-wrapper"> <!-- Added form wrapper -->

                <form class="text-light" action="" method="post">
                    <div class="form-group">
                        <label for="Username" class="form-label text-white">User<span class="text"
                                                                                          style="color: #b79265;">name</span></label>
                        <input type="text" class="form-control" name="username" id="username"
                               placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text" style="color: #b79265;">Pass<span
                                    class="form-label text-white">word</span></label>
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label text-white">Konfirmasi <span class="text"
                                                                                                 style="color: #b79265;">Password</span></label>
                        <input type="password" class="form-control" name="password2" id="password2"
                               placeholder="Enter Password">
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
</body>
</html>
