<?php
	// menghubungkan dengan koneksi database
	// $koneksi = new mysqli("localhost", "root", "", "tunascahaya");
  require ('../koneksi.php');
  
	session_start();
    //mengecek user pada session
	if(!isset($_SESSION['id_karyawan'])) {
		header('Location: ../index.php');
	}
            $sesID = $_SESSION['id_karyawan'];
            $sesName = $_SESSION['nama'];
            $jabatan  = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan WHERE id_karyawan='$sesID'");
            $row = mysqli_fetch_array($jabatan);
            $sesLvl = $_SESSION['id_jabatan'];
 ?>
 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

		<!-- Tempat CSS-->
		<link rel="stylesheet" href="../style.css"/>

		<!-- Tempat Font Awesome-->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

		<title>Tunas Cahaya Build</title>
	</head>
	<body style="background-color:#ffffff">
		<!-- AWAL WRAPPER -->
		<div id="wrapper">
			<!-- NAVBAR -->
			<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1E3163;">
					<div class="container-fluid">
						<a class="navbar-brand" href="#">
							<img src="../img/Logo.png" alt="" width="85px" class="d-inline-block align-text-top pe-3 ps-2 mb-1" />
							<a class="nav-link" aria-current="page" href="#" style="text-decoration: none; font-size: 20px; margin-left: -420px; color: #fff; font-weight: 600; letter-spacing: 1px">CV TUNAS CAHAYA</a>
						</a> 
						<form class="d-flex" style="margin-left: 40%;">
							<span style="color: white">
								<i class="fas fa-user-circle h3 " ></i>
								<span class="navbar-brand h3 ms-2"><?php echo $sesName; ?></span>
							</span>
							</button>
						</form>
						
					</div>
				</div>
			</nav>
			<!-- AKHIR NAVBAR -->
			
			<!-- /. AWAL NAV SIDE  -->
			<aside class="sidebar">
				<div class="user" style="background-color: #B2DFFB; height: 30%;">
					<span style="color: white">
						<p style="text-align: center; "><i class="fas fa-user-circle fa-5x" style="margin-top: 10%;" ></i>
						<p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><b><?php echo $sesName; ?></b></p>
						<p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><?php echo $row['nama_jabatan']; ?></p>
					</span>
				</div>
				<menu>
					<ul class="menu-content" >
            <?php
							if($sesLvl <= 4) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Karyawan/tampilanawal_karyawan.php " style="padding:20px;"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pemesanan/tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images"  style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="tampilanawal_pelanggan.php" style="padding:20px;"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 7) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pemesanan/tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;"  onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 9) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php }
						?>
          </ul>
				</menu>
			</aside>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row" style="width: 50%; margin-left: 20%; margin-top: 3%;">
                        <div class="col-sm-6" style="padding-bottom:40px;">
                            <div class="card-style" style="background-color: #1E3163; width:310%; height: 100%;">
                                <div class="card-body">
                                <h5 style="color: #fff;"><b>Data Pelanggan</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" style="margin-left:74%; margin-bottom: -2%">
                          <input type="text" name="keyword" placeholder="Cari data" style="padding: 4px; margin-bottom: 20px;"/>
                          <button type="submit" name="cari" class="btn btn-primary" style="background-color: #1E3163;"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
          <section class="content" style="margin-top: -2%">
            <div class="container-fluid">
              <div class="row">
                <div class="col-11">
                  <div class="card" style="margin-left: 5%; margin-top: -5%">
                    <!-- /.card-header -->
                    <!-- <div class="card-body" > -->
                      <table class="table table-bordered" width="100" cellspacing="0" border="1">
                            <tr align="center" style="background-color: #1E3163; color: white;">
                                <!-- <th width="50px;" height="40px;">Pilih</th> -->
                                <!-- <th width="50px;" height="40px;">NO</th> -->
                                <th width="50px;" height="40px;">No</th>
                                <th width="500px;" height="40px;">Nama</th>
                                <th width="450px;" height="40px;">Email</th>
                                <th width="450px;" height="40px;">No Telp</th>
                                <th width="450px;" height="40px;">Password</th>
                                <th width="450px;" height="40px;">Alamat</th>
                                <th width="11%;" height="40px;">Aksi</th>
                            </tr>
                            <?php
                            include '../koneksi.php';
                            $batas = 5;
                            $banyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_user"));
                            $banyakHal = ceil($banyakData / $batas); 
                            if (isset($_GET['halaman'])) {
                              $halamanAktif = $_GET['halaman'];
                            } else {
                              $halamanAktif = 1;
                            }
                            $dataAwal = ($halamanAktif * $batas) - $batas;
                            $no=1;
                            $result = mysqli_query($koneksi, "SELECT * FROM tb_user LIMIT $dataAwal, $batas");

                            if (mysqli_num_rows($result)) {
                                  // while ($row = mysqli_fetch_array($result)) {
                                  //     $userMail = $row['user_email'];
                                  //     $userName = $row['user_fullname'];
                                  //   if($sesLvl == 1) {
                                  //       $dis = "";
                                  //   } else {
                                  //       $dis = "disabled";
                                  //   }
                                    if (isset($_POST['cari'])) {
                                      $key = $_POST['keyword'];
                                      $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nama LIKE '%$key%' LIMIT $dataAwal, $batas");
                                    } else {
                                      $result = mysqli_query($koneksi, "SELECT * FROM tb_user LIMIT $dataAwal, $batas");
                                    }
                                    while ($row = mysqli_fetch_array($result)) {
                                        // $userID = $row['id_karyawan'];
                                        // $userName = $row['nama'];
                                        // $userJabatan = $row['id_jabatan'];
                                        // $userMail = $row['email'];
                                        // $userPass = $row['password'];  
                                        // $userTelp = $row['nomerhp'];
                                        // $userAlamat = $row['alamat'];
                            ?>
                            <tr>
                                <!-- <td align="center">
                                  <input class="form-check-input" type="checkbox" name="id[]" value='$row[id_karyawan]'/>
                                </td> -->
                                <td align="center"><?php echo $no?></td>
                                <td><?php echo $row['nama']?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td align="center"><?php echo $row['nomerhp'] ?></td>
                                <td><?php echo $row['user_password'] ?></td>
                                <td><?php echo $row['alamat_user'] ?></td>
                                <td>
                                    <a href="delete_pelanggan.php?id_pelanggan=<?php echo $row['id_pelanggan']; ?>">
                                        <button type="button" class="btn btn-danger" value="Hapus" onclick="return confirm ('Apakah Anda Yakin Untuk Menghapus Data?')" style="margin-left: 32px;"><i class="fas fa-trash-alt"></i></button></a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                                 }} else {
                                  echo '<tr><td colspan="7" style="text-align: center;">Tidak ada data yang anda cari</td></tr>';
                                } ?>
                      </table>
                      <nav aria-label="Page navigation example">
                        <ul class="pagination" style="justify-content: center;">
                          <!-- Awal Tombol sebelumnya -->
                          <?php if ($halamanAktif <= 1) { ?>
                            <li class="page-item disabled">
                              <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>">Previous</a>
                            </li>
                          <?php } else { ?>
                            <li class="page-item">
                              <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1; ?>">Previous</a>
                            </li>
                          <?php } ?>
                          <!-- Akhir Tombol sebelumnya -->

                          <?php
                            for ($i=1; $i <= $banyakHal; $i++) { 
                          ?>
                          <li class="page-item">
                            <a class="page-link" href="?halaman=<?php echo $i ?>"><?php echo $i; ?></a>
                          </li>
                          <?php } ?>

                          <!-- Awal Tombol Sesudah -->
                          <?php if ($halamanAktif >= $banyakHal) { ?>
                            <li class="page-item disabled">
                              <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>">Next</a>
                            </li>
                          <?php } else { ?>
                            <li class="page-item">
                              <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1; ?>">Next</a>
                            </li>
                          <?php } ?>
                          <!-- Akhir Tombol Sesudah -->
                          
                        </ul>
                      </nav>
                    <!-- </div> -->
                  <!-- /.card -->
                     </div>
                  </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        <!-- /.container-fluid -->
   </section>  
		<!-- /. WRAPPER  -->

			<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
			<!-- BOOTSTRAP SCRIPTS -->
			<script src="assets/js/bootstrap.min.js"></script>
			<!-- METISMENU SCRIPTS -->
			<script src="assets/js/jquery.metisMenu.js"></script>
			<!-- MORRIS CHART SCRIPTS -->
			<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
			<script src="assets/js/morris/morris.js"></script>
			<!-- CUSTOM SCRIPTS -->
			<script src="assets/js/custom.js"></script>
	</body>
</html>