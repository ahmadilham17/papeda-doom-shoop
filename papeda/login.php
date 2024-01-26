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
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

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
                                            <input type="text" class="form-control form-control-user" id="inputEmail" placeholder="Enter Email or Username..." name="email_username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password" name="password">
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

                                            
                                            
                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                session_start(); // Pastikan sudah ada di bagian atas file
                                                include 'config/koneksi.php'; // Include the database connection file
                                            
                                                $email_username = $_POST["email_username"];
                                                $rawPassword = $_POST["password"];
                                            
                                                // Memeriksa login untuk penjual
                                                $queryPenjual = "SELECT id_penjual, username, kata_sandi FROM penjual WHERE email=? OR username=?";
                                                $stmtPenjual = $koneksi->prepare($queryPenjual);
                                                $stmtPenjual->bind_param("ss", $email_username, $email_username);
                                                $stmtPenjual->execute();
                                                $resultPenjual = $stmtPenjual->get_result();
                                            
                                                if ($resultPenjual->num_rows == 1) {
                                                    $rowPenjual = $resultPenjual->fetch_assoc();
                                            
                                                    // Memeriksa kecocokan kata sandi dengan password_verify
                                                    if (password_verify($rawPassword, $rowPenjual['kata_sandi'])) {
                                                        // Login penjual berhasil
                                                        $_SESSION['id_penjual'] = $rowPenjual['id_penjual'];
                                                        $_SESSION['username'] = $rowPenjual['username'];
                                                        $_SESSION['role'] = 'penjual';
                                                        header("Location: penjual/index.php");
                                                        exit();
                                                    }
                                                }
                                            
                                                // Memeriksa login untuk pembeli
                                                $queryPembeli = "SELECT id_pembeli, username, kata_sandi FROM pembeli WHERE email=? OR username=?";
                                                $stmtPembeli = $koneksi->prepare($queryPembeli);
                                                $stmtPembeli->bind_param("ss", $email_username, $email_username);
                                                $stmtPembeli->execute();
                                                $resultPembeli = $stmtPembeli->get_result();
                                            
                                                if ($resultPembeli->num_rows == 1) {
                                                    $rowPembeli = $resultPembeli->fetch_assoc();
                                            
                                                    // Memeriksa kecocokan kata sandi dengan password_verify
                                                    if (password_verify($rawPassword, $rowPembeli['kata_sandi'])) {
                                                        // Login pembeli berhasil
                                                        $_SESSION['id_pembeli'] = $rowPembeli['id_pembeli'];
                                                        $_SESSION['username'] = $rowPembeli['username'];
                                                        $_SESSION['role'] = 'pembeli';
                                                        header("Location: pembeli/index.php");
                                                        exit();
                                                    }
                                                }
                                            
                                                // Memeriksa login untuk admin
                                                $queryAdmin = "SELECT id_admin, username, kata_sandi FROM admin WHERE email=? OR username=?";
                                                $stmtAdmin = $koneksi->prepare($queryAdmin);
                                                $stmtAdmin->bind_param("ss", $email_username, $email_username);
                                                $stmtAdmin->execute();
                                                $resultAdmin = $stmtAdmin->get_result();
                                            
                                                if ($resultAdmin->num_rows == 1) {
                                                    $rowAdmin = $resultAdmin->fetch_assoc();
                                            
                                                    // Memeriksa kecocokan kata sandi dengan password_verify
                                                    if (password_verify($rawPassword, $rowAdmin['kata_sandi'])) {
                                                        // Login admin berhasil
                                                        $_SESSION['id_admin'] = $rowAdmin['id_admin'];
                                                        $_SESSION['username'] = $rowAdmin['username'];
                                                        $_SESSION['role'] = 'admin';
                                                        header("Location: admin/index.php");
                                                        exit();
                                                    }
                                                }
                                            
                                                // Login gagal
                                                $_SESSION['error_message'] = "Email or username and password combination is incorrect";
                                                header("Location: " . $_SERVER['PHP_SELF']);
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
    <script src="assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/admin/js/sb-admin-2.min.js"></script>

</body>

</html>
