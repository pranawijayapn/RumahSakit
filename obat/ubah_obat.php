<?php
include "../pasien/koneksi.php";
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

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

$obat = select("SELECT * FROM obat WHERE id = $id")[0];

global $conn;
if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $harga   = $_POST['harga'];


    $simpan = mysqli_query($conn, "UPDATE obat SET nama='$nama',
    harga='$harga' WHERE id='$id'");

    if ($simpan) {
        echo "
        <script>
        alert('Data berhasil disimpan');
        document.location.href='data_obat_adm.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Data gagal disimpan');
        document.location.href='data_obat_adm.php';
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
                Edit Data Obat
            </div>
            <div class="card-body">
                <form action="" method="POST">
                <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $obat['id']; ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $obat['nama']; ?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $obat['harga']; ?>">
                        </div>
                    </div>



                    <div class="col-12">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                        <a href="data_obat_adm.php" class="btn btn-danger mb-1" style="float: right;"> Kembali</a>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>