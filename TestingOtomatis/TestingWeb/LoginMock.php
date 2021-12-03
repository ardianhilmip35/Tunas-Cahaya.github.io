<?php
    // class LoginMocl 
    class LoginMock {
        // fungsi loginkaryawan dengan parameter user dan password
        public function loginkaryawan($user, $password) {
            // Jika user sesuai maka akan muncul kata  berhasil
            if ($user == 'tantiwulansari2603@gmail.com')
                return 'berhasil';
            else
            // jika tidak maka akan muncul kata gagal
                return 'gagal';
        }
    }
?>