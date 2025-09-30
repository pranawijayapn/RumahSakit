<?php
include "../pasien/koneksi.php";

function deleteData($id_jwl)
{
    global $conn;

    $query = "DELETE FROM jadwal WHERE id_jwl = $id_jwl";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id_jwl'])) {
    $id_jwl = (int)$_GET['id_jwl'];

    if (deleteData($id_jwl)) {
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href = 'data_jadwal.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus');
        window.location.href = 'data_jadwal.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID Jadwal tidak ditemukan');
    window.location.href = 'data_jadwal.php';
    </script>";
}
?>
