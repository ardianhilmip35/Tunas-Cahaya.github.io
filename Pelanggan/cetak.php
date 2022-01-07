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
        <h2>Data Karyawan</h2>
        <br>
    <table class="table table-bordered" width="100" cellspacing="0" border="1">
                            <tr align="center" style="background-color: #1E3163; color: white;">
                                <th width="50px;" height="40px;">ID</th>
                                <th width="500px;" height="40px;">Nama</th>
                                <th width="450px;" height="40px;">Jabatan</th>
                                <th width="450px;" height="40px;">Email</th>
                                <th width="450px;" height="40px;">Password</th>
                                <th width="450px;" height="40px;">No. Telp</th>
                                <th width="450px;" height="40px;">Alamat</th>
                            </tr>
                            <?php
                                $query = "SELECT * FROM tb_karyawan";
                                $result = mysqli_query($koneksi, $query);
                                $no = 1;

                                    while ($row = mysqli_fetch_array($result)) {
                                        $userID = $row['id_karyawan'];
                                        $userName = $row['nama'];
                                        $userJabatan = $row['id_jabatan'];
                                        $userMail = $row['email'];
                                        $userPass = $row['password'];  
                                        $userTelp = $row['nomerhp'];
                                        $userAlamat = $row['alamat'];
                            ?>
                            <tr>
                                <td align="center"><?php echo $userID; ?></td>
                                <td align="center"><?php echo $userName; ?></td>
                                <td align="center"><?php echo $userJabatan; ?></td>
                                <td align="center"><?php echo $userMail; ?></td>
                                <td align="center"><?php echo $userPass; ?></td>
                                <td align="center"><?php echo $userTelp; ?></td>
                                <td align="center"><?php echo $userAlamat; ?></td>
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