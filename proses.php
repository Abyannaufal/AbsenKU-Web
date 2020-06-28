<?php
// Always start this first
session_start();
require_once('koneksi.php');
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['nim'] ) && isset( $_POST['mhs_password'] ) ) {
        $nim = $_POST['nim'];
        $pass = $_POST['mhs_password'];
        $query = "SELECT * FROM mahasiswa WHERE nim_mhs = '$nim'";
        $result = mysqli_query($conn1,$query);
        $column = mysqli_fetch_array($result);	
        // Verify user password and set $_SESSION
        if($nim == $column[1] && $pass == $column[2])
        {
            $_SESSION['nim'] = $nim;
            header("Location:index.php");
        }
        else{
            header("Location:login.php?w");
        }
    	
    }
    else if ( isset( $_POST['nidn'] ) && isset( $_POST['dsn_password'] ) ) {
        $nidn = $_POST['nidn'];
        $pass = $_POST['dsn_password'];
        $query = "SELECT * FROM dosen WHERE nidn = '$nidn'";
        $result = mysqli_query($conn1,$query);
        $column = mysqli_fetch_array($result);	
        // Verify user password and set $_SESSION
        if($nidn == $column[1] && $pass == $column[2])
        {
            $_SESSION['nidn'] = $nidn;
            header("Location:index.php");
        }
        else{
            header("Location:login.php?w");
        }
    	
    }
    else if(isset($_POST['logout']))
    {
        session_destroy();
        header("Location:login.php");
    }
    else if(isset($_POST['submit_pengumuman']))
    {
        if(strlen(trim($_POST['pengumuman'])))
        {
            $kode_kelas = $_POST['id'];
            $pengumuman = nl2br(htmlentities($_POST['pengumuman'], ENT_QUOTES, 'UTF-8'));
            $query = "UPDATE kelas SET pengumuman = '$pengumuman' WHERE kode_kelas = '$kode_kelas'";
            $result = mysqli_query($conn2,$query);
            header("Location:index.php");
        }
        else
        {
            header("Location:index.php");
        }
    }
    else if(isset($_POST['reset_pengumuman']))
    {
        $kode_kelas = $_POST['id'];
        $pengumuman = "Tidak ada pengumuman";
        $query = "UPDATE kelas SET pengumuman = '$pengumuman' WHERE kode_kelas = '$kode_kelas'";
        $result = mysqli_query($conn2,$query);
        header("Location:index.php");
    }
    else if(isset($_POST['view_absensi']))
    {
        header("Location:index.php?absensi=class");
    }
    else if(isset($_POST['home']))
    {
        header("Location:index.php");
    }
    else if(isset($_POST['update_absen']))
    {
        $tabel_absensi = $_POST['tabel_absensi'];
        $nim = $_POST['nim'];
        $pertemuan = array();
        $pertemuan1 = $_POST['attendance1'];
        $pertemuan2 = $_POST['attendance2'];
        $pertemuan3 = $_POST['attendance3'];
        $pertemuan4 = $_POST['attendance4'];
        $pertemuan5 = $_POST['attendance5'];
        $pertemuan6 = $_POST['attendance6'];
        $pertemuan7 = $_POST['attendance7'];
        $pertemuan8 = $_POST['attendance8'];
        $pertemuan9 = $_POST['attendance9'];
        $pertemuan10 = $_POST['attendance10'];
        $pertemuan11 = $_POST['attendance11'];
        $pertemuan12 = $_POST['attendance12'];
        $pertemuan13 = $_POST['attendance13'];
        $pertemuan14 = $_POST['attendance14'];
        $query = "UPDATE $tabel_absensi SET pertemuan1 = '$pertemuan1',
                                            pertemuan2 = '$pertemuan2',
                                            pertemuan3 = '$pertemuan3',
                                            pertemuan4 = '$pertemuan4',
                                            pertemuan5 = '$pertemuan5',
                                            pertemuan6 = '$pertemuan6',
                                            pertemuan7 = '$pertemuan7',
                                            pertemuan8 = '$pertemuan8',
                                            pertemuan9 = '$pertemuan9',
                                            pertemuan10 = '$pertemuan10',
                                            pertemuan11 = '$pertemuan11',
                                            pertemuan12 = '$pertemuan12',
                                            pertemuan13 = '$pertemuan13',
                                            pertemuan14 = '$pertemuan14' WHERE nim = '$nim'";
        $result = mysqli_query($conn3,$query);
        header("Location:index.php?absensi");
    }
}
?>