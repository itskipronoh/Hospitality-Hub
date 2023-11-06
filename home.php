<?php
session_start();
if(isset($_SESSION["status"])){
include('server.php');
include('function.php');
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
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

    <title>hotel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="my.css">
</head>
<script src="myjs.js"></script>
<body>
  <header>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h1 class="logo">Famous Gate</h1>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="#home">Home</a>
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
                <a href="search.php"><button class="btn">Search</button></a>
                <button class="btn2"> <a style="color: white; " href="index.php">Logout</a></button>

                <div class="nms"><lable>Signed In as: <?php echo $user_data['name1']; ?></lable></lable></div>
            </div>
            
        </div>
        
        <form >
        <div class="cn1">
        <h1 class="">Quick Booking</h1>
        <h5 style="color: cornsilk;">location</h5>
        <input type="text" name="location" placeholder="Litein"><br>
        <Label>Check In : </Label><input name="checkin/checkout" type="date" placeholder="Enter Date"><br>
        <input type="number" name="guestn" placeholder="Enter number of guests"><br>
        <button type="submit" class="btn">book</button>
      </div>
      </form>
            </div>
        </div>
    </div>
  </header>
    <div class="body" id="home">
      <div class="row">
      <h2>Welcome to FAMOUS GATE<br>This HOTEL offers an enchanting escape for those seeking solace amidst nature's breathtaking beauty.<br>Step into a world of wonders where ancient tales come alive, and the past seamlessly merges with the present.<br>Delight your taste buds with the local delicacies served at the charming beachside cafes, where freshly caught seafood and tantalizing tropical flavors tantalize your senses.<br>Savor the mouthwatering delights while sipping on a refreshing cocktail, perfectly complementing the idyllic setting.<br>Unveiling the Mysteries: Discover the Enchanting Beauty of our hotel.</h2>
  <div class="column">
    <div class="card">
      <img src="img/eldoret.jpg">
      <h3>Naivasha</h3>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="img/kiambu.jpg">
      <h3>Diani</h3>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="img/kisumu.jpg">
      <h3>Nyali</h3>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="img/main.jpg">
      <h3>Lamu</h3>
    </div>
  </div>
</div>


    </div>
    <div class="content3">
        <div class="slideshow-container">
            <div class="mySlides fade">
              <div class="numbertext">1</div>
              <img src="1.jpg" width="100%">
              <div class="text"></div>
            </div>
            <div class="mySlides fade">
              <div class="numbertext">1</div>
              <img src="2.jpg" width="100%">
              <div class="text"></div>
            </div>
            <div class="mySlides fade">
              <div class="numbertext">1</div>
              <img src="3.jpg" width="100%">
              <div class="text"></div>
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>
      <div style="float: right;">
        <span class="dot" onclick="currentSlide(1)"></span> 
        <span class="dot" onclick="currentSlide(2)"></span> 
        <span class="dot" onclick="currentSlide(3)"></span> 
      </div>
    </div>
    <div class="content2">
<h1>Crucial elements about Hosting?</h1>
<div class="bottom">
<a href="contactus.php"><button>Contact Us</button></a>
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
            <p>Copyright &copy;@kipronohGideon <span>all rights reserved</span></p>
        </div>
    </footer>
    <script>
        var slideIndex = 0;
        showSlides();
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); 
}
</script>
</body>
</html>
<?php
}
else{
  header("Location: index.php");
}
?>