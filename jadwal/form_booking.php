<?php
include "../pasien/koneksi.php";
session_start();
if(!isset($_SESSION['email_pasien'])){
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
                <form action="booking_aksi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Booking</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="umur" name="umur">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?= $jadwal['nama']; ?>">
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
                            <input type="text" class="form-control" id="jam" name="jam" value="<?= $jadwal['jam']; ?>" readonly>
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="booking" value="Booking" class="btn btn-primary">
                        <a href="booking.php" class="btn btn-danger mb-1" style="float: right;">Batal</a>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>