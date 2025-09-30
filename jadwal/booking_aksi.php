<?php
include "../pasien/koneksi.php";

if (isset($_POST['booking'])) {
    $id          = $_POST['id'];
    $nama        = $_POST['nama'];
    $umur        = $_POST['umur'];
    $nama_dokter = $_POST['nama_dokter'];
    $hari        = $_POST['hari'];
    $jam         = $_POST['jam'];

    $simpan = "INSERT INTO booking (id, nama, umur, nama_dokter, hari, jam)
        VALUES ('$id', '$nama', '$umur', '$nama_dokter', '$hari', '$jam')";

    $result = mysqli_query($conn, $simpan);

    if ($result) {
        echo "<script>alert('Data Telah Berhasil Disimpan');window.location='booking.php'</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data');</script>";
    }
}

