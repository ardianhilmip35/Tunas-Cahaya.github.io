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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Tempat Font Awesome-->
    <link href="/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet" />
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
                    // while ($row = mysqli_fetch_array($result)) {
                        //   $userMail = $row['user_email'];
                        // $userName = $row['user_fullname'];
                        // if($sesLvl == 1) {
                        //     $dis = "";
                        // } else {
                        //     $dis = "disabled";
                        // }  
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
                    <!-- <td>
                    <a href="edit.php?id=<?php echo $row['id_karyawan']; ?>">
                            <button type="button" class="btn btn-success" value="Edit"><i class="fa fa-edit"></i> Edit</button></a> | 
                        <a href="delete.php?id=<?php echo $row['id']; ?>">
                            <button type="button" class="btn btn-danger" value="Hapus"><i class="fas fa-trash-alt"></i> Hapus</button></a>
                    </td> -->
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