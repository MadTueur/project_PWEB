<?php

$host="localhost"; // Variabel yang menyimpan nama host database
$user="root"; // Variabel yang menyimpan nama pengguna database
$password=""; // Variabel yang menyimpan kata sandi untuk mengakses database
$db="crud";

$kon = mysqli_connect($host,$user,$password,$db); //Membuat koneksi ke database menggunakan fungsi
if (!$kon){ //Memeriksa apakah koneksi berhasil atau gagal
        die("Koneksi Gagal:".mysqli_connect_error());
        
}
?>