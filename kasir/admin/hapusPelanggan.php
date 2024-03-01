<?php 
include '../koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM pelanggan WHERE idPelanggan = $id";
mysqli_query($conn, $query);

if($query) {
    header('Location: dataPelanggan.php');
}
?>