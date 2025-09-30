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

$data_pemesanan = select("SELECT * FROM pemesanan");

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan ID
$query = "SELECT * FROM pemesanan WHERE id LIKE '%$searchTerm%'";
$data_pemesanan = select($query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data Pemesanan Obat</title>
</head>

<body>
   

    <div class="container mt-5">
        <h1>Data Pemesanan Obat</h1>
        <hr>
        
        <!-- Form pencarian -->
    <form class="d-flex">
                <input type="text" class="form-control me-2" placeholder="Search by ID" name="search" value="<?= $searchTerm ?>" style="width: 10%;">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        <table class="table table-bordered table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pemesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_pemesanan as $pesan) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pesan['id']; ?></td>
                        <td><?= $pesan['nama']; ?></td>
                        <td><?= $pesan['nama_obat']; ?></td>
                        <td><?= $pesan['harga']; ?></td>
                        <td><?= $pesan['alamat']; ?></td>

                        <td width="20%" class="text-center">
                            <a href="hapus_pesanan.php?id=<?= $pesan['id']; ?>" class="btn btn-success">Selesai</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
        <a href="../layout/sidebar/sidebar.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
