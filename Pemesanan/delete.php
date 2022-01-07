<?php
    require ('../koneksi.php');
 
        //require ('koneksi.php');
        $id = $_GET['id_detail'];
        mysqli_query($koneksi, "DELETE FROM tb_detailpemesanan WHERE id_detail='$id'");
    
        header('Location: tampilanawal_pemesanan.php');
?>