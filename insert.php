<?php
include ('includes/connection.php');
?>
<?php
if (isset($_POST['insert_btn'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $uname=$_POST['uname'];
  $pword=$_POST['password'];
  $tel_no=$_POST['tel_no'];
  $idn=$_POST['idn'];
  $fname= ucfirst(mysqli_real_escape_string($conn,$_POST['fname']));
  $lname= ucfirst(mysqli_real_escape_string($conn,$_POST['lname']));
  $uname= ucfirst(mysqli_real_escape_string($conn,$_POST['uname']));
  $password = md5($_POST['password']);
  $query="INSERT INTO tbl_user (firstname,lastname,username,password,phonenumber,idnumber,)VALUES('{$fname}','{$lname}','{$uname}','{$pword}','{$tel_no}','{$idn}')";
  $result=mysqli_query($conn,$query);
  header("Location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>INSERT USERS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container-fluid">

  <div class="container">
    <div class="row holder2">
      <div class="col-md-2"></div>
      <div class="col-md-8 col-xs-12 holder4">
        <form action="insert.php" method="POST" name="insert_form" onsubmit="return validate()" class="form">
          <h2>INSERT USER</h2>          
          <input type="text" class="form-control" name="fname" placeholder="First Name"><br>
          <input type="text" class="form-control" name="lname" placeholder="Last Name"><br>
          <input type="text" class="form-control" name="uname" placeholder="User Name"><br>
          <input type="password" class="form-control" name="password" placeholder="Password"><br>
          <input type="number" class="form-control" name="tel_no" placeholder="Telephone Number"><br>
          <input type="number" class="form-control" name="idn" placeholder="ID Number"><br>
          <input type="submit" class="btn btn-primary" name="insert_btn">
        </form>
        <script>
          function validate(){
            var Fname=document.insert_form.fname.value;
            var Lname=document.insert_form.lname.value;
            var Uname=document.insert_form.uname.value;
            var Pword=document.insert_form.password.value;
            var Tnumber=document.insert_form.tel_no.value;
            var IDn=document.insert_form.idn.value;
              if (Fname== "") {
                alert('please enter firstname');
                return false;
              }
    
              if (Lname== "") {
                alert('please enter lastname');
                return false;
              }
              if (Uname== "") {
                alert('please enter username');
                return false;
              }

              if (Pword== "") {
                alert('please enter password');
                return false;
              }
              if (Tnumber== "") {
                alert('please enter your telephone number');
                return false;
              }
              if (IDn== "") {
                alert('please enter your ID Number');
                return false;
              }
                              return true;
          }
        </script>

<div class="row">
  <div class="col-md-9"></div>
  <div class="col-md-3">   
    <form action="search.php" method="GET" style="float: right;">
        <input type="text" class="form-control search" placeholder="Search" name="query">
        <span class="glyphicon glyphicon-search searchbtn"></span>
    </form>
  </div>
</div>
        <table class="table">
          <thead>
            <tr>
              <th>Id </th>
              <th>First Name </th>
              <th>Last Name </th>
              <th>Telephone Number </th>
              <th>Email </th>
              <th>Date Employed </th>
              <th>action </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query="SELECT *FROM register_tbl";
            $result = mysqli_query($conn, $query);
            while($row=mysqli_fetch_array($result)){
              echo '
                    <tr>
                        <td>'.$row['user_id'].'</td>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['username'].'</td>
                        <td>'.$row['lastname'].'</td>
                        <td>'.$row['tel_no'].'</td>
                        <td>'.$row['phonenumber'].'</td>
                        <td><button class="btn btn-danger"><a href="addemployee.php?deleteid='.$row['user_id'].'"onclick="return confirm(\'ARE YOU SURE YOU WANT TO DELETE!\')">DELETE</button></a></td>
                    </tr>';
              
            }
            ?>
    <?php
    if (isset($_GET['deleteid'])) {
      $user_id=$_GET['deleteid'];
      $query="DELETE FROM tbl_user WHERE user_id='$user_id'";
      $result=mysqli_query($conn,$query);
      header("Location:home.php");
    }
    ?>
  </tbody>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        
      </div>
    </div>
  </div>
</div>

<!-- scripts -->
<link rel="stylesheet" type="text/js" href="js/jquery-3.2.1.slim.min.js">
<link rel="stylesheet" type="text/js" href="js/bootstrap.min.js">
</body>
</html>