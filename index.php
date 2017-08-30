<?php

require ("includes/connection.php");

session_start();

if (isset($_POST['btn_login'])) {
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $password = md5($password);
  $query = "SELECT * FROM tbl_due_listing WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn,$query);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['message'] = "You are now logged in";
    $_SESSION['username'] = $username;
    header("Location:home.php");
   } 
   else{
    $_SESSION['message'] = "username/password combination incorrect";
   }
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container-fliud" id="nav">
  <div class="container">
    <div class="row holder">
      <div class="col-md-3"></div>
      <div class="col-md-6 holder1">
        <form action="index.php" method="POST" name="login_form" onsubmit="return validate()" class="form">
          <h2>LOGIN</h2>
          <input type="text" class="form-control" placeholder="Username" name="username">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <input type="submit" class="form-control btn btn-success sub" value="submit" name="btn_login">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
<!-- script -->
<script>
    function validate(){
    var Uname=document.login_form.username.value;
    var Pword=document.login_form.password.value;
    if (Uname== "") {
      alert('Please Enter Your User Name');
      return false;
    }
    if (Pword== "") {
      alert('Please Enter your password');
    }
          return true;
     
         

  }
</script>
<script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- script -->

</body>
</html>