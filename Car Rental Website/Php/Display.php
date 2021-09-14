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
// Attempt select query execution
    $sql = "SELECT * FROM cardetails";
    if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
                echo "<td>" . $row['Brand'] . "</td>";
                echo "<td>" . $row['Model'] . "</td>";
                echo "<td>" . $row['Colour'] . "</td>";
                echo "<td>" . $row['Kilo'] . "</td>";
                echo "<td>" . $row['Seating'] . "</td>";
                // $image = $row['Image'];
                // echo "<img src = '$image' > ";
                // $imageURL = './.$row["file_name"];
                // echo'<img height="300" width="300" src="./../uploads'.$row['Image'].'">';
                // echo "<img src = 'Image/".$row['Image'].'" />';
                // echo "<td>" . <img src = '$image' >. "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($conn);
?>
