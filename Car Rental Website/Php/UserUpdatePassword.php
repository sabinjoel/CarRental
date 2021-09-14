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
                    <button class="drop-btn">Booking▼</button>
                    <div class="dropdown-content">
                      <a href="./UserBooking.php">Booking</a>
                      <a href="./UserCancelBooking.php">Cancel Booking</a>
                      <a href="./UserBookingHistory.php">History</a>
                    </div>
                  </div>
                  <a href = "./UserProfile.php">My Profile</a>
                  <div class="dropdown">
                    <button class="drop-btn">Account▼</button>
                    <div class="dropdown-content">
                      <a href="./UserUpdatePassword.php">Update Password</a>
                      <a href="./UserDelete.php">Delete my account</a>
                    </div>
                  </div>
                  <a href = "./../Php/UserContactUs.php" >Contact Us </a>
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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
</head>
<body>
    
    <div class="card-body">
        <center>
            <h1 style = "color:red">Update Password</h1>
            <form action = "" method = "POST">
                <label>New Password</label>
                <input type = "password" id = "password" name = "password" placeholder = "Enter your new password">
                <p class = show><input type="checkbox" onclick="myFunction()" >Show password</p>
                
                <label>Confirm Password</label>
                <input type = "password" id = "Confirmpassword" name = "Confirmpassword" placeholder = "Enter password again">
                <p class = show><input type="checkbox" onclick="myFunction1()" >Show password</p>
                <button name = "Submit" style = "background-color:green;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Update Now</button>
            </form>
        </center>
    </div>



    <script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password"){
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      function myFunction1() {
        var x = document.getElementById("Confirmpassword");
        if (x.type === "password"){
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>
</body>
</html>


<?php 

if(isset($_POST['Submit'])){
    $password = $_POST['password'];
    $Confirmpassword = $_POST['Confirmpassword'];

    if($password != $Confirmpassword){
        echo '<script type = "text/javascript">alert("Password not matched,please try again!!")</script>';
    }else{
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
        $email = $_SESSION['username'];
        $password = $_POST['password'];
        $query = "UPDATE userdetails SET Password = '$password' where Email = '$email'";
        // echo $query;
        $result = mysqli_query($conn,$query);
        if($result){
            echo '<script type = "text/javascript">alert("Your Password has been successfully updated")</script>';     
        }else{
            echo '<script type = "text/javascript">alert("Something went wrong")</script>';     
        }
    }
}

?>
