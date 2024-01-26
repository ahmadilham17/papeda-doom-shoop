<?php
include '../config/koneksi.php';

// Pemeriksaan sesi
session_start();

if (!isset($_SESSION['username'])) {
    // Jika sesi tidak ada, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}

 // Ambil ID_penjual dari sesi (sesuaikan dengan struktur sesi Anda)
 $id_penjual = isset($_SESSION['id_penjual']) ? $_SESSION['id_penjual'] : '';

$ambil = $koneksi->query("SELECT * FROM penjual 
INNER JOIN toko ON penjual.id_toko = toko.id_toko
WHERE id_penjual = $id_penjual");
$data_penjual = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Penjual</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-1">papedadoomshop <sup><?php echo $data_penjual ['nama_toko'] ?></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>


            <!--Data rekening -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?rekening">
                <i class="fas fa-solib fa-money-check"></i>
                    <span> Rekening</span>
                </a>
            </li>

             <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?produk">
                    <i class="fas fa-cubes"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Nav Item - Pembelian -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?pembelian">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pembelian</span>
                </a>
            </li>

            <!-- Nav Item -Logout-->
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data_penjual['nama_penjual'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="images/profile/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <?php

                    //Profile
                    if(isset($_GET['profile'])){
                        include 'profile.php';
                    }
                    //edit profile
                    elseif(isset($_GET['edit_profile'])){
                        include 'edit/edit_profile.php';
                    }

                    //rekening
                    elseif(isset($_GET['rekening'])){
                        include 'rekening.php';
                    }
                    elseif(isset($_GET['tambah_bank'])){
                        include 'tambah/tambah_bank.php';
                    }
                    elseif(isset($_GET['edit_bank'])){
                        include 'edit/edit_bank.php';
                    }
                    elseif(isset($_GET['hapus_bank'])){
                        include 'hapus/hapus_bank.php';
                    }


                    // data produk
                    elseif(isset($_GET['produk'])){
                        include 'produk.php';
                    }
                    elseif(isset($_GET['tambah_produk'])){
                        include 'tambah/tambah_produk.php';
                    }
                    elseif(isset($_GET['edit_produk'])){
                        include 'edit/edit_produk.php';
                    }
                    elseif(isset($_GET['hapus_produk'])){
                        include 'hapus/hapus_produk.php';
                    }
                    elseif(isset($_GET['detail_produk'])){
                        include 'detail/detail_produk.php';
                    }
                    
                    // DATA WARNA,UKURAN,GAMBAR
                    //tambah warna
                    elseif(isset($_GET['tambah_warna'])){
                        include 'tambah/tambah_warna_produk.php';
                    }

                    //hapus warna
                    elseif(isset($_GET['hapus_warna'])){
                        include 'hapus/hapus_warna_produk.php';
                    }

                    //tambah ukuran
                    elseif(isset($_GET['tambah_ukuran'])){
                        include 'tambah/tambah_ukuran_produk.php';
                    }

                    //hapus ukuran
                    elseif(isset($_GET['hapus_ukuran'])){
                        include 'hapus/hapus_ukuran_produk.php';
                    }

                    //tambah gambar
                    elseif(isset($_GET['tambah_gambar'])){
                        include 'tambah/tambah_gambar_produk.php';
                    }

                    //hapus gambar
                    elseif(isset($_GET['hapus_gambar'])){
                        include 'hapus/hapus_gambar_produk.php';
                    }

                    // data pembelian
                    elseif(isset($_GET['pembelian'])){
                        include 'pembelian.php';
                    }

                     // data detail pembelian
                     elseif(isset($_GET['detail_pembelian'])){
                        include 'detail/detail_pembelian.php';
                    }
                    
                    // data detail pembelian
                    elseif(isset($_GET['riwayat'])){
                        include 'riwayat.php';
                    }
                    // data detail pembelian
                    elseif(isset($_GET['hapus_pembelian'])){
                        include 'hapus/hapus_pembelian.php';
                    }
                    // data detail pembelian
                    elseif(isset($_GET['detail_riwayat'])){
                        include 'detail/detail_riwayat.php';
                    }

                    else{
                        include 'dashboard.php';
                    }
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PapedaDoomShop 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/admin/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="../assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/admin/js/demo/datatables-demo.js"></script>

    <!-- crousel -->
    <script str="../assets/admin/js/owl.carousel.min.css"></script>
    <script str="../assets/admin/js/owl.carousel.min.js"></script>
    <script str="../assets/admin/js/owl.theme.default.min.css"></script>

    <script>

        $(document).ready(function(){
            //menambahkan input warna
            $(".btn-warna").on("click",function(){
                $(".input-warna").append(" <input type='text' name='warna_produk[]' class='form-control' placeholder='Warna produk'>");
            });

            //menambahkan input ukuran
            $(".btn-ukuran").on("click",function(){
                $(".input-ukuran").append(" <input type='text' name='ukuran_produk[]' class='form-control' placeholder='ukuran produk'>");
            });

            //menambahkan input foto
            $(".btn-foto").on("click",function(){
                $(".input-foto").append(" <input type='file' name='foto_produk[]' class='form-control'>");
            });
        
        });
    </script>

</body>

</html>