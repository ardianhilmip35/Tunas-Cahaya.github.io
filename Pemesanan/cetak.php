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
                                <th width="50px;" height="40px;">ID PEMESANAN</th>
                                <th width="500px;" height="40px;">NAMA BANGUNAN</th>
                                <th width="500px;" height="40px;">TOTAL HARGA</th>
                                <th width="500px;" height="40px;">CICILAN</th>
                                <th width="500px;" height="40px;">HARGA CICILAN</th>
                                <th width="500px;" height="40px;">TANGGAL PEMBAYARAN</th>
                                <th width="500px;" height="40px;">STATUS</th>
                                
                            </tr>
                            <?php
                            if (isset($_POST['cari'])) {
                              $key = $_POST['keyword'];
                              $result = mysqli_query($koneksi, "SELECT * FROM tb_detailpemesanan WHERE nama LIKE '%$key%'");
                            } else {
                              $query = "SELECT * FROM tb_detailpemesanan";
                              $result = mysqli_query($koneksi, $query);
                            }
                            ?>
                            <?php
                                $query = "SELECT * FROM tb_detailpemesanan";
                                $result = mysqli_query($koneksi, $query);
                                $no = 1; 
                                    while ($row = mysqli_fetch_array($result)) {
                                        $userID_pemesanan = $row['id_pemesanan'];
                                        $userNama_bangunan = $row['nama_bangunan'];
                                        $userTtl_harga = $row['total_harga'];
                                        $userCicilan = $row['cicilan'];
                                        $userHrg_Cicilan = $row['hrg_cicilan'];
                                        $userTgl_pembayaran = $row['tanggal_pembayaran'];
                                        $userStatus = $row['status'];
                            ?>
                            
                            <tr>
                                <td align="center"><?php echo $userID_pemesanan; ?></td>
                                <td align="center"><?php echo $userNama_bangunan; ?></td>
                                <td align="center"><?php echo $userTtl_harga; ?></td>
                                <td align="center"><?php echo $userCicilan; ?></td>
                                <td align="center"><?php echo $userHrg_Cicilan; ?></td>
                                <td align="center"><?php echo $userTgl_pembayaran; ?></td>
                                <td align="center"><?php echo $userStatus; ?></td>
                                
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