<?php
include "../pasien/koneksi.php";
include "../layout/header_usr.php";


session_start();
if(!isset($_SESSION['email_pasien'])){
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

$data_obat = select("SELECT * FROM obat");

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan ID
$query = "SELECT * FROM obat WHERE nama LIKE '%$searchTerm%'";
$data_obat = select($query);
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Obat</title>
</head>

<body>


    <div class="container mt-5">
        <h1>Data Obat</h1>
        <hr>
    <!-- Form pencarian -->
    <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Search by Name" name="search" value="<?= $searchTerm ?>" style="width: 15%;">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>

        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_obat as $obat) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $obat['id']; ?></td>
                        <td><?= $obat['nama']; ?></td>
                        <td><?= $obat['harga']; ?></td>
                        <td>
                        <?= "<img src='uploads/" . $obat['foto'] . "' width='200' height='auto'>"; ?>
                        </td>
                        <td width="20%" class="text-center">
                            <a href="pesan_obat.php?id=<?= $obat['id']; ?>" class="btn btn-success">Pesan</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<div>
<a href="../layout/sidebar_usr/sidebar.php" class="btn btn-danger mb-1" style="float: right;"> Kembali</a>
</div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
