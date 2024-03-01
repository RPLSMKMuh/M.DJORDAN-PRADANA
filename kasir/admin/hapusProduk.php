<?php 
include '../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM produk WHERE idProduk = $id";
$result = mysqli_query($conn, $query);

if($result) {
    echo "<script>alert('Data berhasil dikirm!!');</script>";
    header('Location: dataProduk.php');
}

?>