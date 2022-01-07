<?php
    require ('../koneksi.php');
 
        // require ('koneksi.php');
        $id = $_GET['id_katalog'];
        mysqli_query($koneksi, "DELETE FROM tb_katalog WHERE id_katalog='$id'");
    
        header('Location: tampilanawal_katalog.php');
        
?>