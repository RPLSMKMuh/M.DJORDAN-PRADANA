<?php 

include '../koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM penjualan WHERE idPenjualan = $id";
mysqli_query($conn, $query);

if($query) {
    echo "<script>alert('Berhasil dibatalkan!!');</script>";
    header('Location: riwayat.php');
}

?>