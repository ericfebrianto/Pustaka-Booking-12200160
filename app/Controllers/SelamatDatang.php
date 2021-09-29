<?php
namespace App\Controllers;

class SelamatDatang extends BaseController {

    public function hal_awal(){
        return 'hello saya belajar CI4';
    }
    public function beranda_login(){
        return view('halaman/login');
    }
    public function daftar_member(){
        return view('/halaman/daftar_member');
    }
}    