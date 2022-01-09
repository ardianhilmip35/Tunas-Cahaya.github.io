<?php
	// menghubungkan dengan koneksi database
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
								<li><a class="nav-link active" aria-current="true" href="tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Katalog/tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images"  style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pelanggan/tampilanawal_pelanggan.php" style="padding:20px;"><i class="fas fa-users-class" style="margin-right: 10%;"></i><span class="ms-1">Data Pelanggan</span></a></li>
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
                                <h5 style="color: #fff;"><b>Data Pemesanan</b></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" style="margin-left:74%; margin-bottom: -2%">
                          <input type="text" name="keyword" placeholder="Cari data" style="padding: 4px"/>
                          <button type="submit" name="cari" class="btn btn-primary" style="background-color: #1E3163;"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
          <section class="content">
            <div class="button">
                  <a href="cetak.php" target="_blank" style="text-decoration: none;">
                    <button type="button" value="" class="btn btn-primary" style="margin-left: 5%; margin-top: -14%; background-color: #B2DFFB; width: 10%; color: black;">
                    <b>CETAK</b></button>
                  </a>
                  <a href="pemesanan.php" style="text-decoration: none; color: black;">
                    <button type="button" value="Hapus" class="btn btn-primary" style="margin-left: 1%; margin-top: -14%; background-color: #B2DFFB; width: 10%;  color: black;">
                    <b>PEMESANAN</b></button>
                  </a>
            </div>
           
            <div class="container-fluid">
              <div class="row">
                <div class="col-11">
                  <div class="card" style="margin-left: 5%; margin-top: -5%">
                    <!-- /.card-header -->
                    <!-- <div class="card-body" > -->
                      <table class="table table-bordered" width="100" cellspacing="0" border="1">
                            <tr align="center" style="background-color: #1E3163; color: white;">
                                <th width="50px;" height="40px;">ID</th>
                                <th width="50px;" height="40px;">NAMA PELANGGAN</th>
                                <th width="500px;" height="40px;">NAMA BANGUNAN</th>
                                <th width="500px;" height="40px;">TOTAL HARGA</th>
                                <th width="500px;" height="40px;">CICILAN</th>
                                <th width="500px;" height="40px;">HARGA CICILAN</th>
                                <th width="500px;" height="40px;">TANGGAL PEMBAYARAN</th>
                                <th width="500px;" height="40px;">BUKTI PEMBAYARAN</th>
                                <th width="500px;" height="40px;">STATUS</th>
                                <th width="18%;" height="40px;">AKSI</th>
                            </tr>
                            <?php
                            //Pagination
                            include '../koneksi.php';
                            $batas = 3;
                            $banyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan"));
                            $banyakHal = ceil($banyakData / $batas); 
                              if (isset($_GET['halaman'])) {
                                $halamanAktif = $_GET['halaman'];
                              } else {
                                $halamanAktif = 1;
                              }
                            $dataAwal = ($halamanAktif * $batas) - $batas;
                            $no=1;
                            $result = mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan LIMIT $dataAwal, $batas");

                            if (mysqli_num_rows($result)) {  
                                    if (isset($_POST['cari'])) {
                                      $key = $_POST['keyword'];
                                      $result = mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan WHERE nama_bangunan LIKE '%$key%' LIMIT $dataAwal, $batas");
                                    } else {
                                      $result = mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan LIMIT $dataAwal, $batas");
                                    }
                                    while ($row = mysqli_fetch_array($result)) {
                                      $id_detail = $row['id_detail'];
                            ?>
                            <tr>
                                <td align="center"><?php echo $row['id_pemesanan'] ?></td>
                                <?php 
                                    $nama_pel  = mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan LEFT JOIN tb_user ON tb_detailpemesanan.id_pelanggan=tb_user.id_pelanggan WHERE id_detail='$id_detail'");
                                    $row = mysqli_fetch_array($nama_pel); 
                                  ?>
                                <td align="center"><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['nama_bangunan']?></td>
                                <td align="center"><?php echo $row['total_harga'] ?></td>
                                <td align="center"><?php echo $row['cicilan'] ?></td>
                                <td><?php echo $row['hrg_cicilan'] ?></td>
                                <td align="center"><?php echo $row['tanggal_pembayaran'] ?></td>
                                <td align="center">
                                  <img src="../retrofit/img/bukti/<?php echo $row['bukti_pembayaran']?>" width="100">
                                </td>
                                <td><?php echo $row['status'] ?></td>
                                <td align="center">
                                    <a href="edit_detailpemesanan.php?id_detail=<?php echo $row['id_detail']; ?>">
                                        <button type="button" class="btn btn-success" value="Edit"><i class="fa fa-edit"></i></button></a> | 
                                    <a href="delete.php?id_detail=<?php echo $row['id_detail']; ?>">
                                        <button type="button" class="btn btn-danger" value="Hapus" onclick="return confirm ('Apakah Anda Yakin Untuk Menghapus Data?')"><i class="fas fa-trash-alt"></i></button></a>
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