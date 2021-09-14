<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./../Css/Home.css">
    <title>Car Rental</title>
    <style>
      .drop-btn {
    background: none;
    border: none;
    padding: 0;
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color: lightgreen;}
  
  .dropdown:hover .dropdown-content {display: block;background-color:white}
  body {
      margin: 0px 0px 0px 0px;
      width:100%;
      overflow-x: hidden;
    }
    </style>
  </head>
  <hr class = "Rule">

  <body>
        <p class = "some" style = "font-size:30px;font:bold;position:relative;left:30px;top:20px">Car Rental Website </p>
        <div class = "random" style = "position:relative">
          <center>
              <nav>
                  <a href = "#home" >Home </a>
                  <!-- <a href = "./../Html/bookingsPage.html">Booking</a> -->
                  <div class="dropdown">
                    <button class="drop-btn">Car Rentals▼</button>
                    <div class="dropdown-content">
                      <a href="./OwnerBooking.php">Add Cars</a>
                      <a href="./OwnerRemoveCarPage.php">Remove Cars</a>
                      <a href="./OwnerBookingHistory.php">History</a>
                    </div>
                  </div>
                  <a href = "./OwnerProfile.php">My Profile</a>
                  <div class="dropdown">
                    <button class="drop-btn">Account▼</button>
                    <div class="dropdown-content">
                      <a href="./OwnerUpdatePassword.php">Update Password</a>
                      <a href="./OwnerDelete.php">Delete my account</a>
                    </div>
                  </div>
                  <a href = "./../Php/OwnerContactUs.html" >Contact Us </a>
                  <a href = "./Logout.php">Log Out </a>
              </nav>
          </center>
        <?php 
          $email =$_SESSION['username'];
          $username = strstr($email, '@', true);
          echo "<h1 align= right style = 'color:blue;position:relative;bottom:20px'> "."Hello ".$username."😀</h1>";
        ?>
        </div>
        <hr class = "Rule">
        <br>
  </body>
</html>


<?php
    echo "<h1 align = center style = 'color:orange'>My Bookings History</h1>";
    $Id = $_GET['Id'];
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "storedetails";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:50px 300px150px 0px 0px 50px'>";
        echo "Connection failed : ".mysqli_connect_error();
        die();
    }
    $query = "SELECT * FROM booking WHERE Id= '$Id';";
    $query_run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($query_run);
    if($data){  
        echo "<h1 style = 'color:red;margin:50px 300px'>Customer Details</h1>";
        echo "<h2  style = 'color:green;margin:50px 300px '> Name  : ".$data['UserName']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '>Email : ".$data['UserEmail']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '>Phone Number : ". $data['Phonenumber']."</h2>";
       
        echo "<h1 style = 'color:red;margin:50px 300px'>Car  Details</h1>";
        
        echo "<h2 style = 'color:green;margin:50px 300px '> Brand : ".$data['Brand']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '>Model : ".$data['Model']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Colour : ".$data['Colour']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Kilometers Travelled Previously(in km) : ".$data['Kilo'] ."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Seating Capacity : ".$data['Seating']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Fare (per day) : ".$data['Fare']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Start Date : ".$data['SDate']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Days : ".$data['Days']."</h2>";
        echo "<h2 style = 'color:green; margin:50px 300px '>Total Fare (in rupees)  : ".$data['Fare'] * $data['Days']   ."</h2>";
        echo '<center><img src="data:image/jpeg;base64,'.base64_encode($data['Image'] ).'" style = "text-align:center" height="500em"/></center>';  
    }else{
        echo "Something went wrong";
    }
?>
        




