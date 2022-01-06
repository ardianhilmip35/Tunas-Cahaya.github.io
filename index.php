<?php
  session_start();
  // koneksi ke database
  // $koneksi = new mysqli("localhost", "root", "", "tunascahaya");
  require ('koneksi.php');
  
  if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT email FROM tb_karyawan WHERE id_karyawan=$id");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['email'])) {
      $_SESSION['id_karyawan'] = $id;
      $_SESSION['nama'] = $userName;
      $_SESSION['id_jabatan'] = $level;
    }
  }

  if(isset($_POST['login'])) {
    $email = $_POST['user'];
    $pass = $_POST['pass'];

    if(!empty(trim($email)) && !empty(trim($pass))) {
        $query = "SELECT * FROM tb_karyawan WHERE email = '$email'";
        $result = mysqli_query($koneksi, $query);
        $num = mysqli_num_rows($result);

        while ($row = mysqli_fetch_array ($result)) {
            $id = $row['id_karyawan'];
            $userVal = $row['email'];
            $passVal = $row['password'];
            $userName = $row['nama'];
            $level = $row['id_jabatan'];
        }

        if($num == 1) {
          $fetch_pass = mysqli_fetch_assoc($result);
          $cek_pass = $fetch_pass['password'];
          if ($cek_pass <> $pass) {
            echo"<script>alert('Password Salah');</script>";
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
          } else {
            echo"<script>alert('Login Berhasil');</script>";
          }
            if($userVal==$email && $passVal==$pass) {
              // header('Location: home.php?user_fullname='.urlencode($userName));
              $_SESSION['id_karyawan'] = $id;
              $_SESSION['nama'] = $userName;
              $_SESSION['id_jabatan'] = $level;

              //cek remember me
              if (isset($_POST['remember'])) {
                setcookie('id', $fetch_pass['id_karyawan'], time()+120);
                setcookie('key', hash('sha256', $fetch_pass['email']), time()+120);
              }
              header('Location: dashboard.php?user_fullname='.urlencode($userName));
            }
        } else {
        echo"<script>alert('Username Tidak Ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
    } else {
      echo"<script>alert('Data Tidak Boleh Kosong');</script>";
      echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Tempat Font Awesome-->
    <link href="/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" />

    <title>Tunas Cahaya Build</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm" style="background-color: #1e3163">
      <div class="container-fluid">
        <img src="img/Logo.png" alt="" width="85px" class="d-inline-block align-text-top pe-3 ps-2 mb-1" />
        <div class="navbar-nav me-auto">
          <ul class="navbar-nav">
              <a class="nav-link" aria-current="page" href="#" style="text-decoration: none; font-size: 20px; margin-left: 25px; color: #fff; font-weight: 600; letter-spacing: 1px">CV TUNAS CAHAYA</a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Login-->
    <section id="login" class="text-center">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="hero-image">
              <div class="login-text">
                <img src="img/Logo.png" alt="" width="230px" />
                <h1 class="fw-bold pt-2" style="color: #000; font-size: 40px">SELAMAT DATANG DI WEBSITE</h1>
                <h1 class="fw-bold pt-2" style="color: #000; font-size: 40px">CV TUNAS CAHAYA</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="form">
      <form method="POST" action="">
      <div class="container">
        <div class="row">
          <h2 class="text-center mb-5">Silahkan Masukkan Akun Anda</h2>
          <div class="form-floating mb-4">
            <input type="email" name="user" class="form-control" id="floatingInput" placeholder="name@example.com" style="border: 0.5px solid #000; background-color: #fafafa" />
            <label for="floatingInput" style="padding-left: 50px; color: #000">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" name="pass" class="form-control" id="floatingPassword" placeholder="Password" style="border: 0.5px solid #000; background-color: #fafafa" />
            <label for="floatingPassword" style="padding-left: 50px; color: #000">Password</label>
          </div>
          <div class="form-check" style="padding-left: 35px;">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" name="remember"/>
            <label class="form-check-label " for="flexCheckChecked"> Remember Me </label>
          </div>
          <button class="lead signin" type="submit" name="login">SIGN IN</button>
        </div>
      </div>
    </form>
    </section>
    <!-- Akhir Login -->
  </body>
</html>
