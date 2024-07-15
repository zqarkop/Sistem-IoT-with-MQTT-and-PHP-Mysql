<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sistemiot";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    echo "connection abborted";
}
?>