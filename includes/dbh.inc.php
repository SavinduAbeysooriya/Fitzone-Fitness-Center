<?php
$serverName="localhost";
$dbUsername="GYMSAVINDU";
$dbPassword= "";
$dbName="gym";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed :" . mysqli_connect_error(). " - Error Code: " . mysqli_connect_errno());
}else{
    //echo"Database connection successful!";
   
}
