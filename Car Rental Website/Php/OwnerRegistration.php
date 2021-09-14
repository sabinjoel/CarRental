<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "storedetails";
    $conn = mysqli_connect($host,$username,$password,$db);
    if(!$conn){
        die("Connection failed : ".mysqli_connect_error());
    }else{
        echo "Connection successful\n";
    }

    if(isset($_POST["Submit"])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $DOB = $_POST['Dob'];
        $Age = $_POST['age'];
        $CompanyName = $_POST['company'];
        $Email  = $_POST['email'];
        $Password = $_POST['Password'];
        $PhoneNumber = $_POST['Phone'];
        $InsuranceNumber = $_POST['Insurance'];
        $Address = $_POST['Address'];
        $sql = "INSERT INTO ownerdetails(FirstName,LastName,DOB,Age,CompanyName,Email,Password,PhoneNumber,InsuranceNumber,Address) values('$FirstName','$LastName',' $DOB','$Age','$CompanyName','$Email','$Password','$PhoneNumber','$InsuranceNumber','$Address')";
        if(mysqli_query($conn,$sql)){
            header("Location:Login.html");
        }else{
            echo "This Email is already registered try with other mail id";
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url=OwnerRegistration.html");
        } 
    }else{
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
    }
?>