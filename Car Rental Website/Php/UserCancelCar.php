<?php
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
    $query = "UPDATE booking SET Status = '0' Where Id= '$Id';";
    if($data = mysqli_query($conn,$query)){
        echo '<script type = "text/javascript">alert("Your booking has been successfully cancelled")</script>';
        // header("Location:UserCancelCar.php");
    }else{
        echo "something went wrong";
    }
?>