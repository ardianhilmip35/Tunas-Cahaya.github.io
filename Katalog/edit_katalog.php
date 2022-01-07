<?php
	// menghubungkan dengan koneksi database
	$koneksi = new mysqli("localhost", "root", "", "tunascahaya");
	session_start();
    //mengecek user pada session
	if(!isset($_SESSION['id_karyawan'])) {
		header('Location: ../login.php');
	}
            $sesID = $_SESSION['id_karyawan'];
            $sesName = $_SESSION['nama'];
            $jabatan  = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_karyawan.id_jabatan=tb_jabatan.id_jabatan WHERE id_karyawan='$sesID'");
            $rows = mysqli_fetch_array($jabatan);
            $sesLvl = $_SESSION['id_jabatan'];

        if (isset($_POST['update'])) {
            $IDKatalog = $_POST['id_katalog'];
            $NamaBangunan = $_POST['nama_bangunan'];
            $Kategori = $_POST['Kategori'];
            $Alamat = $_POST['alamat'];
            $Gambar = $namafoto;
            $Deskripsi = $_POST['deskripsi'];
            $namafoto = $_FILES["foto"]["name"];
            $lokasilokasifoto = $_FILES["foto"]["tmp_name"];
            // jika foto dirubah
            if(!empty($lokasilokasifoto)){
                move_uploaded_file($lokasilokasifoto, "../img/$namafoto");
                $query = "UPDATE `tb_katalog` SET `nama_bangunan` ='$NamaBangunan', Kategori ='$Kategori', gambar ='$namafoto',   deskripsi ='$Deskripsi', alamat ='$Alamat' WHERE tb_katalog.id_katalog='$IDKatalog'";;
                mysqli_query($koneksi, $query);
            } else {
                $query = "UPDATE `tb_katalog` SET `nama_bangunan` ='$NamaBangunan', Kategori ='$Kategori', deskripsi ='$Deskripsi', alamat ='$Alamat' WHERE tb_katalog.id_katalog='$IDKatalog'";
                mysqli_query($koneksi, $query);   
            }
            header('Location:tampilanawal_katalog.php?user_fullname='.$userName);
        }
            $IDKatalog = $_GET['id_katalog'];
            $query = "SELECT * FROM tb_katalog WHERE id_katalog='$IDKatalog'";
            $result = mysqli_query($koneksi, $query);

            while ($row = mysqli_fetch_array($result)) {
                $IDKatalog = $row['id_katalog'];
                $NamaBangunan = $row['nama_bangunan'];
                $Kategori = $row['Kategori'];
                $Alamat = $row['alamat'];
                $Gambar = $row['gambar'];
                $Deskripsi = $row['deskripsi'];
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
                             <a class="nav-link" aria-current="page" href="#" style="text-decoration: none; font-size: 20px; margin-left: -410px; color: #fff; font-weight: 600; letter-spacing: 1px">CV TUNAS CAHAYA</a>
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
                         <p class="navbar-brand h3 ms-2" style="text-align: center; color: black"><?php echo $rows['nama_jabatan']; ?></p>
                     </span>
                 </div>
                 <menu>
                     <ul class="menu-content" >
                     <?php
							if($sesLvl <= 4) { ?>
								<li><a class="nav-link active" aria-current="true" href="../dashboard.php" style="padding:20px; padding-top: 10px;"><i class="fa fa-home" style="margin-right: 10%;"></i><span class="ms-2"><b>Dashboard</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Karyawan/tampilanawal_karyawan.php " style="padding:20px;"><i class="fas fa-users" style="margin-right: 10%;"></i><span class="ms-2">Data Karyawan</span></i></a></li>
								<li><a class="nav-link active" aria-current="true" href="../Pemesanan/tampilanawal_pemesanan.php" style="padding:20px;"><i class="fas fa-file-chart-line" style="margin-right: 10%;"></i><span class="ms-3">Data Pemesanan</span></a></li>
								<li><a class="nav-link active" aria-current="true" href="tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images"  style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
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
								<li><a class="nav-link active" aria-current="true" href="tampilanawal_katalog.php" style="padding:20px;"><i class="fas fa-images" style="margin-right: 10%;"></i><span class="ms-2">Data Katalog</span></a></li>
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
                                     <h5 style="color: #fff;"><b>Edit Katalog</b></h5>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row" style="width: 50%; margin-left: 20%; ">
                             <div class="col-sm-6" style="padding-bottom:40px;">
                                 <div class="card-style" style="background-color: #B2DFFB; height: 560px; width:310%">
                                     <div class="card-body">
                                        <form action="edit_katalog.php" method="POST" enctype="multipart/form-data">
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>ID KATALOG</b></label>
                                             <input type="text" name="id_katalog" placeholder="" style="margin-left: 50px; width: 70%;" value="<?php echo $IDKatalog; ?>"/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>NAMA BANGUNAN</b></label>
                                             <input type="text" name="nama_bangunan" placeholder="" style="margin-left: 50px; width: 70%;" value="<?php echo $NamaBangunan; ?>"/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>KATEGORI</b></label>
                                        <select name="Kategori"  style="margin-left: 50px; width: 15%;" value="<?php $Kategori ?>">
											<option ><?php echo $Kategori?></option>
											<option value="Mall">Mall</option>
											<option value="Tempat Ibadah">Tempat Ibadah</option>
											<option value="Sekolah">Sekolah</option>
										</select>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>ALAMAT</b></label>
                                             <input type="text" name="alamat" placeholder="" style="margin-left: 50px; width: 70%;" value="<?php echo $Alamat; ?>"/>
                                         </p>
                                         <p>
                                            <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>FOTO PRODUK</b></label>
                                            <img src="../img/<?= $row['gambar'];?>" name="gambarLama" width="100" style="margin-left: 50px;">
                                        <p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>GAMBAR</b></label>
                                             <input type="file" name="foto" placeholder="" style="margin-left: 50px; width: 67%;"/>
                                         </p>
                                         <p>
                                             <label style="background-color: #1E3163; color: #fff; width: 160px; height: 30px; text-align: center; margin-left: 50px; margin-top: 10px;"><b>DESKRIPSI</b></label>
											 <input type="text" name="deskripsi" id="" cols="" rows="" style="margin-left: 50px; width: 70%;" value="<?php echo $Deskripsi; ?>"></input>
                                         </p>
 
                                         <a href="#" style="text-decoration: none; color: black;">
                                             <button type="submit" name="update" class="btn btn-primary" style="margin-left: 73%; background-color: #1E3163; width: 10%;  color: white;">
                                             <b>Simpan</b></button>
                                         </a>
                                         <a href="tampilanawal_katalog.php" style="text-decoration: none; color: black;">
                                            <button type="button" value="" class="btn btn-primary" style="margin-left: 1%; background-color: #1E3163; width: 10%;  color: white;">
                                            <b>Kembali</b></button>
                                         </a>
                                        </form>
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
 <?php } ?>