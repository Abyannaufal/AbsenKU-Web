<?php
require_once('koneksi.php');
$nim = $_SESSION['nim'];
$query = "SELECT * FROM mahasiswa WHERE nim_mhs = '$nim'";
$result = mysqli_query($conn1,$query);
$column = mysqli_fetch_array($result);
$nama = $column[0];
$krs = "krs_".strtolower(str_replace(".", "", $nim));
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title> Mahasiswa </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <!--Navbar-->
      <nav class="navbar navbar-dark navbar-custom navbar-expand-lg fixed-top" id="mainNav">
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
        <a href="#" class="active">Home</a>
        <form id="Click" action = "proses.php" method = "POST">
          <input type = "hidden" name="view_absensi">
          <a href="#" onclick="document.getElementById('Click').submit();">Absensi<span class="sr-only">(current)</span></a>
        </form>
      </div>

      <!-- Page content -->
      <div class="content" style="margin-top:62px;">
       <!--Table-->
       <br>
        <h2><?php echo $nama?></h2>
        <h3><?php echo $nim?></h3>
        <hr>
        <?php
        $query_kelas = "SELECT * FROM $krs ORDER BY dow_id ASC, jam_mulai ASC"; //select table in database
        $result2 = mysqli_query($conn2,$query_kelas);
        $rows=array();
        while ($kelas=mysqli_fetch_assoc($result2))
        {
          $kode_kelas = $kelas['kode_kelas'];
          $nama_kelas = $kelas['nama_kelas'];
          $id = str_replace(".", "", $kode_kelas);
          $jam_mulai = substr($kelas['jam_mulai'], 0, -3);
          $jam_selesai = substr($kelas['jam_selesai'], 0, -3);
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
                  <?php $query_pengumuman = "SELECT pengumuman from kelas WHERE kode_kelas = '$kode_kelas'";
                        $result_data = mysqli_query($conn2,$query_pengumuman);
                        $data = mysqli_fetch_assoc($result_data);
                        echo '<B>Pengumuman:</B><br>';
                        echo $data['pengumuman'];
                  ?>
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
