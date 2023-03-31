<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {						
  $mail->isSMTP();
  $mail->Host	 = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'sendermail111@gmail.com';
  $mail->Password = 'dmerozlelddqwxqf';
  $mail->SMTPSecure = 'tls';
//   $mail->SMTPSecure ='ssl';
  $mail->Port	 = 587;
  $mail->setFrom('sendermail111@gmail.com', 'Send Mail');
  $mail->addAddress('ridipgoswami147@gmail.com');
  $mail->isHTML(true);
  $mail->Subject = 'Test Mail Send By PHP';
  $mail->Body = '<b>Finally Send A Emai By phpmailer Composer ... ';
  $mail->send();
} catch (Exception $e) {
  echo "Error";
}
  session_start();
	include("config.php");
  if(isset($_SESSION['admin_email'])){
    header("location:registration.php");
    session_destroy();
  }
  $error="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admin_email=$_REQUEST['admin_email'];
    $admin_pass=$_REQUEST['admin_pass'];
    if($admin_email=="" or $admin_pass==""){
      $error="Fill Email And Password";
    }
    else{
      $sql="select * from admin";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      if($row['admin_email']!=$admin_email or $row['admin_pass']!=$admin_pass){
        $error="Cridentials Not Matched !";
      }
      else{
        
        header("location:registration.php");
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="./graphic/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./graphic/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <link href="./css/home.css" rel="stylesheet">
 </head>
 <body>
 	<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <h1 class="logo me-auto me-lg-0"><a href="index.html" >Kites</a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Admin Login</a></li>
          <li><a class="nav-link scrollto" href="/#about">Student Login</a></li>
          <li><a class="nav-link scrollto" href="/#services">Parents Login</a></li>
          <li><a class="nav-link scrollto" href="/#team">Teacher Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
	</nav>
    </div>
	<p></p>
	<div class="login_div">
		<div class="login_div1">
			<h1>Admin Login </h1>
			<form action="index.php" method="post" >
				<p class="logp">Enter Admin Email ID</p>
				<input type="text"  name="admin_email" placeholder="Admin Email" class="logint">
				<p class="logp">Enter Admin Password</p>
				<input type="password" name="admin_pass" placeholder="Admin Password" class="logint" ondblclick="loginputfun2()"><br><br>
				<button type="submit"><i class="fa fa-sign-in"></i>Login !</button>
			</form>
      <p class="logerror"><?php echo $error ?></p>
            <a href="registration.php">Create New Account !</a>
		</div>
	</div>
</header>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="./graphic/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./js/main.js"></script>
 </body>
 </html>
