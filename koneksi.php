<?php
    $server="localhost";
    $username="u1694897_d_reg_5";
    $password="jtipolije";
    $db="u1694897_d_reg_5_db";
    $koneksi = mysqli_connect($server, $username, $password, $db);
        if(mysqli_connect_errno()){
            echo "Koneksi Gagal : ".mysqli_connect_error();
        }
?>