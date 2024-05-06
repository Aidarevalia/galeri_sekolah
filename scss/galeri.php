<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK 1 TRIPLE J</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="shortcut icon" href="img/j.png">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        
    <?php
    include 'sidebar.php'
    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include 'navbar.php'
                ?>    

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Gallery</h1>
                    </div>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                
                              
                                <!-- Card Body -->
                                <div class="card">
        <div class="card-body">
            <a href="add_galeri.php" class="btn btn-primary">+Galeri</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>judul Post</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                <?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($conn, "SELECT galery.*, posts.judul AS nama_posts FROM galery JOIN posts ON galery.post_id = posts.id");
                    while($d = mysqli_fetch_array($data)){
            
			?>
            <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_posts']; ?></td>
                <td><?php echo $d['position']; ?></td>
                <td>
                <?php
                $status = $d['status'];
                if ($status == '1') {
                echo '<span class="p-2 badge bg-success text-light" >Publish</span>';
                } elseif ($status == '0') {
                echo '<span class="p-2 badge bg-primary text-light">Draft</span>';
                }
                ?>
                </td>

                <td class="d-flex justify-content-center">
                <a href="hapus_galeri.php?id=<?php echo $d['id']; ?>" class="btn btn-danger me-2 mr-2 " onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"> Hapus</a>

                <a href="edit_galeri.php?id=<?php echo $d['id']; ?>" class="btn btn-warning me-2 mr-2"> Edit</a>

                <a href="detail_galeri.php?id=<?php echo $d['id']; ?>" class="btn btn-success me-2 mr-2">
                        <i data-feather="info"></i>Detail
                        </a>

                </td>
            </tr>
            <?php 
		}
		?>
                

            </table>
        </div>
    </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>SMK 1 TRIPLE J</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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