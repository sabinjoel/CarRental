<?php
    session_start();
    // echo "<h1>This is to store data into database</h1>";
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "storedetails";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
        echo "Connection failed : ".mysqli_connect_error();
        die();
    }

    if(isset($_POST["Signin"])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $_SESSION['username'] = $username;
        if($_POST['type'] == "Owner"){
            $sql="select * from ownerdetails where Email='".$username."'AND Password='".$password."' limit 1";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)==1){
                echo "Login Successfully";
                header("Location:OwnerHome.php");   
            }else{
                echo "<h1 style ='color:red;text-align:center;display:block;margin: 10px 0px 10px 0px;'>Invalid Credentials</h1>";
                echo "<img src = './../images/401-Unauthorized-t.jpg' alt = 'This is an image' style ='width:105%;height:699px;margin: 0px 0px 0px -9px;'>";
                header("Refresh:5;url=Login.html");
            }
        }else{
            $sql="select * from userdetails where Email='".$username."'AND Password='".$password."' limit 1";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) == 1){
                header("Location:UserHome.php"); 
            }else{
                echo "<h1 style ='color:red;text-align:center;display:block;margin: 10px 0px 10px 0px;'>Invalid Credentials</h1>";
                echo "<img src = './../images/401-Unauthorized-t.jpg' alt = 'This is an image' style ='width:105%;height:699px;margin: 0px 0px 0px -9px;'>";
                header("Refresh:5;url=Login.html");
            }
        }

        // else{
        //     echo "<h1 style ='color:red;text-align:center;display:block;margin: 10px 0px 10px 0px;'>Invalid Credentials</h1>";
        //     echo "<img src = './../images/401-Unauthorized-t.jpg' alt = 'This is an image' style ='width:105%;height:699px;margin: 0px 0px 0px -9px;'>";
        //     header("Refresh:5;url=Login.html");
        // }    
    }
?>


