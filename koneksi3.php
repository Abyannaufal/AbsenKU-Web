<?php
$server ="localhost";
$username= "root";
$password = '';
$db_name = "absensi";
$conn = mysqli_connect($server,$username,$password,$db_name);
if(mysqli_connect_error())
{
    echo"Failed to connect to database: ".mysqli_connect_error();
}
?>