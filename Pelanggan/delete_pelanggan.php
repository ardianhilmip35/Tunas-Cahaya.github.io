<?php
    require ('../koneksi.php');
 
        $id = $_GET['id_pelanggan'];
        mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_pelanggan='$id'");
    
        header('Location: tampilanawal_pelanggan.php');
?>