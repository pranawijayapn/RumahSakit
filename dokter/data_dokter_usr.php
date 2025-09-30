<?php
include 'config/controller.php';
include '../layout/header_usr.php';

session_start();
if (!isset($_SESSION['email_pasien'])) {
    header("location: ../login/signin.php");
}

$data_dokter = select("SELECT * FROM data_dokter");

// Mengambil kata kunci pencarian dari URL jika ada
$searchTerm = $_GET['search'] ?? '';

// Query untuk mencari data pasien berdasarkan ID
$query = "SELECT * FROM data_dokter WHERE nama LIKE '%$searchTerm%'";
$data_dokter = select($query);


?>

<div class="container mt-5">
    <h1>Data Dokter</h1>
    <hr>
    <!-- Form pencarian -->
    <form class="d-flex">
        <input type="text" class="form-control me-2" placeholder="Search by Name" name="search" value="<?= $searchTerm ?>" style="width: 15%;">
        <button class="btn btn-primary" type="submit">Search</button>
    </form>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <th>No</th>
            <th>ID</th>
            <th>Nama Dokter</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Spesialisasi</th>
            <th>Foto</th>


        </thead>

        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data_dokter as $dokter) : ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $dokter['id']; ?></td>
                    <td><?= $dokter['nama']; ?></td>
                    <td><?= $dokter['umur']; ?></td>
                    <td><?= $dokter['jns_kel']; ?></td>
                    <td><?= $dokter['spesialisasi']; ?></td>
                    <td>
                        <?= "<img src='uploads/" . $dokter['foto'] . "' width='200' height='auto'>"; ?>
                    </td>



                </tr>
        </tbody>
    <?php endforeach; ?>
    </table>

    <div>
        <a href="../layout/sidebar_usr/sidebar.php" class="btn btn-danger mb-1" style="float: right;"> Kembali</a>
    </div>
</div>

<?php
include '../layout/footer_adm.php';
?>