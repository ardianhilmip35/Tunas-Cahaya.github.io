<?php
    require ('../koneksi.php');
    // $koneksi = new mysqli("localhost", "root", "", "tunascahaya");
 
        $id = $_GET['id_pelanggan'];
        mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_pelanggan='$id'");
    
        header('Location: tampilanawal_pelanggan.php');
?>