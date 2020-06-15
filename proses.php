<?php
// Always start this first
session_start();
require_once('koneksi.php');
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['nim'] ) && isset( $_POST['mhs_password'] ) ) {
        $nim = $_POST['nim'];
        $pass = $_POST['mhs_password'];
        $query = "SELECT * FROM mahasiswa WHERE nim_mhs = '$nim'";
        $result = mysqli_query($conn,$query);
        $column = mysqli_fetch_array($result);	
        // Verify user password and set $_SESSION
        if($nim == $column[1] && $pass == $column[2])
        {
            $_SESSION['nim'] = $nim;
            header("Location:index.php");
        }
    	
    }
}
?>