<?php
session_start();
if(!isset($_SESSION['email_pasien'])){
    header("location: ../../login/signin.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien</title>

<!-- Fonts Google-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

<!--My Style-->
<link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <div class="sidebar">
            <div class="header">
                <div class="list-item">
                    <a href="#">
                        <img src="img/youtube.svg" alt="" class="icon">
                        <span class="description-header">PASIEN</span>
                    </a>
                </div>
                <div class="ilustration">
                    <img src="img/gambar.png" alt="">
                </div>
            </div>

            <div class="main">
                <div class="list-item">
                    <a href="sidebar.php">
                        <img src="img/dashboard.svg" alt="" class="icon">
                        <span class="description">Home</span>
                    </a>
                </div>
                <div class="list-item">
                    <a href="../../dokter/data_dokter_usr.php">
                        <img src="img/category.svg" alt="" class="icon">
                        <span class="description">Data Dokter</span>
                    </a>
                </div>

                <div class="list-item">
                    <a href="../../jadwal/booking.php">
                        <img src="img/team.svg" alt="" class="icon">
                        <span class="description">Booking</span>
                    </a>
                </div>

                <div class="list-item">
                    <a href="../../obat/data_obat_usr.php">
                        <img src="img/event.svg" alt="" class="icon">
                        <span class="description">Pesan Obat</span>
                    </a>
                </div>

                <div class="list-item">
                    <a href="../logout.php">
                        <img src="img/history.svg" alt="" class="icon">
                        <span class="description">Logout</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="main-content">
            <div id="menu-button">
                <input type="checkbox" id="menu-checkbox">
                <label for="menu-checkbox" id="menu-label">
                    <div id="hamburger"></div>
                </label>
            </div>
        </div>
    </div>
     <script src="script.js"></script>
</body>
</html>