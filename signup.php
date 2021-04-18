 <?php 
 session_start();

 include("connection.php");
 include("functions.php");
 

if($_SERVER['REQUEST_METHOD']=="POST")
{
	//something was posted
	$name = $_POST['name'];
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];


	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	{
       //save to database
		$user_id = random_num(20);
		$query = "insert into users(user_id,name,user_name,password) values('$user_id','$name','$user_name','$password')";
		mysqli_query($con, $query);
		header("Location: login.php");
		die;

	}else
	{
		echo "Please enter some valid information!";
	}
}
  ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>MARIA TECH | Sign Up</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <body background="budo.jpg">
 
</div>
    <style type="text/css">
    #text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;

	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: transparent;
		margin: auto;
		width: 300px;
		padding: 20px;
	}


 </style>

    <div id="box">
    	<form action="signup.php" method="post">
		<div class="container">
    		<div style="font-size: 25px; text-align: center; color: white;">Sign Up</div>
    		<hr class="mb-3">


    	<div style="font-size: 15px; color: white;">
    	   	<label for="name"><b>Name</b></label>
    		<input class="form-control" id="name" type="text" name="name" required><br>
    	</div>
        <div style="font-size: 15px; color: white;">
        	<label for="user_name"><b>Username</b></label>
			<input class="form-control" id="id"  type="text" name="user_name" required><br>
    	</div>
        <div style="font-size: 15px; color: white;">
        	<label for="password"><b>Password</b></label>
			<input class="form-control" id="password"  type="password" name="password" required><br>
    	</div>
    	<hr class="mb-3">
    		<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up"><br><br>
    		<a style="color: blue;"href="login.php">Login Here!</a>

    	</form>
    </div>


 </body>
 </html>