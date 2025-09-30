<?php
include "koneksi.php";
include "../layout/header_adm.php";
session_start();
if (!isset($_SESSION['email_admin'])) {
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

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan ID
$query = "SELECT * FROM data_pasien WHERE id LIKE '%$searchTerm%'";
$data_pasien = select($query);
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
        <h1>Data Pasien</h1>
        <hr>

        <a href="../layout/sidebar/sidebar.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>

        <!-- Form pencarian -->
        <form class="d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by ID" name="search" value="<?= $searchTerm ?>" style="width: 10%;">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

        <table class="table table-bordered table-striped mt-3">
            <thead>
                <th>No</th>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Pendamping</th>
                <th>Hubungan</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Password</th>
                <th>Foto</th>
                <th>Aksi</th>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pasien as $pasien) : ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pasien['id']; ?></td>
                        <td><?= $pasien['nama']; ?></td>
                        <td><?= $pasien['tempat_lahir']; ?></td>
                        <td><?= $pasien['tanggal_lahir']; ?></td>
                        <td><?= $pasien['jns_kel']; ?></td>
                        <td><?= $pasien['alamat']; ?></td>
                        <td><?= $pasien['nama_pngjwb']; ?></td>
                        <td><?= $pasien['hubungan']; ?></td>
                        <td><?= $pasien['notelp']; ?></td>
                        <td><?= $pasien['email']; ?></td>
                        <td><?= $pasien['pass']; ?></td>
                        <td>
                            <?= "<img src='uploads/" . $pasien['foto'] . "' width='100' height='auto'>"; ?>
                        </td>
                        <td width="15%" class="text-center">
                            <a href="ubah_pasien.php?id=<?= $pasien['id']; ?>" class="btn btn-success">Rubah</a>
                            <a href="hapus_pasien.php?id=<?= $pasien['id']; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?');">Hapus</a>
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