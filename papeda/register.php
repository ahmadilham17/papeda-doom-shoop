<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Pembeli</h1>
                            </div>
                            <form  action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nama Lengkap" required name="nama">
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required name="email">
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Nomor Telepon" required name="nohp">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Alamat" required name="alamat">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Username" required name="username">
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Password" required name="password">
                                </div>

                                <div class="form-group">
                                    <label >Gambar</label><br>
                                    <input type="file"required name="gambar">
                                </div>
                                
                                <button type = "submit" name="daftar" class="btn btn-primary btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small" href="login.php">Sudah Punya Akun? Login!</a>
                            </div>

                            <?php
                            include 'config/koneksi.php';

                            if (isset($_POST['daftar'])) {
                                $nama = $_POST['nama'];
                                $email = $_POST['email'];
                                $nohp = $_POST['nohp'];
                                $alamat = $_POST['alamat'];
                                $username = $_POST['username'];
                                $raw_password = $_POST['password']; // Mengambil password mentah

                                $gambar_pembeli = uniqid() . '_' . $_FILES['gambar']['name']; // Menggunakan uniqid() untuk membuat nama unik
                                $tmp_gambar = $_FILES['gambar']['tmp_name'];

                                $lokasi_simpan = 'pembeli/images/profile/' . $gambar_pembeli;

                                // Pindahkan file gambar ke lokasi penyimpanan
                                move_uploaded_file($tmp_gambar, $lokasi_simpan);

                                // Hash password sebelum disimpan
                                $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

                                $koneksi->query("INSERT INTO pembeli (nama_pembeli, email, no_hp, gambar_pembeli, username, kata_sandi,alamat) 
                                                VALUES ('$nama','$email','$nohp','$gambar_pembeli','$username','$hashed_password','$alamat')");

                                echo "<script>alert('Berhasil Registrasi, Silakan Login');</script>";
                                echo "<script>location='login.php';</script>";
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>