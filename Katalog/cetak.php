<?php
	
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h2>Data Pemesanan</h2>
        <br>
    </center>
    <center>
    <table class="table table-bordered" width="100%" cellspacing="0" border="1">
        <tr align="center" style="background-color: #1E3163; color: white;">
            <th width="50px;" height="40px;">ID</th>
            <th width="500px;" height="40px;">Nama Bangunan</th>
            <th width="450px;" height="40px;">Kategori</th>
            <th width="450px;" height="40px;">Gambar</th>
            <th width="450px;" height="40px;">Deskripsi</th>
            <th width="450px;" height="40px;">Alamat</th>
                                
        </tr>
        <?php
        if (isset($_POST['cari'])) {
            $key = $_POST['keyword'];
        $result = mysqli_query($koneksi, "SELECT * FROM tb_katalog WHERE id_katalog LIKE '%$key%'");
        } else {
          $query = "SELECT * FROM tb_katalog";
          $result = mysqli_query($koneksi, $query);
        }

        ?>
        <?php
            $query = "SELECT * FROM tb_katalog";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                    $IDKatalog = $row['id_katalog'];
                    $NamaBangunan = $row['nama_bangunan'];
                    $Kategori = $row['Kategori'];
                    $Gambar = $row['gambar'];
                    $Deskripsi = $row['deskripsi'];  
                    $Alamat = $row['alamat'];
        ?>
                            
        <tr>
            <td align="center"><?php echo $IDKatalog; ?></td>
            <td align="center"><?php echo $NamaBangunan; ?></td>
            <td align="center"><?php echo $Kategori; ?></td>
            <td align="center"><?php echo $Gambar; ?></td>
            <td align="center"><?php echo $Deskripsi; ?></td>
            <td align="center"><?php echo $Alamat; ?></td>
                                
        </tr>
        <?php
            $no++; 
                } ?>
        </table>
    </center>
    <script>
        window.print()
    </script>
    
</body>
</html>