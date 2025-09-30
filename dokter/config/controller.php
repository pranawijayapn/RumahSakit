<?php

include "../pasien/koneksi.php";

function select($query)
{
    global  $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
$data_dokter = select("SELECT * FROM data_dokter");

function updateData($post)
{
    global $conn;

    $id             = $post['id'];
    $nama           = $post['nama'];
    $tempat_lahir   = $post['tempat_lahir'];
    $tanggal_lahir  = $post['tanggal_lahir'];
    $umur           = $post['umur'];
    $jns_kel        = $post['jns_kel'];
    $alamat         = $post['alamat'];
    $spesialisasi   = $post['spesialisasi'];
    $notelp         = $post['notelp'];
    $email          = $post['email'];
    $pass           = $post['pass'];
    $foto           = $post['foto'];

    $query = "UPDATE data_dokter SET nama = '$nama', tempat_lahir = '$tempat_lahir ', tangggal_lahir = '$tanggal_lahir',umur = '$umur', jns_kel = '$jns_kel', spesialisasi = '$spesialisasi', notelp = '$notelp', email = '$email', pass = '$pass', foto = 'foto' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function deleteData($id)
{
    global $conn;

    $query = "DELETE FROM data_dokter WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
