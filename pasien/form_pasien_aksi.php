<?php
include "koneksi.php";

if (isset($_POST['kirim'])){
    $id             = $_POST['id'];
    $nama           = $_POST['nama'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jns_kel        = $_POST['jns_kel'];
    $alamat         = $_POST['alamat'];
    $nama_pngjwb    = $_POST['nama_pngjwb'];
    $hubungan       = $_POST['hubungan'];
    $notelp         = $_POST['notelp'];
    $email          = $_POST['email'];
    $pass           = $_POST['pass'];
    $foto           = upload_file();

    if (!$foto) {
        return false;
    }
    
    $simpan = "INSERT INTO data_pasien(
        id,nama,tempat_lahir,tanggal_lahir,jns_kel,alamat,nama_pngjwb,hubungan,notelp,email,pass,foto)
        VALUES('$id','$nama','$tempat_lahir','$tanggal_lahir','$jns_kel','$alamat','$nama_pngjwb','$hubungan','$notelp','$email','$pass','$foto')";

    $result = mysqli_query($conn,$simpan);

    if ($result){
        echo "<script>alert('Data Telah Berhasil Di Simpan');window.location='../login/signin.php'</script>";
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
        document.location.href = 'form_pasien.php';
        </script>";
        die();
    }

    if ($ukuranfile > 2048000) {
        echo "<script>
        alert('Ukuran File Max 2MB');
        document.location.href = 'form_pasien.php';
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