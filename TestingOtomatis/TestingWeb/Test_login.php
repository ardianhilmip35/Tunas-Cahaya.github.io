<?php
//Framework PHPUnit
use PHPUnit\Framework\TestCase;

// require class yang akan ditest
require_once "LoginMock.php";
    class Test_login extends TestCase {
        //fungsi testLoginPost()
        public function testLoginPost() {
            //objek baru dari LoginMock()
            $insert = new LoginMock();

            //username dan password sesuai dengan database
            $username="tantiwulansari2603@gmail.com";
            $password="sekretaris001";
            $hasil= $insert->loginkaryawan($username,$password);

            //memeriksa nilai yang dihasilkan dari fungsi apakah sudah sesuai
            //jika benar akan menampilkan berhasil
            $this->assertEquals($hasil,'berhasil');
        }
    }