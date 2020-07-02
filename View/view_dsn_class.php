<?php
require_once('koneksi.php');
$nidn = $_SESSION['nidn'];
$query = "SELECT * FROM dosen WHERE nidn = '$nidn'";
$result = mysqli_query($conn1,$query);
$column = mysqli_fetch_array($result);
$nama = $column[0];
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title> Dosen </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-custom navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand" href="#" style='font-size:25px;font-style:italic;font-family:"Arial Black", Gadget, sans-serif'>ABSENKU</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <!--<li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#option"><img src="setting.png"/><span class="sr-only">(current)</span></a>
              </li>-->
              <li class="nav-item">
              <form id="LogOut" action = "proses.php" method = "POST">
                <input type = "hidden" name="logout" value = "LOGOUT">
                <a class="nav-link js-scroll-trigger" href="#" onclick="document.getElementById('LogOut').submit();"><img src="logouts.png"/> <font size="4">Logout</font><span class="sr-only">(current)</span></a>
              </form>
              </li>
              <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#Jadwal" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Jadwal
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Senin</a>
                  <a class="dropdown-item" href="#">Selasa</a>
                  <a class="dropdown-item" href="#">Rabu</a>
                  <a class="dropdown-item" href="#">Kamis</a>
                  <a class="dropdown-item" href="#">Jumat</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Opsional</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>-->
            </ul>
          </div>
        </div>
      </nav>
      <!-- Side navigation -->
      <div class="sidebar">
        <form id="Click" action = "proses.php" method ="POST">
          <input type = "hidden" name="home">
          <a href="#" onclick="document.getElementById('Click').submit();">Home<span class="sr-only">(current)</span></a>
        </form>
        <a href="#" class="active">Absensi</a>
      </div>

      <!-- Page content -->
      <div class="content" style="margin-top:62px;">
       <!--Table-->
       <br>
        <h2><?php echo $nama?></h2>
        <h3><?php echo $nidn?></h3>
        <hr>
        <?php
        $query_kelas = "SELECT * FROM kelas WHERE dosen = '$nidn' ORDER BY dow_id ASC, jam_mulai ASC"; //select table in database
        $result2 = mysqli_query($conn2,$query_kelas);
        while ($kelas=mysqli_fetch_assoc($result2))
        {
          $kode_kelas = $kelas['kode_kelas'];
          $nama_kelas = $kelas['nama_kelas'];
          $id = str_replace(".", "", $kode_kelas);
          $jam_mulai = substr($kelas['jam_mulai'], 0, -3);
          $jam_selesai = substr($kelas['jam_selesai'], 0, -3);
          $tabel_absensi = "absensi_".strtolower($id);
        ?>
        <div id="accordion_<?php echo $id?>">
          <div class="card">
              <div class="card-header" style="background-color:#2D63A9;">
                <a class="card-link" data-toggle="collapse" href="#collapse_<?php echo $id?>" style="color:#fff;">
                  <?php echo $nama_kelas.' - '.$kode_kelas.' | '.$kelas['hari'].' '.$jam_mulai.' - '.$jam_selesai; ?>
                  <font size = "1">[click to expand]</font>
                </a>
              </div>
              <div id="collapse_<?php echo $id?>" class="collapse" data-parent="#accordion_<?php echo $id?>">
                <div class="card-body">
                Keterangan:<br>
                <B>H</B> = HADIR, <B>T/H</B> = TIDAK HADIR, <B>I</B> = IJIN, <B>S</B> = SAKIT<BR>
                 <table border = 1 height="100%" width = "100%">
                  <tr align = "center">
                    <td rowspan = 2>NIM</td>
                    <td colspan = 14>Pertemuan</td>
                    <td rowspan = 2>Aksi</td>
                  </tr>
                  <tr align = "center">
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                    <td>14</td>
                  </tr>
                  <?php
                    $query_absen = "SELECT * FROM $tabel_absensi ORDER BY nama"; //select table in database
                    $result_absen = mysqli_query($conn3,$query_absen);
                    if($result_absen == false)
                    {
                      echo "<td colspan='16'>No Student(s) Record</td>";
                    }
                    else
                    {
                      while ($absen=mysqli_fetch_assoc($result_absen))
                      {
                  ?>
                        <tr>
                        <td><?=$absen['nim'];?></td>
                        <?php
                          for($i=1;$i<=14;$i++)
                          {
                         ?>
                            <form method="POST" action ="proses.php">
                            <td>
                            <select name="attendance<?=$i?>" id="attendance">
                            <option <?php if($absen['pertemuan'.$i]=="Hadir"){echo "Selected='selected'";}?>>H</option>
                            <option <?php if($absen['pertemuan'.$i]=="Tidak Hadir"){echo "Selected='selected'";}?>>T/H</option>
                            <option <?php if($absen['pertemuan'.$i]=="Ijin"){echo "Selected='selected'";}?>>I</option>
                            <option <?php if($absen['pertemuan'.$i]=="Sakit"){echo "Selected='selected'";}?>>S</option>
                            </select>
                            </td>
                        <?php
                          }
                        ?>
                        <td>
                          <input type="submit" name="update_absen" value="Update">
                          <input type="hidden" name="nim" value = "<?=$absen['nim']?>"/>
                          <input type="hidden" name="tabel_absensi" value = "<?=$tabel_absensi?>"/>
                        </td>
                        </form>
                        </tr>
                  <?php
                      }
                    }
                    ?>
                 </table>
                </div>
              </div>
            </div>
          </div>
          <br>
        <?php
        }
        ?>
      </div>
  </body>
</html>
