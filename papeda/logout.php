<?php
session_start();

// untuk penjual
if (isset($_SESSION['id_penjual'])) {
    // Hapus variabel sesi penjual
    unset($_SESSION['id_penjual']);
    // Hancurkan sesi
    session_destroy();
}

// untuk pembeli
if (isset($_SESSION['id_pembeli'])) {
    // Hapus variabel sesi pembeli
    unset($_SESSION['id_pembeli']);
    // Hancurkan sesi
    session_destroy();
}

// untuk admin
if (isset($_SESSION['id_admin'])) {
    // Hapus variabel sesi admin
    unset($_SESSION['id_admin']);
    // Hancurkan sesi
    session_destroy();
}

// Redirect ke halaman login atau beranda setelah logout
header("Location: index.php");
exit();

?>
