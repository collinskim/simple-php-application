<?php
require ('includes/connection.php');
?>
<?php
if (isset($_POST['btn_registeradmin'])){
  $uname=mysqli_real_escape_string($conn, $_POST['username']);
  $pword=mysqli_real_escape_string($conn, $_POST['password']);
  $uname= ucfirst(mysqli_real_escape_string($conn,$_POST['username']));
  $pword = md5($_POST['password']);
  $query="INSERT INTO tbl_due_listing(username,password)VALUES('{$uname}','{$pword}')";
  $result=mysqli_query($conn,$query);
  header("Location:admin_register.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN REGISTER</title>
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
        <form action="admin_register.php" method="POST" name="admin_form" onsubmit="return validate()" class="form">
          <h2>REGISTER</h2>
          <input type="text" class="form-control" placeholder="Username" name="username">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <input type="submit" class="form-control btn btn-success sub" value="submit" name="btn_registeradmin">
        </form>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
<!-- script -->
<script>
    function validate(){
    var username=document.admin_form.username.value;
    var password=document.admin_form.password.value;
    if (username== "") {
      alert('Please Enter Your User Name');
      return false;
    }
    if (password== "") {
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