<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa - UNSIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #f2f2f2;">

    <div class="container-addmahasiswa p-3 rounded d-flex justify-content-center">
        <div class="container-box rounded p-3" style="background-color: #fff;">
            <h1>Tambah Mahasiswa</h1>

            <div class="mt-2 d-flex justify-content-end">
                <a href="indexMahasiswa.php" class="btn btn-primary me-3">Kembali</a>
            </div>
            <hr>

            <div class="mt-3 w-50">

                <form action="addMahasiswa.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" name="nim" id="code" class="form-control" placeholder="Nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="title" class="form-control" placeholder="Nama" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="title" class="form-control" placeholder="Alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="ipk" class="form-label">IPK</label>
                        <input type="float" name="ipk" id="title" class="form-control" placeholder="IPK" required>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit" name="Submit">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- Handle permintaan POST dari form diatas -->
            <?php
            if (isset($_POST['Submit'])) {
                $nim = $_POST['nim'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $ipk = $_POST['ipk'];

                // Memanggil koneksi menuju database
                include_once("connection.php");

                // Query untuk insert data ke database
                $result = mysqli_query(
                    $mysqli,
                    "INSERT INTO mahasiswa (nim,nama,alamat,ipk) VALUES ('$nim','$nama','$alamat','$ipk')"
                );

                echo "Berhasil Menambahkan Mahasiswa. <a href='indexMahasiswa.php'>Lihat User</a>";
            }
            ?>
        </div>
    </div>
</body>

</html>