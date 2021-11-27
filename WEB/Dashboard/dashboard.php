

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Tempat CSS-->
    <link rel="stylesheet" href="style.css" />

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
					<img src="logo.png" alt="logo" width="30" height="30">
					<span class="navbar-brand h3 ms-2">CV TUNAS CAHAYA</span>
				</a> 
				<form class="d-flex" style="margin-left: 40%;">
					<span style="color: white">
						<i class="fas fa-user-circle h3 " ></i>
						<span class="navbar-brand h3 ms-2">Tanti Wulansari</span>
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
				<p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><b>Tanti Wulansari</b></p>
				<p class="navbar-brand h3 ms-2" style="text-align: center; color: black">Admin</p>
			</span>
		</div>
        <menu>
			<ul class="menu-content" >
				
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fa fa-home"></i><span class="ms-2"><b>Dashboard</span></a></li>
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fas fa-users"></i><span class="ms-2">Data Karyawan</span></i></a></li>
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fas fa-file-chart-line"></i><span class="ms-3">Data Keuangan</span></a></li>
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fas fa-images"></i><span class="ms-2">Data Katalog</span></a></li>
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fas fa-users-class"></i><span class="ms-1">Data Pelanggan</span></a></li>
				<li><a class="nav-link active" aria-current="true" href="#"><i class="fas fa-sign-out-alt"></i><span class="ms-2">Log Out</b></span></a></li>
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
						<div class="card-style" style="background-color: #B2DFFB; height:104%; width:310%">
							<div class="card-body">
								<div class="row row-cols-1 row-cols-md-2 g-4">
									<div class="col">
										<div class="card" style="width: 90%; margin-top: 3%;">
											<div class="card-body">
												<h5 class="card-title">Jumlah Karyawan</h5>
												<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
												<p class="card-text">Divisi I : </p>
												<p class="card-text">Divisi II : </p>
												<p class="card-text">Divisi III : </p>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card" style="height: 92%; width: 90%; margin-top: 3%;">
											<div class="card-body">
												<h5 class="card-title">Jumlah Dana Tahun Ini</h5>
												<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
												<p class="card-text">Pemasukan : </p>
												<p class="card-text">Pengeluaran : </p>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card" style="width: 90%">
											<div class="card-body">
												<h5 class="card-title">Jumlah Katalog</h5>
												<a href="#" class="btn btn-primary" style="background-color: #1E3163; margin-left: 95%;">View</a>
												<p class="card-text">Tipe Masjid : </p>
												<p class="card-text">Tipe Mall : </p>
												<p class="card-text">Tipe Sekolah : </p>
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