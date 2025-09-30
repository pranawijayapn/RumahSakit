
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
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
                Create Data Pasien
            </div>
            <div class="card-body">
                <form action="form_pasien_aksi.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-2 col-form-label">ID Pasien</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" require>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat & Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jns_kel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select name="jns_kel" id="jns_kel">
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" id="alamat" cols="78" rows="5"></textarea>
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <label for="nama_pngjwb" class="col-sm-2 col-form-label">Pendamping</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pngjwb" name="nama_pngjwb">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="hubungan" class="col-sm-2 col-form-label">Hubungan</label>
                        <div class="col-sm-10">
                            <input type="text" class="hubungan" id="hubungan" name="hubungan">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="notelp" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="notelp" name="notelp">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-10">
                        <input type="file" name="foto" id="">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
                        <a href="../login/signin.php" class="btn btn-danger" style="float: right;">Kembali</a>
                    </div>

                    

                </form>
            </div>
        </div>
</body>

</html>