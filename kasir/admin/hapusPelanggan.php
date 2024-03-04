<?php 
include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM pelanggan WHERE idPelanggan = $id";
mysqli_query($conn, $query);

if($query) {
    echo "<script>alert('Data berhasil dihapus!!');</script>";
    echo "<script>window.location.href='dataPelanggan.php';</script>";
}
?>