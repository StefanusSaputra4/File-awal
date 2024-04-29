<?php
session_start();
require "function.php";

// Define the login function
function login($data) {
  
  $conn = mysqli_connect("localhost", "root", "", "test");
  //cek cookie
  if (isset($_COOKIE['id'])&& isset($_COOKIE['key'])){
      $id= $_COOKIE['id'];
      $key= $_COOKIE['key'];
  
      //mengambil username berdasarkan id
      $result= mysqli_query($conn,"SELECT username FROM user WHERE id =$id");
      $row = mysqli_fetch_assoc($result);
  
      //cek cookie dan username
      if($key === hash('sha256', $row['username'])){
          $_SESSION['login']= true;
      }
  } 
  
  if (isset($_SESSION["login"]) ){
      header("Location: todo_list.php");
      exit;
  }
  

  
}


if(isset($_POST["login"])){
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn,"SELECT * FROM login WHERE username = '$username'");

  //cek username
  if(mysqli_num_rows($result) === 1){

      //cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["Password"])){
          //cek session
          $_SESSION["login"] = true;

          //cek remember me
          if (isset($_POST["remember"])){
              //buat cookie
              setcookie('id', $row['id'], time()+60);
              setcookie('key',hash('sha256', $row['username']), time()+ 60);
          }
          header("Location: to_dolist.php");
          exit;
      }
  }
  $error = true;
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register-login</title>
    <link rel="stylesheet" href="style.css" />
    
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="logo-and-title">
        <img src="" />
        <h2 class="logo">Login Page</h2>
      </div>
      <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <button class="btnLogin-popup">Login</button>
      </nav>
    </header>

    <!-- Forms -->
    <div class="wrapper">
      <span class="icon-close">
        <ion-icon name="close"></ion-icon>
      </span>

      <!-- Login Form -->
<div class="form-box login">
    <h2>Login</h2>
    <form action="" method="post"> <!-- Mengarahkan form ke login.php -->
        <div class="input-box">
            <span class="icon">
                <ion-icon name="mail"></ion-icon>
            </span>
            <input type="text" required name="username" id="username"/>
            <label>Username</label>
        </div>
        <div class="input-box">
            <span class="icon">
                <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required name="password" id="password"/>
            <label>Password</label>
        </div>
        <div class="remember-forgot">
            <label> <input type="checkbox" name="remember" />Remember Me </label>
            <a href="#">Forgot Password</a>
        </div>
        <button type="submit" class="btn" name="login">Login</button>
        <div class="login-register">
            <p>
                Don't have an account?
                <a href="#" class="register-link">Register</a>
            </p>
        </div>
    </form>
</div>


   <!-- Registration Form -->
<div class="form-box register">
  <h2>Register</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <div class="input-box">
      <span class="icon">
        <ion-icon name="person"></ion-icon>
      </span>
      <input type="text" required name="username" id="username"/>
      <label>Username</label>
    </div>
    <div class="input-box">
      <span class="icon">
        <ion-icon name="lock-closed"></ion-icon>
      </span>
      <input type="password" required name="password" id="password"/>
      <label>Password</label>
    </div>
    <div class="input-box">
      <span class="icon">
        <ion-icon name="lock-closed"></ion-icon>
      </span>
      <input type="password" required name="password2" id="password2"/>
      <label>Konfirmasi Password</label>
    </div>
    <div class="remember-forgot">
      <label> <input type="checkbox" />I agree to the terms & conditions </label>
    </div>
    <button type="submit" name="register" class="btn">Register</button>

    <div class="login-register">
      <p>
        Already have an account?
        <a href="#" class="login-link">Login</a>
      </p>
    </div>
  </form>
</div>
    </form>
  </div>


    <!-- Footer -->
    <footer>
      <h3>Made By Stefanus Saputra - 225314022</h3>
    </footer>

    <!-- Scripts -->
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
