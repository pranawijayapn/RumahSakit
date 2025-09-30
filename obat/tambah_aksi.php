<?php
include "../pasien/koneksi.php";
if (isset($_POST['tambah'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $harga          = $_POST['harga'];
    $foto           = upload_file();
    
    if (!$foto) {
        return false;
    }

    $simpan = "INSERT INTO obat (
        id, nama, harga, foto)
        VALUES ('$id', '$nama', '$harga', '$foto')";

    $result = mysqli_query($conn, $simpan);

    if ($result){
        echo "<script>alert('Data Telah Berhasil Di Simpan');window.location='data_obat_adm.php'</script>";
    }
}

function upload_file(){
    $namafile   = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namafile);
    $extensifile      = strtolower(end($extensifile));

    if (!in_array($extensifile, $extensifileValid)) {
        echo "<script>
        alert('Format File Tidak Valid');
        document.location.href = 'tambah_obat.php';
        </script>";
        die();
    }

    if ($ukuranfile > 2048000) {
        echo "<script>
        alert('Ukuran File Max 2MB');
        document.location.href = 'tambah_obat.php';
        </script>";
        die();
    }

    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $extensifile;

    move_uploaded_file($tmpName, 'uploads/' . $namafileBaru);
    return $namafileBaru;
}




?>

