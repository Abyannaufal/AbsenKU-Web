<?php
$server ="localhost";
$username= "root";
$password = '';
$db_name1 = "siakad";
$db_name2 = "schedule";
$db_name3 = "absensi";
$conn1 = mysqli_connect($server,$username,$password,$db_name1);
$conn2 = mysqli_connect($server,$username,$password,$db_name2);
$conn3 = mysqli_connect($server,$username,$password,$db_name3);
if(mysqli_connect_error())
{
    echo"Failed to connect to database: ".mysqli_connect_error();
}
?>