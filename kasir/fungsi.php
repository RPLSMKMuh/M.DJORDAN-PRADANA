<?php 

include 'koneksi.php';

function regist($data) {
    global $conn;

    $username = strtolower(stripslashes($data['user']));
    $email = $data['email'];
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    
    //cek username sudah terdaftar atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah ada!!');</script>";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2) {
        echo "<script>alert('Periksa ulang konfirmasi password!!');</script>";
        return false;
    }

    //enkripsi password
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES('', '$username', '$email', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function produk($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function pelanggan($data) {
    global $conn;

    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $phone = $data['phone'];
    $username = strtolower($data['username']);
    $password = $data['password'];

    // $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO pelanggan VALUES('', '$nama', '$username', '$password', '$alamat', '$phone')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function tambahProduk($data) {
    global $conn;

    $namaProduk = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $foto = $data['foto'];
    // $foto = upload();
    // if(!$foto) {
    //     return false;
    // }

    $query = "INSERT INTO produk VALUES('', '$namaProduk', '$harga', '$stok', '$foto')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $nama = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $eror = $_FILES['foto']['error'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if($eror) {
        echo "<script>alert('Foto anda kosong!!');</script>";
        return false;
    }

    $ekstensifotovalid = ['jpg', 'jpeg', 'png'];
    $ekstensifoto = explode('.', $nama);
    $ekstensifoto = strtolower(end($ekstensifoto));
    if(!in_array($ekstensifoto, $ekstensifotovalid)) {
        echo "<script>alert('Format foto harus jpg, jpeg, png!!');</script>";
        return false;
    }

    if($size > 2000000) {
        echo "<script>alert('Ukuran foto harus dibawah 2mb!!');</script>";
        return false;
    }

    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $ekstensifoto;

    move_uploaded_file($tmp, '../img/'.$namabaru);

    return $nama;
    
}

function editProduk($data) {
    global $conn;

    $id = $_GET['id'];
    $namaProduk = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $foto = $data['foto'];

    $query = "UPDATE produk SET namaProduk='$namaProduk', harga='$harga', stok='$stok', foto='$foto' WHERE idProduk = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editProfile($data) {
    global $conn;

    $id = $_GET['id'];
    $nama = $data['nama'];
    $username = $data['username'];
    $password = $data['password'];
    $alamat = $data['alamat'];
    $notelp = $data['notelp'];

    $query = "UPDATE pelanggan SET nama='$nama', username='$username', password='$password', alamat='$alamat', notelepon='$notelp' WHERE idPelanggan = $id";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
    
}

function editPelanggan($data) {
    global $conn;

    $id = $_GET['id'];
    $nama = $data['nama'];
    $username = $data['username'];
    $alamat = $data['alamat'];
    $notelp = $data['notelp'];

    $query = "UPDATE pelanggan SET nama='$nama', username='$username', alamat='$alamat', notelepon='$notelp' WHERE idPelanggan = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

function beli($data) {
    global $conn;

    // $id = $_GET['id'];
    // $produk = $data['produk'];
    $namaProduk = $data['nama'];
    $tgl = $data['tanggal'];
    $harga = $data['harga'];
    $jumlah = $data['jumlah'];
    $idPelanggan = $data['pelanggan'];
    $totalHarga = $harga * $jumlah; // Hitung total harga

    // Masukkan data penjualan ke dalam tabel penjualan
    $query = "INSERT INTO penjualan VALUES('', '$tgl', '$namaProduk', '$harga', '$jumlah', '$totalHarga' ,'$idPelanggan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>