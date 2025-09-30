<?php
include "../pasien/koneksi.php";

session_start();
if(!isset($_SESSION['email_admin'])){
    header("location: ../login/signin.php");
}

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

$dokter = select("SELECT * FROM data_dokter WHERE id = $id")[0];
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
                <form action="controller.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id_jwl" class="col-sm-2 col-form-label">ID Jadwal</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_jwl" name="id_jwl" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_dokter" name="id_dokter" value="<?= $dokter['id']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dokter['nama']; ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="hari" class="col-sm-2 col-form-label">Hari Praktik</label>
                        <div class="col-sm-10">
                            <select name="hari" id="hari">
                                <option value="">- Pilih Hari -</option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selasa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jum'at</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jam" class="col-sm-2 col-form-label">Jam Praktik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jam" name="jam">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="kirim" value="kirim" class="btn btn-primary">
                        <a href="data_jadwal.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>