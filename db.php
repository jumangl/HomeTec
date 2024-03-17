<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hometec';



//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if (!$conn){
    die('Could not connect: ' . mysqli_error($conn));
}
else{
    echo "DB Connection Successful";
}
//select the database
mysqli_select_db($conn, $dbname);
?>
