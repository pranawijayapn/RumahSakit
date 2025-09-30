<?php

include 'config/controller.php';

$id = (int)$_GET['id'];

if(deleteData($id) > 0) {
    echo "<script>
    alert('Data Berhasil Dihapus');
    document.location.href = 'data_dokter.php';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Dihapus');
    document.location.href = 'data_dokter.php';
    </script>";
}