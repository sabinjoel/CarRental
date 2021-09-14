<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
      div {
        margin-bottom: 10px;
        padding-top: 15px;
      }
      label{
        display: inline-block;
        width: 150px;
        text-align: right;
      }
    </style>
    <link rel="stylesheet" href="./../Css/Home.css">
    <title>Add Cars</title>

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
    <form action = "" method="POST" enctype="multipart/form-data">
        <center>
            <h1 style = "color:red">Add Cars</h1>
            <div>
                <label class = "name" >Car Brand<span style = "color: red;">&#42;</span></label>          
                <input  type = "text" name = "Brand" placeholder = "Car Brand" required>    
            </div>
    
            <label class = "name" >Car Model<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "Model" placeholder = "Model" required>
            
            <div>
                <label class = "name" >Car Colour<span style = "color: red;">&#42;</span></label>           
                <input  type = "text" name = "Colour" placeholder = "colour"required>
                
            </div>
            <div>
                <label class = "name" >Kilo Meters Covered previously<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "Kilo" placeholder = "Kilometers  travelled" required>
                
            </div>
            <div>
                <label class = "name" >Seating Capacity<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "Seating" placeholder = "Seating capacity" required>
                
            </div>
            <div>
                <label class = "name" >Fare<span style = "color: red;">&#42;</span></label>    
                <input  type = "text" name = "Fare" placeholder="Fare per day" required>
                
            </div>
            <div>
                <label for="img">Car image:<span style = "color: red;">&#42;</span></label>
                <input type="file" name="Image" required>
            </div>
            <button name = "Upload" style = "width:fit-content;background-color:orange;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Submit</button>
        </center>
    </form>
  </body>
</html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "storedetails";
$conn1 = mysqli_connect($host,$username,$password,$db);
if(isset($_POST['Upload'])){
    $conn = mysqli_connect("localhost","root","","storedetails");
    $email = $_SESSION['username'];
    $query = "SELECT * FROM ownerdetails WHERE Email= '$email';";
    $query_run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($query_run);
    $name = "";
    $name .=  $data['FirstName'];
    $name .=  $data['LastName'];
    $file = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
    $OwnerName = $name;
    $OwnerPhone = $data['PhoneNumber'];
    $OwnerEmail = $data['Email'];
    $Address = $data['Address'];
    $Brand = $_POST['Brand'];
    $Model = $_POST['Model'];
    $Colour = $_POST['Colour'];
    $Kilo = $_POST['Kilo'];
    $Seating = $_POST['Seating'];
    $Fare = $_POST['Fare'];
    $sql = "INSERT INTO booking (OwnerName,OwnerPhone,OwnerEmail,Address,Brand,Model,Colour,Kilo,Seating,Fare,Image) values('$OwnerName','$OwnerPhone','$OwnerEmail','$Address','$Brand','$Model','$Colour','$Kilo','$Seating','$Fare','$file')";
    if(mysqli_query($conn,$sql)){
        echo '<script type = "text/javascript">alert("Car Added Successfully")</script>';
    }else{
        echo "Something went wrong";
    }
}
