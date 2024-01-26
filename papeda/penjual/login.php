<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <!-- Pada bagian formulir HTML -->
                                    <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <!-- Pada bagian HTML untuk menampilkan pesan kesalahan -->
                                    <?php
                                            if (isset($_SESSION['error_message'])) {
                                                echo '<div class="text-center text-danger">' . $_SESSION['error_message'] . '</div>';
                                                unset($_SESSION['error_message']); // Hapus pesan kesalahan setelah ditampilkan
                                            }
                                            ?>

                                        <?php
                                        // Memproses login hanya jika formulir dikirimkan
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            include '../config/koneksi.php'; // Include the database connection file
                                            session_start();

                                            $email = $_POST["email"];
                                            $password = $_POST["password"];

                                            // Check login for penjual
                                            $querypenjual = "SELECT * FROM penjual WHERE email='$email' AND kata_sandi ='$password'";
                                            $resultpenjual = $koneksi->query($querypenjual);

                                            if ($resultpenjual->num_rows == 1) {
                                                // Login as penjual successful
                                                $rowpenjual = $resultpenjual->fetch_assoc();
                                                $_SESSION['id_penjual'] = $rowpenjual['id_penjual'];
                                                $_SESSION['username'] = $rowpenjual['email'];
                                                $_SESSION['role'] = 'penjual';
                                                header("Location: index.php");
                                                exit();
                                            }

                                            // Check login for pembeli
                                            $querypembeli = "SELECT * FROM pengguna WHERE email='$email' AND kata_sandi ='$password'";
                                            $resultpembeli = $koneksi->query($querypembeli);

                                            if ($resultpembeli->num_rows == 1) {
                                                // Login as pembeli successful
                                                $rowpembeli = $resultpembeli->fetch_assoc();
                                                $_SESSION['id_pengguna'] = $rowpembeli['id_pengguna'];
                                                $_SESSION['username'] = $rowpembeli['email'];
                                                $_SESSION['role'] = 'pembeli';
                                                header("Location: ../index.php");
                                                exit();
                                            }

                                            // Check login for admin
                                            $queryAdmin = "SELECT * FROM admin WHERE email ='$email' AND kata_sandi ='$password'";
                                            $resultAdmin = $koneksi->query($queryAdmin);

                                            if ($resultAdmin->num_rows > 0) {
                                                // Login as admin successful
                                                $rowAdmin = $resultAdmin->fetch_assoc();
                                                $_SESSION['id_admin'] = $rowAdmin['id_admin'];
                                                $_SESSION['username'] = $rowAdmin['email'];
                                                $_SESSION['role'] = 'admin';
                                                header("Location: index.php");
                                                exit();
                                            }

                                            // Login failed
                                            $_SESSION['error_message'] = "Email or password is incorrect"; // Set pesan kesalahan
                                            header("Location: " . $_SERVER['PHP_SELF']); // Redirect kembali ke halaman ini
                                            exit();

                                            $koneksi->close();
                                        }
                                        ?>

                                    <!-- Pada bagian HTML untuk menampilkan pesan kesalahan -->
                                    <?php
                                    session_start(); // Pastikan sudah ada di bagian atas file

                                    if (isset($_SESSION['error_message'])) {
                                        echo '<div class="text-center text-danger">' . $_SESSION['error_message'] . '</div>';
                                        unset($_SESSION['error_message']); // Hapus pesan kesalahan setelah ditampilkan
                                    }
                                    ?>

                                    <div class="text-center">
                                        <a class="small" href="register.php">Daftar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
