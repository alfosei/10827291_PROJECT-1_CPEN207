<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title style="font-family: Arial;">MARIA TECHNOLOGIES</title>
 </head>
 <body background="budo.jpg">
 	<a href="logout.php">Logout</a>
  <h1 style="font-family: Arial;">Welcome to MARIA TECHNOLOGIES</h1>

  <br>
  	Hello, <?php echo $user_data['user_name']; ?>
 </body>
 </html>