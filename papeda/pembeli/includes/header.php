<?php

	include '../config/koneksi.php';

	// Ambil ID Pembeli dari sesi 
    $id_pembeli = isset($_SESSION['id_pembeli']) ? $_SESSION['id_pembeli'] : '';

	//menghitung jumlah produk di keranjang
	$ambil= $koneksi->query("SELECT id_pembeli, COUNT(*) as jumlah_produk
	FROM keranjang
	WHERE id_pembeli = '$id_pembeli'
	GROUP BY id_pembeli");

	$jumlah = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/style/main.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/admin/vendor/fontawesome-free/css/all.min.css">
	<title>Papeda Doom Shop | Homepage</title>
</head>
<body>

	<header>
		<nav class="main-nav">
			<div class="brand text-main">
				<a href="#">
					<h1>Papeda Doom Shop</h1>
				</a>
			</div>
			<div class="links">
				<ul>
					<li><a href="#">Kategori</a></li>
					<li><a href="index.php">Shop</a></li>
					<li><a href="#">Tentang</a></li>
					<li><a href="../logout.php">Logout</a></li>
					<li><a href="#">
						<img src="../assets/icons/search.svg" alt="search">
					</a>
					<input type="search" class="search">
					</li>
				</ul>
			</div>
			<div class="icon-for-user">
				<a href="profile.php">
					<img src="../assets/icons/person.svg" alt="person">
				</a>
				<a href="keranjang.php">
					<img src="../assets/icons/shop-bag.svg" alt="person"><?php echo $jumlah['jumlah_produk']; ?>
				</a>
			</div>
			<div class="menu">
				<img src="../assets/icons/menu.svg" alt="menu">
			</div>
		</nav>
	</header><!-- /header -->
	<main>