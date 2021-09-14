<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "storedetails";
    $conn = mysqli_connect($host,$username,$password,$db);
    
    if(isset($_POST["Submit"])){
       $UserName = $_POST['UserName'];
       $Email = $_POST['Email'];
       $Rating = $_POST['Rating'];
       $Suggestion = $_POST['Suggestion'];
       $sql = "INSERT INTO feedback(UserName,Email,Rating,Suggestion) values('$UserName','$Email','$Rating','$Suggestion')";
        if(mysqli_query($conn,$sql)){
            echo '<script type = "text/javascript">alert("Your Feedback is successfully added")</script>';
            echo "<h1 style = 'color : green;  padding : 300px 0px 0px 500px '> Your Feedback Successfully added</h1>";
            header("Refresh:5;url=UserContactUs.php");
        }else{
            echo '<script type = "text/javascript">alert("Try Using with another mail")</script>';
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url=UserContactUs.php");
        } 
    }else{
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'width:100%;height:100%;margin:0px 0px 0px 0px;'>";
    }
?>