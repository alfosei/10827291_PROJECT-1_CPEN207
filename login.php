<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 </head>
 <body background="budo.jpg"> 

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
    	<form action="login.php" method="post">
		<div class="container">
    		<div style="font-size: 25px; text-align: center; color: white;">Login</div>
    		<hr class="mb-3">


    	<div style="font-size: 15px; color: white;">
        	<label for="user_name"><b>Username</b></label>
			<input class="form-control" id="id"  type="text" name="user_name" required><br>
    	</div>
    	<div style="font-size: 15px; color: white;">
        	<label for="password"><b>Password</b></label>
			<input class="form-control" id="password"  type="password" name="password" required><br>
    	</div>
    	<hr class="mb-3">

    		<input class="btn btn-primary" type="submit" id="button" name="login" value="Login"><br><br>
    		<a href="signup.php">Click to Sign Up here</a><br><br>
    	</form>
    </div>
 </body>
 </html>