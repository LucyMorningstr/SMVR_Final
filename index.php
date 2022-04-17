<?php

include 'config.php';
if (isset($_POST['signup'])) {
  $Full_Name = mysqli_real_escape_string($conn, $_POST["su_full_name"]);
  $Email     = mysqli_real_escape_string($conn, $_POST["su_email"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["su_password"]));
  $cpassword = mysqli_real_escape_string($conn, md5($_POST["su_cpassword"]));
  
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'")); 

  if ($password !== $cpassword) {
    echo "<script> alert ('Passwords do not match');</script>";
    }
    elseif($check_email > 0) {
      echo "<script> alert ('Email already registered');</script>";
    } 
    else {
      $sql = " INSERT INTO users(full_name, email, password) VALUES('$Full_Name, $email, $password, $cpassword')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script> alert ('User details successfully registered');</script>";
      } else {
        echo "<script> alert ('User Registeration error');</script>";
      }
    }

  }




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>SMR || Sign in</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms(experimental)</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Full Name" name="su_full_name"  value="<?php echo $_POST["su_full_name"]; ?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="su_email" value="<?php echo $_POST["su_email"]; ?>"  required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="su_password" value="<?php echo $_POST["password"]; ?>"  required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="su_cpassword" value="<?php echo $_POST["cpassword"]; ?>"  required />
            </div>
            <input type="submit" class="btn" name="signup" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms(experimental)</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New to Save My Results?</h3>
            <p>
              Save My Results is an easy to use website to store results of various outcomes, from college tests, university tests, to your recent performance score and more.
              <p>Sign up now to get started !</p>
              
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Have the credentials already?</h3>
            <p>
              Right on! Let's get you signed in and ready to load your freshest set of results!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
