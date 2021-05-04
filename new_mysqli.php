<?php
$username = "root";
$servername= "localhost:3307";
$password = "";
$dbname = "airline";
$conn = mysqli_connect($servername , $username , $password , $dbname);
if($conn->connect_error)
        {
          die("Connection failed:" .$conn->connect_error);
        }
// echo "Connected successfully";
// $conn->close();
?>
