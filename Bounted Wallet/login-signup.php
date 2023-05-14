<?php
include 'config.php';
include 'Idgeneration.php';

error_reporting(0);

session_start();


if (isset($_POST['signup-btn'])) {
  $firstname =$_POST['firstname'];
  $lastname =$_POST['lastname'];
  $phone =$_POST['phone'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword =md5($_POST['cpassword']);
  $balance = $_POST['balance'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM profile WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
      $userid1 =random_num1(4);
      $userid2 =random_num2(4);
      $userid3 =random_num3(4);
      $userid4 =random_num4(4);
			$sql = "INSERT INTO profile (userid1, userid2, userid3, userid4, firstname, lastname, phone, username, email, password, balance)
					VALUES ('$userid1', '$userid2', '$userid3', '$userid4', '$firstname', '$lastname', '$phone','$username', '$email', '$password', '$balance')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
        $_GET['balance'] ="";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
  if (isset($_POST['login-btn'])) {
    $email2 = $_POST['email2'];
    $password2 = md5($_POST['password2']);
  
    $sql2 = "SELECT * FROM profile WHERE email='$email2' AND password='$password2'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0) {
      $row = mysqli_fetch_assoc($result2);
      $_SESSION['username'] = $row['username'];
      $_SESSION['userid1'] = $row['userid1'];
      $_SESSION['userid2'] = $row['userid2'];
      $_SESSION['userid3'] = $row['userid3'];
      $_SESSION['userid4'] = $row['userid4'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['balance'] = $row['balance'];
      
      header("Location: dashboard.php");
    } else {
      echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <script src="https://kit.fontawesome.com/099a75ced2.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="Assets/Style/Style.css">

</head>

<body>
  <section class="login-signup">
  <div class="container">
    <!--FORMS (SIGN UP AND SIGN IN)-->
    <div class="forms-container">
      <div class="signin-signup">
        <!--SIGN IN FORM-->
        <form action="" class="sign-in-form forms" method="POST">
          <h2 class="title2">Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" name="email2" required>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password2" required>
          </div>
          <input type="submit" value="Login" class="btnn solid" name="login-btn">
          <p class="social-text"></p>
        </form>
        <!--SIGN UP FORM-->
        <form  class="sign-up-form forms" method="POST">
          <h2 class="title2">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Firstname" required name="firstname">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Lastname" required name="lastname">
          </div>
          <div class="input-field">
            <i class="fas fa-phone-alt"></i>
    <input type="tel" id="phone" placeholder="Phone Number" name="phone"  required name="phone"> 
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" placeholder="Email" required name="email">
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" required name="username">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" required name="password">
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Confirm Password" required name="cpassword">
          </div>
          <input type="submit" value="Signup" class="btnn solid" name="signup-btn">
          <p class="social-text"></p>
        </form>
      </div>
    </div>
<!-- PANELS-->
    <div class="panels-container">
      <!-- left panel-->
      <div class="panel left-panel">
        <div class="content">
          <h3>New Here?</h3>
          <p>Sign up now for free and start Sending cash and shopping with one easy account.</p>
          <button class="btnn transparent" id="sign-up-btn">Sign up</button>
          <button class="btnn transparent"><a href="index.html">Home</a></button>
        </div>
        <img src="Assets/img/undraw_wallet_aym5.svg" class="image" alt="">
      </div>
<!--Right panel-->
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us?</h3>
          <p >Login now and start sending and reciving cash with one easy account.</p>
          <button class="btnn transparent" id="sign-in-btn">Login</button>
          <button class="btnn transparent"><a href="index.html">Home</a></button>
        </div>
        <img src="Assets/img/undraw_make_it_rain_iwk4.svg" class="image" alt="">
      </div>
    </div>
  </div>
<script src="Assets/Js/login.js"></script>
</section>
</body>

</html>



