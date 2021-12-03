<?php
    class Login {
        //fungsi loginkarywan dengan 2 parameter yaitu username dan password
        function loginkaryawan($username, $password){
            // include file koneksi untuk menghubungkan php dengan database
            include 'koneksi.php';

            // menyeleksi data user/karyawan dengan mengakses tabel karyawan yang ada dalam database
            $login = mysqli_query($koneksi,"select * from tb_karyawan where email='$username' and password='$password'");
            // menghitung jumlah data yang ditemukan
            $ambil = mysqli_num_rows($login);

            // cek apakah username dan password di temukan pada database
            if($ambil>0){
                $data = mysqli_fetch_assoc($login);

                //jika login berhasil maka akan menampilkan kata berhasil
                return 'berhasil';

            }else{
                //jika gagal maka akan tampil kata gagal login
                return 'gagal login';
            }
        }
    }
?>