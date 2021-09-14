<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "storedetails";
    $conn =  mysqli_connect($host,$user,$password,$db);
   
    if(isset($_POST["Submit"])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $Email = $_POST['email'];
        $Password = $_POST['Password'];
        $LicenseNumber = $_POST['LicenseNumber'];
        $AadharNumber = $_POST["AadharNumber"];
        $PhoneNumber = $_POST["phone"];
        $sql = "INSERT INTO userdetails(FirstName,LastName,Email,Password,LicenseNumber,AadharNumber,PhoneNumber) values('$FirstName','$LastName','$Email','$Password','$LicenseNumber','$AadharNumber','$PhoneNumber')";
        if(mysqli_query($conn,$sql)){
            echo "Record Added Successfully";
            header("Location:Login.html");
        }else{
            // echo "Error";
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url= UserRegistration.html");
        } 
    }else{
        echo "Something Went Wrong";
    }
    
?>