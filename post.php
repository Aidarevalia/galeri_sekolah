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

    <title>SMK 1 TRIPLE</title>

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

                <!-- Topbar -->
                <?php
                include 'navbar.php'
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Post</h1>
                    </div>
                    <div class="row">

                   <!-- Area Chart -->
                   <div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <a href="add_post.php" class="btn btn-primary ">+ Post</a> 
                <table class="table">
                    <thead class="table-primary">
                        <tr class="mr-2 ml-2">
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Petugas</th>
                            <th>Status</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    include 'koneksi.php';
    $no = 1;
    $query = "SELECT posts.*, kategori.judul AS nama_kategori, petugas.username AS nama_petugas 
              FROM posts 
              JOIN kategori ON posts.kategori_id = kategori.id
              JOIN petugas ON posts.petugas_id = petugas.id";
    $result = mysqli_query($conn, $query);
                   
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['judul'] . "</td>";
        echo "<td>" . $row['nama_kategori'] . "</td>"; // Menggunakan judul kategori dari tabel kategori
        echo "<td>" . $row['nama_petugas'] . "</td>"; // Menggunakan username petugas dari tabel petugas
        echo "<td>";
        if ($row['status'] == 'publish') {
            echo '<span class="p-2 badge bg-success text-light" >Publish</span>';
        } else if ($row['status'] == 'draft') {
            echo '<span class="p-2 badge bg-primary text-light">Draft</span>';
        } else {
            echo $row['status']; // Menampilkan status apa pun yang tidak sama dengan "publish" atau "draft"
        }
        echo "</td>";
                            
        echo "<td>" . $row['created_at'] . "</td>";
        echo "<td>
       
        <a href='hapus_post.php?id=" . $row['id'] . "' class='btn btn-danger btn-md mb-3' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?');\">Hapus</a>
        
        <a href='edit_post.php?id=" . $row['id'] . "' class='btn btn-warning btn-md mb-3'> Edit</a>
            <i class='fas fa-edit'></i>
        </a>
    </td>";
    
        echo "</tr>";
    }
    ?>
</tbody>

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