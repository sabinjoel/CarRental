<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "storedetails";
    $conn = mysqli_connect($host,$username,$password,$db);
    // if(!$conn){
    //     die("Connection failed : ".mysqli_connect_error());
    // }else{
    //     echo "Connection successful\n";
    // }
    
    if(isset($_POST["Submit"])){
       $UserName = $_POST['UserName'];
       $Email = $_POST['Email'];
       $Subject = $_POST['Subject'];
       $Msg = $_POST['Msg'];
       $sql = "INSERT INTO contactus(UserName,Email,Subject,Msg) values('$UserName','$Email','$Subject','$Msg')";
        if(mysqli_query($conn,$sql)){
            echo "<h1 style = 'color : green;  padding : 300px 0px 0px 500px '> Your Query Successfully added</h1>";
            header("Refresh:5;url=UserContactUs.php");
        }else{
            echo "This Email is already registered try with other mail id";
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url=UserContactUs.php");
        } 
    }else{
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'width:100%;height:100%;margin:0px 0px 0px 0px;'>";
    }
?>