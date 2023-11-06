<?php 
session_start();

	include("server.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $name1 = $_POST['name1'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password) && !is_numeric($email))
		{

			//save to database
			$sno = random_num(20);
			$query = "insert into login (name1,email,password) values ('$name1','$email','$password')";

			mysqli_query($con, $query);

			header("Location: index.php");
			die;
		}else
		{
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<script src="myjs.js"></script>
<body>
	<div class="main">
    <form id="signup1" action="" method="post" name="signup" onsubmit="return signupvalidation()">
<div class="content">
           
            <div class="signupform">
                <h2>Signup</h2>
                <input  type="text" name="name1" placeholder="Enter name">
                <input type="email" name="email" placeholder="Enter email">
                <input type="password" name="password" placeholder="Enter Password">
                 <div >
                    <input style="background: orangered;" class="btnn" type="submit" value="Signup" onclick="ValidateEmail(document.login.email)" onclick="CheckPassword(document.signup.password)">
                    <br/>
                    <br>
                    <a style="color: yellow;" href="index.php">Already have an account?</a>
            </div>
        </div>
                
    </form>
	</div>
</body>
</html>