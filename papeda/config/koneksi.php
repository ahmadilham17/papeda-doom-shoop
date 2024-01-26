<?php
    $host = "localhost"; // Ganti dengan nama host database Anda
    $username = "root"; // Ganti dengan nama pengguna database Anda
    $password = ""; // Ganti dengan kata sandi database Anda
    $database = "papedadoomshop"; // Ganti dengan nama database Anda

    $koneksi = new mysqli($host, $username, $password, $database);

    // Periksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }
?>