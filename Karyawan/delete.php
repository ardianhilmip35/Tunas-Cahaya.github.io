<?php
    require ('../koneksi.php');
        $id = $_GET['id_karyawan'];
        mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id_karyawan='$id'");
        header('Location: tampilanawal_karyawan.php');
?>