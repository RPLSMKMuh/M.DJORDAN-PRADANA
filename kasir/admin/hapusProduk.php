<?php 
include '../koneksi.php';

$id = $_GET['id'];

$queryShow = "SELECT*FROM produk WHERE idProduk = $id";
$sqlShow = mysqli_query($conn, $queryShow);
$rsult = mysqli_fetch_assoc($sqlShow);

unlink("../img/".$rsult['foto']);

$query = "DELETE FROM produk WHERE idProduk = $id";
$result = mysqli_query($conn, $query);

if($result) {
    echo "<script>alert('Data berhasil dihapus!!');</script>";
    echo "<script>window.location.href='dataProduk.php';</script>";
}

?>