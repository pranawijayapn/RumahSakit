

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Obat</title>
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
                Tambah Data Obat
            </div>
            <div class="card-body">
                <form action="tambah_aksi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" >
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Masukkan Foto Obat</label>
                        <div class="col-sm-10">
                        <input type="file" name="foto" id="">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
</body>

</html>