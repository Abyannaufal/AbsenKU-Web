<?php
session_start();

if (isset( $_SESSION['nim'])) {
    include 'view/view_mhs.php';
}
else if (isset($_SESSION['nidn']))
{
    if(isset($_GET['absensi']))
    {    
        include 'view/view_dsn_class.php';
    }
    else
    {
        include 'view/view_dosen.php';
    }
}
else {
    // Redirect them to the login page
    header("Location:login.php");
}
?>