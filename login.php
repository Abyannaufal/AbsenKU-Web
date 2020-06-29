
<!DOCTYPE HTML>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" href="bootstrap-css.css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>Absenku LOGIN</title>
</head>
<body id="page-top" style="background-color:#0079C6;">
  <!--Carousel-->
  <!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="Test-1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Test-2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Test-3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#">ABSENKU</a>
      <!--<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Berita">Berita<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
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
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="false"></a>
          </li>
        </ul>
      </div>-->
    </div>
  </nav>

  <!--Login Form-->
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 login-form-1">
        <form method="POST" action="proses.php">
          <h3>Login Mahasiswa</h3>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your NIM *" name="nim" required/>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Your Password *" name="mhs_password" required/>
          </div>
          <div class="form-group">
            <input type="submit" class="btnSubmit" value="Login" />
          </div>
          <div class="form-group">
            <a href="#" class="btnForgetPwd1">Forget Password?</a>
          </div>
        </form>

      </div>
      <div class="col-md-6 login-form-2">

        <div class="login-logo">
          <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        </div>
        <h3>Login Dosen</h3>
        <form method="POST" action="proses.php">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your NIDN *" name="nidn" required />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Your Password *" name="dsn_password" required/>
          </div>
          <div class="form-group">
            <input type="submit" class="btnSubmit" value="Login" />
          </div>
          <div class="form-group">

            <a href="#" class="btnForgetPwd2" value="Login">Forget Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
