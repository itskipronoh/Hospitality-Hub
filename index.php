<?php
session_start();
$_SESSION["status"]= 0;
include('server.php');
include('function.php');
$user_data = 'check_login'($con);
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  //something was posted
  $email = $_POST['email'];
  $password = $_POST['password'];

  if(!empty($email) && !empty($password) && !is_numeric($email))
  {
    $query = "select * from login where email = '$email' limit 1";
    $result = mysqli_query($con, $query);
    if($result)
    {
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            if($user_data['password'] == $password)
            {
                $_SESSION['email'] = $user_data['email'];
                $_SESSION["status"] = 1;
                header("Location: home.php");
                die;
            }
        }
    }  
    echo '<script>alert("wrong username or password")</script>';
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>hotel</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
</head>
<script src="myjs.js">
</script>
<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">Famous Gate</h1>
            </div>
            <div class="menu">
                
            </div>
    
        </div>
        <div class="content">
            <h1>Hotel management & <br><span>System Booking</span></h1>
            <p class="par">Hotel management encompasses a range of activities involved in running a hospitality establishment.<br>It is a software solution designed to streamline and automate day-to-day operations, improving <br>efficiency,maintaining high standards and enhancing guest satisfaction.</p>
            <a href="signup.php"><button class="cn">Join us</button></a>
            <form method="post" name="login" >
            <div class="login" name="loginform">                
                <h2>Login</h2>
                <input type="email" name="email" placeholder="Enter email">
                <input type="password" name="password" placeholder="Enter Password">
                <input type="submit" value="Login" class="btnn" style="background: chocolate;" onclick="ValidateEmail(document.login.email)">                  
                
                <!-- <p class="link"><br/</p><br> -->
                <p>Don't have an account?</p>
                <a style="color:white; text-decoration:none;font-weight: bold;" href="signup.php"> <br><br/>Sign Up </a>
            </div>
            </form>
        </div>
    </div>
</body>   
</html>