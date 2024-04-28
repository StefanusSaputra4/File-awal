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
        <form action="#">
          <div class="input-box">
            <span class="icon">
              <ion-icon name="mail"></ion-icon>
            </span>
            <input type="text" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required />
            <label>Password</label>
          </div>
          <div class="remember-forgot">
            <label> <input type="checkbox" />Remember Me </label>
            <a href="#">Forgot Password</a>
          </div>
          <button type="submit" class="btn">Login</button>
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
        <form action="#">
          <div class="input-box">
            <span class="icon">
              <ion-icon name="person"></ion-icon>
            </span>
            <input type="text" required />
            <label>New Username</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="mail"></ion-icon>
            </span>
            <input type="text" required />
            <label>New Email</label>
          </div>
          <div class="input-box">
            <span class="icon">
              <ion-icon name="lock-closed"></ion-icon>
            </span>
            <input type="password" required />
            <label>New Password</label>
          </div>
          <div class="remember-forgot">
            <label> <input type="checkbox" />I agree to the terms & conditions </label>
          </div>
          <button type="submit" class="btn">Register</button>
          <div class="login-register">
            <p>
              Already have an account?
              <a href="#" class="login-link">Login</a>
            </p>
          </div>
        </form>
      </div>
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
