<?php 

include '../fungsi.php';

$produk = query("SELECT*FROM penjualan");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
    
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <h2>Laporan Penjualan</h2>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">
                <!-- Begin Page Content -->
                <h2>Laporan penjualan <?= date('Y-m-d') ?></h2>
                    <table class="table table-hover align-middle">
                        <thead>
                            <th>No.</th>
                            <th>tanggal</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </thead>
                        <?php $i=1; ?>
                        <?php 
                            $data = mysqli_query($conn, "SELECT*FROM penjualan");
                            $total = 0; 
                            while($row = mysqli_fetch_array($data)) {
                                $total += $row['totalHarga'];
                            }
                        ?>
                        <?php foreach($produk as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row['tglPenjualan']; ?></td>
                            <td><?= $row['namaProduk']; ?></td>
                            <td>$<?= $row['harga']; ?></td>
                            <td><?= $row['jumlahProduk']; ?></td>
                            <td>$<?= $row['totalHarga']; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                  
                        
                    </table>
                    <hr>
                    <h5>Total Penjualan : $<?= $total; ?> </h5>
                    <a href="cetakPenjualan.php" class="btn btn-primary my-3">Print Penjualan</a>
                </div>
                    
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Sofa Dreamland &copy; By Djordan 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            </div>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    </div>

    <script>window.print();</script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
