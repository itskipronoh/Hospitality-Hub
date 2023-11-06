<?php
session_start();
include('server.php');
include('function.php');
include('data.php');
    $user_data = check_login($con);
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
        <form class="cn1" method="post">
            <h1>Service</h1>
        <p>
    <ol>
    <li>online booking</li>
    <li>Catering services</li>
    <li>Concierge services</li>
    <li>Courier services</li>
    <li>reservation management</li>
    <li>guest profile management</li>
    <li>Excursions and guided tours</li>
    <li>room inventory</li>
    <li>front desk operations</li>
    <li>point of sale intergration</li>
   
</p>
    </form>

        </div>
    </div>
    <footer>
        <div class="footer-content">
            <h3>hotel</h3>
            <p></p>
            <ul class="social">

            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;@kipronohGideon<span>all rights reserved</span></p>
        </div>
    </footer>
</body>
</html>