<?php
    require ('../koneksi.php');
    // $koneksi = new mysqli("localhost", "root", "", "tunascahaya");
 
        //require ('koneksi.php');
        $id = $_GET['id_detail'];
       // mysqli_query($koneksi, "DELETE FROM tb_detailpemesanan WHERE id_detail='$id'");
    
        header('Location: tampilanawal_pemesanan.php');
?>