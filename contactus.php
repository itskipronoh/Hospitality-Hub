<?php
session_start();
include('server.php');
include('function.php');
    $user_data = check_login($con);
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $name1 = $_POST['name1'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		if(!empty($email) && !empty($message) && !is_numeric($email))
		{

			//save to database
			$sno = random_num(20);
			$query = "insert into contactus (name1,email,message) values ('$name1','$email','$message')";

			mysqli_query($con, $query);

			header("Location: contactus.php");
			die;
		}else
		{
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">Famous Gate</h1>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="home.php">Home</a>
                    </li>
                    <li>
                        <a href="booking.php">Booking </a>
                    </li>
                    
                    <li>
                        <a href='service.php'>Services</a>
                    </li>
                    <li>
                        <a href="aboutus.php">About</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact</a>
                    </li>
                    
                    
                </ul>
            </div>
            <div class="search">
                <input class="src" type="search" name="" >
                <a href="#"><button class="btn">Search</button></a>
                <div class="nms"><lable>Signed In as: <?php echo $user_data['name1']; ?></lable></lable></div>
            </div>
            <button class="btn2"> <a style="color: white; " href="index.php">Logout</a></button>
        </div>
        <div class="content">
        <form class="cn1" method="POST" >
        <h1 style="font-size: 20px;">Contact Us</h1>
        <label for="">Name</label>
        <input type="text" name="name1" value="<?= $user_data['name1'];?>">
        <br/>
        <label for="mail" >Email</label>
        <input class="input1" type="email" name="email" value="<?= $user_data['email'];?>">
        <br/>
        <label for="Message">Message</label>
        <input type="text" name="message">
        <input class="btnn" type="submit" value="Submit" onclick="return alert('message sent')">
    </form>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <h3>Famous Gate</h3>
            <p></p>
            <ul class="social">

            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;@kipronohGideon <span>all rights reserved</span></p>
        </div>
    </footer>
</body>
</html>