<?php
session_start();

if (isset( $_SESSION['nim'])) {
    include 'view/view_mhs.php';
}
else if (isset($_SESSION['nidn']))
{
    include 'view/view_dosen.php';
} 
else {
    // Redirect them to the login page
    header("Location:login.php");
}
?>