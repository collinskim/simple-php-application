<?php

require ("includes/connection.php");

session_start();


    $query = $_GET['query']; 
    $min_length = 3;
     
    if(strlen($query) >= $min_length){
         
        $query = htmlspecialchars($query); 
        $query = mysql_real_escape_string($query);
         
        $raw_results = mysql_query("SELECT * FROM articles
            WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
                echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
            }
             
        }
        else{
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>EMPLOYEE LOGIN</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
<h1><?php   echo "welcome " .$_SESSION['username'];?></h1>
  <div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
        <form action="search.php" method="GET">
        <input type="text" class="form-control search" placeholder="Search" name="query">
        <span class="glyphicon glyphicon-search searchbtn"></span>
    </form>
    </div>
  </div>
  <div class="row" id="actions">
    <div class="col-md-12">
      <center><a href="insert.php"><button class="btn btn-danger insert">INSERT USERS</button></a></center>
      <a href=""><button class="btn btn-success view">VIEW DEBTORS LIST</button></a>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- script -->

</body>
</html>