<?php
include "../pasien/koneksi.php";
if (isset($_POST['pesan'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $nama_obat      = $_POST['nama_obat'];
    $harga          = $_POST['harga'];
    $alamat         = $_POST['alamat'];
    

    $simpan = "INSERT INTO pemesanan (
        id, nama,nama_obat, harga, alamat)
        VALUES ('$id', '$nama', '$nama_obat','$harga', '$alamat')";

    $result = mysqli_query($conn, $simpan);

    if ($result){
        echo "<script>alert('Data Telah Berhasil Di Simpan');window.location='data_obat_usr.php'</script>";
    }
}
?>

