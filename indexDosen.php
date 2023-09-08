<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$conn = mysqli_query($mysqli, 'SELECT * FROM dosen');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Universitas Singaperbangsa Karawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #4875A8">
            <div class="container-fluid">
                <a href="indexMahasiswa.php" class="navbar-brand"> <b>Universitas Singaperbangsa Karawang</b> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse h-auto d-lg-block" id="navbarTogglerDemo03">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="indexMahasiswa.php">Mahasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="indexDosen.php">Dosen</a>
                        </li>
                    </ul>
                </div>
                <div class="content p-5 col-lg-10" style="background-color: #f2f2f2;">
                    <div class="container-dosen p-3 rounded" style="background-color: #fff">
                        <h1>List Dosen</h1>
                        <div class="my-4 d-flex justify-content-start">
                            <a href="addDosen.php" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Dosen</a>
                        </div>
                        <hr>

                        <?php

                        $total_rows = mysqli_num_rows(mysqli_query($mysqli, 'SELECT * FROM dosen'));

                        $per_page = 3;

                        $num_pages = ceil($total_rows / $per_page);

                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }

                        $offset = ($page - 1) * $per_page;

                        $result = mysqli_query($mysqli, "SELECT * FROM dosen LIMIT $offset, $per_page");

                        echo '<ul class="pagination">';
                        for ($i = 1; $i <= $num_pages; $i++) {
                            $active = ($i == $page) ? 'active' : '';
                            echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        echo '</ul>';
                        ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jabatan</th>
                                    <th>No. Telp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($user_data = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $user_data['id_dosen']; ?></td>
                                        <td><?php echo $user_data['nama']; ?></td>
                                        <td><?php echo $user_data['alamat']; ?></td>
                                        <td><?php echo $user_data['jabatan']; ?></td>
                                        <td><?php echo $user_data['notelp']; ?></td>
                                        <td>
                                            <a href="editDosen.php?id=<?php echo $user_data['id_dosen']; ?>" class="btn text-white" style="background-color: rgb(49, 211, 0)"><i class="bi bi-subtract me-2"></i>Edit</a>
                                            <a href="deleteDosen.php?id=<?php echo $user_data['id_dosen']; ?>" class="btn text-white delete" style="background-color: rgb(211, 18, 0)" id="delete" onclick="confirmation(event)"><i class="bi bi-trash me-2"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>