<?php 

include '../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM penjualan WHERE idPenjualan = $id";
mysqli_query($conn, $query);

if($query) {
    echo "<script>alert('Berhasil dibatalkan!!');</script>";
    echo "<script>window.location.href='riwayat.php';</script>";
    // header('Location: riwayat.php');
}

?>