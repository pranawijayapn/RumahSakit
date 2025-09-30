<?php
include "../pasien/koneksi.php";

session_start();
if(!isset($_SESSION['email_admin'])){
    header("location: ../login/signin.php");
}

$id_jwl = (int)$_GET['id_jwl'];

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

$jadwal = select("SELECT * FROM jadwal WHERE id_jwl = $id_jwl")[0];

global $conn;
if (isset($_POST['update'])) {
    $id_jwl = $_POST['id_jwl'];
    $id     = $_POST['id_dokter'];
    $nama   = $_POST['nama'];
    $hari   = $_POST['hari'];
    $jam    = $_POST['jam'];

    $simpan = mysqli_query($conn, "UPDATE jadwal SET id_jwl='$id_jwl',
    nama='$nama',
    hari='$hari',
    jam='$jam' WHERE id_jwl='$id_jwl'");

    if ($simpan) {
        echo "
        <script>
        alert('Data berhasil disimpan');
        document.location.href='data_jadwal.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Data gagal disimpan');
        document.location.href='data_jadwal.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Create / Edit Data
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id_jwl" class="col-sm-2 col-form-label">ID Jadwal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_jwl" name="id_jwl" value="<?= $jadwal['id_jwl']; ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $jadwal['id']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $jadwal['nama']; ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
    <label for="hari" class="col-sm-2 col-form-label">Hari Praktik</label>
    <div class="col-sm-10">
        <select name="hari" id="hari">
            <option value="">- Pilih Hari -</option>
            <option value="senin" <?php if ($jadwal['hari'] == "senin") echo "selected"; ?>>Senin</option>
            <option value="selasa" <?php if ($jadwal['hari'] == "selasa") echo "selected"; ?>>Selasa</option>
            <option value="rabu" <?php if ($jadwal['hari'] == "rabu") echo "selected"; ?>>Rabu</option>
            <option value="kamis" <?php if ($jadwal['hari'] == "kamis") echo "selected"; ?>>Kamis</option>
            <option value="jumat" <?php if ($jadwal['hari'] == "jumat") echo "selected"; ?>>Jum'at</option>
        </select>
    </div>
</div>


                    <div class="mb-3 row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam Praktik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jam" name="jam" value="<?= $jadwal['jam']; ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                        <a href="data_jadwal.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>