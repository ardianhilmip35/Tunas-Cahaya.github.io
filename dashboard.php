<?php
	// menghubungkan dengan koneksi database
	// $koneksi = new mysqli("localhost", "root", "", "tunascahaya");
	require ('koneksi.php');
	
	session_start();
    //mengecek user pada session
	if(!isset($_SESSION['id_karyawan'])) {
		header('Location: index.php');
	}
            $sesID = $_SESSION['id_karyawan'];
            $sesName = $_SESSION['nama'];
			$jabatan  = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan WHERE id_karyawan='$sesID'");
			$row = mysqli_fetch_array($jabatan);
            $sesLvl = $_SESSION['id_jabatan'];

	// mengambil data 
	$data_karyawan = mysqli_query($koneksi,"SELECT * FROM tb_karyawan");
	$data_pelanggan = mysqli_query($koneksi,"SELECT * FROM tb_user");
	$data_katalog = mysqli_query($koneksi,"SELECT * FROM tb_katalog");
	$data_pemesanan = mysqli_query($koneksi,"SELECT * FROM tb_pemesanan");
	
	// menghitung data 
	$jumlah_karyawan = mysqli_num_rows($data_karyawan);
	$jumlah_pelanggan = mysqli_num_rows($data_pelanggan);
	$jumlah_katalog = mysqli_num_rows($data_katalog);
	$jumlah_pemesanan = mysqli_num_rows($data_pemesanan);
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
		<link rel="stylesheet" href="style.css"/>

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
							<img src="img/Logo.png" alt="" width="85px" class="d-inline-block align-text-top pe-3 ps-2 mb-1" />
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
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="Karyawan/tampilanawal_karyawan.php " style="padding:20px;"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="Pemesanan/tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images"  style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="Pelanggan/tampilanawal_pelanggan.php" style="padding:20px;"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 7) { ?>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="Pemesanan/data_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;"  onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
							<?php } elseif($sesLvl <= 9) { ?>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;"  onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="dashboard.php" style="padding:20px;" onclick="alert('Anda Tidak Memiliki Akses Untuk Halaman Ini')"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="logout.php" onclick="return confirm ('Apakah Anda Yakin Untuk LogOut?')" style="padding:20px;"><i class="fas fa-sign-out-alt" style="margin-right: 10%;"></i><span class="ms-2">Log Out</b></span></a></li>
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
									<h5 style="color: #fff;"><b>Dashboard</b></h5>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="width: 50%; margin-left: 20%; ">
							<div class="col-sm-6" style="padding-bottom:40px;">
								<div class="card-style" style="background-color: #B2DFFB; height:110%; width:310%">
									<div class="card-body">
										<div class="row row-cols-1 row-cols-md-2 g-4">
											<div class="col">
												<div class="card" style="width: 90%; margin-top: 3%;">
													<div class="card-body">
														<h5 class="card-title"><b>Jumlah Karyawan</b></h5>
														<?php if($sesLvl <= 4) { ?>
															<a href="Karyawan/tampilanawal_karyawan.php" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 7) { ?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 9) {?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } ?>
														<p class="card-text" style="margin-top: 30px;">Jumlah Data Karyawan : <?php echo $jumlah_karyawan;?></p>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card" style="height: 88%; width: 90%; margin-top: 3%;">
													<div class="card-body">
														<h5 class="card-title"><b>Jumlah Pengguna</b></h5>
														<?php if($sesLvl <= 4) { ?>
															<a href="Pelanggan/tampilanawal_pelanggan.php" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 7) { ?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 9) {?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } ?>
														<p class="card-text" style="margin-top: 30px;">Jumlah Data Pengguna : <?php echo $jumlah_pelanggan;?></p>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card" style="width: 90%">
													<div class="card-body">
														<h5 class="card-title"><b>Jumlah Katalog</b></h5>
														<?php if($sesLvl <= 4) { ?>
															<a href="Katalog/tampilanawal_katalog.php" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 7) { ?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 9) {?>
															<a href="Katalog/tampilanawal_katalog.php" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } ?>
														<p class="card-text" style="margin-top: 30px;">Jumlah Data Katalog : <?php echo $jumlah_katalog;?></p>
													</div>
												</div>
											</div>
											<div class="col">
												<div class="card" style="width: 90%">
													<div class="card-body">
														<h5 class="card-title"><b>Jumlah Pemesanan</b></h5>
														<?php if($sesLvl <= 4) { ?>
															<a href="Pemesanan/pemesanan.php" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 7) { ?>
															<a href="Pemesanan/pemesanan.php	" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } elseif($sesLvl <= 9) {?>
															<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
														<?php } ?>
														<p class="card-text" style="margin-top: 30px;">Jumlah Data Pesanan: <?php echo $jumlah_pemesanan;?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>                 
					</div>
				</div>
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