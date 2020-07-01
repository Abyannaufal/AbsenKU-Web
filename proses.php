<?php
// Always start this first
session_start();
require_once('koneksi.php');
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['nim'] ) && isset( $_POST['mhs_password'] ) ) {
        $nim = strtoupper($_POST['nim']);
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
        $nidn = strtoupper($_POST['nidn']);
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
        header("Location:index.php?absensi");
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
        for($i=1;$i<=14;$i++)
        {
            if($_POST['attendance'.$i]=="H")
            {
                $pertemuan[$i-1]="Hadir";
            }
            else if($_POST['attendance'.$i]=="T/H")
            {
                $pertemuan[$i-1]="Tidak Hadir";
            }
            else if($_POST['attendance'.$i]=="I")
            {
                $pertemuan[$i-1]="Ijin";
            }
            else if($_POST['attendance'.$i]=="S")
            {
                $pertemuan[$i-1]="Sakit";
            }
            
        }
        $query = "UPDATE $tabel_absensi SET pertemuan1 = '$pertemuan[0]',
                                            pertemuan2 = '$pertemuan[1]',
                                            pertemuan3 = '$pertemuan[2]',
                                            pertemuan4 = '$pertemuan[3]',
                                            pertemuan5 = '$pertemuan[4]',
                                            pertemuan6 = '$pertemuan[5]',
                                            pertemuan7 = '$pertemuan[6]',
                                            pertemuan8 = '$pertemuan[7]',
                                            pertemuan9 = '$pertemuan[8]',
                                            pertemuan10 = '$pertemuan[9]',
                                            pertemuan11 = '$pertemuan[10]',
                                            pertemuan12 = '$pertemuan[11]',
                                            pertemuan13 = '$pertemuan[12]',
                                            pertemuan14 = '$pertemuan[13]' WHERE nim = '$nim'";
        $result = mysqli_query($conn3,$query);
        header("Location:index.php?absensi");
    }
}
?>