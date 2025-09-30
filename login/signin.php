<?php

session_start();
require_once "../pasien/koneksi.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Pengecekan tabel pasien
    $query = "SELECT * FROM data_pasien WHERE email='$email' AND pass='$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION["email_pasien"] = true;
            $_SESSION["role"] = "pasien";
            header("location: ../layout/sidebar_usr/sidebar.php");
            exit();
        } else {
            $error = "email atau password salah.";
        }
    } else {
        $error = "Terjadi kesalahan dalam eksekusi query: " . mysqli_error($conn);
    }




    // Pengecekan tabel admin
    $query = "SELECT * FROM admin WHERE email='$email' AND pass='$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION["email_admin"] = $email;
            $_SESSION["role"] = "admin";
            header("location: ../layout/sidebar/sidebar.php");
            exit();
        } else {
            $error = "email atau password salah.";
        }
    } else {
        $error = "Terjadi kesalahan dalam eksekusi query: " . mysqli_error($conn);
    }

    // Pengecekan tabel dokter
    $query = "SELECT * FROM data_dokter WHERE email='$email' AND pass='$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION["email_dokter"] = $email;
            $_SESSION["role"] = "dokter";
            header("location: ../layout/sidebar_dtr/sidebar.php");
            exit();
        } else {
            $error = "email atau password salah.";
        }
    } else {
        $error = "Terjadi kesalahan dalam eksekusi query: " . mysqli_error($conn);
    }


}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>MYDOCTOR</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" require>
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" require>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="login">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="../pasien/form_pasien.php">Sign Up</a></p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>