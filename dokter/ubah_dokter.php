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

global $conn;
if (isset($_POST['update'])) {
    $nama           = $_POST['nama'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $umur           = $_POST['umur'];
    $jns_kel        = $_POST['jns_kel'];
    $alamat         = $_POST['alamat'];
    $spesialisasi   = $_POST['spesialisasi'];
    $notelp         = $_POST['notelp'];
    $email          = $_POST['email'];
    $pass           = $_POST['pass'];

    $simpan = mysqli_query($conn, "UPDATE data_dokter SET nama='$nama',
    tempat_lahir='$tempat_lahir',
    tanggal_lahir='$tanggal_lahir',
    umur='$umur',
    jns_kel='$jns_kel',
    alamat='$alamat',
    spesialisasi='$spesialisasi',
    notelp='$notelp',
    email='$email',
    pass='$pass' WHERE id='$id'");

    if ($simpan) {
        echo "
        <script>
        alert('Data berhasil disimpan');
        document.location.href='data_dokter.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Data gagal disimpan');
        document.location.href='data_dokter.php';
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
                        <label for="id" class="col-sm-2 col-form-label">ID Dokter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $dokter['id']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dokter['nama']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat & Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $dokter['tempat_lahir']; ?>">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $dokter['tanggal_lahir']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="umur" name="umur" value="<?= $dokter['umur']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jns_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jns_kel" id="jns_kel">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="laki-laki" <?php if ($dokter['jns_kel'] == "laki-laki") echo "selected"; ?>>Laki-Laki</option>
                                <option value="perempuan" <?php if ($dokter['jns_kel'] == "perempuan") echo "selected"; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="alamat" cols="78" rows="5"><?= $dokter['alamat']; ?></textarea>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="spesialisasi" class="col-sm-2 col-form-label">Spesialisasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="<?= $dokter['spesialisasi']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="notelp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="notelp" name="notelp" value="<?= $dokter['notelp']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $dokter['email']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pass" name="pass" value="<?= $dokter['pass']; ?>">
                        </div>
                    </div>


                    <div class="col-12">
                        <input type="submit" name="update" value="Update" class="btn btn-primary">
                        <a href="data_dokter.php" class="btn btn-danger mb-1" style="float: right;">Kembali</a>
                    </div>

                </form>
            </div>
        </div>
</body>

</html>