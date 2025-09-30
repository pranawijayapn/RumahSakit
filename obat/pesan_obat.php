<?php
include "../pasien/koneksi.php";
$id = (int)$_GET['id'];

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
                <form action="pesan_aksi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Pemesanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pemesanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $obat['nama']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $obat['harga']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <textarea name="alamat" id="alamat" cols="78" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="pesan" value="Pesan" class="btn btn-primary">
                        <a href="data_obat_usr.php" class="btn btn-danger mb-1" style="float: right;">Batal</a>
                    </div>


                </form>
            </div>
        </div>
</body>

</html>