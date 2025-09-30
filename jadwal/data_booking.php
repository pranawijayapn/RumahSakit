<?php
include "../pasien/koneksi.php";
include "../layout/header_adm.php";

session_start();
if(!isset($_SESSION['email_admin'])){
    header("location: ../login/signin.php");
}

function select($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

$data_booking = select("SELECT * FROM booking");

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan ID
$query = "SELECT * FROM booking WHERE id LIKE '%$searchTerm%'";
$data_booking = select($query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Booking</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Data Booking</h1>
        <hr>

        <a href="../layout/sidebar/sidebar.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>

        <!-- Form pencarian -->
    <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Search by ID" name="search" value="<?= $searchTerm ?>" style="width: 10%;">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Booking</th>
                    <th>Nama Pasien</th>
                    <th>Umur</th>
                    <th>Nama Dokter</th>
                    <th>Hari Praktik</th>
                    <th>Jam Praktik</th>
                    <th>Persetujuan</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_booking as $booking) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $booking['id']; ?></td>
                        <td><?= $booking['nama']; ?></td>
                        <td><?= $booking['umur']; ?></td>
                        <td><?= $booking['nama_dokter']; ?></td>
                        <td><?= $booking['hari']; ?></td>
                        <td><?= $booking['jam']; ?></td>
                        <td width="20%" class="text-center">
                            <a href="tolak_booking.php?id=<?= $booking['id']; ?>" class="btn btn-dark" onclick="return confirm('Anda Yakin Akan Menolaknya?');">Tolak</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            
        </table>
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
