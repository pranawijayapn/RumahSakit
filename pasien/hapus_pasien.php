<?php
include "koneksi.php";

function deleteData($id)
{
    global $conn;

    $query = "DELETE FROM data_pasien WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    if (deleteData($id)) {
        echo "<script>
        alert('Data Berhasil Dihapus');
        window.location.href = 'data_pasien.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Dihapus');
        window.location.href = 'data_pasien.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID Jadwal tidak ditemukan');
    window.location.href = 'data_pasien.php';
    </script>";
}
?>
