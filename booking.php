<?php 
session_start();

	include("server.php");
	include("function.php");
    include("data.php");
    $user_data = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        $nhotel = $_POST['nhotel'];
		$hlocation = $_POST['hlocation'];
		$contactp = $_POST['contactp'];
        $mobno = $_POST['mobno'];
		$email = $_POST['email'];


		if(!empty($nhotel) && !empty($hlocation) && !empty($contactp) && !empty($mobno) && !empty($email) && !is_numeric($email))
		{

			//save to database
			$sno = random_num(20);
			$query = "insert into booking (nhotel,hlocation,contactp,mobno,email) values ('$nhotel','$hlocation','$contactp','$mobno','$email')";

			mysqli_query($con, $query);

			header("Location:  booking.php");
         
			die;
		}else
		{
			echo "Please enter some valid information!";
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
                <h1 class="">Famous Gate</h1>
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
        <form action="" method="post" class="cn1">
      <h2>Hotel Booking</h2>
        <input type="text" placeholder="hotel name" name="nhotel"/></br>
        <input type="text" placeholder="Location" name="hlocation"/></br>
        <input type="text" placeholder="contact person" name="contactp"/></br>
        <input type="number" placeholder="Mobile Number" name="mobno" /></br>
        <input type="email" placeholder="email" name="email" value="<?= $user_data['email'];?>"/></br>
    <button class="btnn">Book</button>
    </form>
    <form style="float: right;" action="" method="GET">
            <input style="display:none;" class="src" type="text" name="email" value="<?= $user_data['email'];?>">
                <button  type="submit" class="btn">My Booking</button>
                </form>
            </div>
            <!-- My Booking Form -->
            <?php 
            $con = mysqli_connect("localhost","root","","hotel");
            if(isset($_GET['email']))
            {
                $email = $_GET['email'];
                $query = "SELECT * FROM booking WHERE email='$email'";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    foreach($query_run as $row)
                    {
                        // echo $row['nhotel'];
                        ?>
            <form action="" class="mbook">
            <h2>My Booking</h2>
            <label for="">Hotel</label></br>
            <input type="text" placeholder="hotel name" name="nhotel" value="<?= $row['nhotel'];?>"/></br>
            <label for="">Location</label></br>
            <input type="text" placeholder="Location" name="hlocation" value="<?= $row['hlocation'];?>"/></br>
            <label for="">Contact Person</label></br>
            <input type="text" placeholder="contact person" name="contactp" value="<?= $row['contactp'];?>"/></br>
            <label for="">Mobile Number</label></br>
            <input type="text" placeholder="Mobile Number" name="mobno" value="<?= $row['mobno'];?>"/></br>
            <label for="">Email</label></br>
            <input type="email" placeholder="email" name="email" value="<?= $row['email'];?>"/></br>
           </form>
           <?php 

                    }
                }
                else
                {
                    echo '<script> alert("No booking found")</script>';
                }
            }
            ?>
        </div>
    </div>
    
</div>
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