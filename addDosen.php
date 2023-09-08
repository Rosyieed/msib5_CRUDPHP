<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen - UNSIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #f2f2f2;">

    <div class="container-adddosen p-3 rounded d-flex justify-content-center">
        <div class="container-box rounded p-3" style="background-color: #fff;">
            <h1>Tambah Data Dosen</h1>

            <div class="mt-2 d-flex justify-content-end">
                <a href="indexDosen.php" class="btn btn-primary me-3">Kembali</a>
            </div>
            <hr>

            <div class="mt-3 w-50">

                <form action="addDosen.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIP</label>
                        <input type="number" name="id_dosen" id="code" class="form-control" placeholder="NIP" required>
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
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="title" class="form-control" placeholder="Jabatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="notelp" class="form-label">No. Telp</label>
                        <input type="number" name="notelp" id="title" class="form-control" placeholder="notelp" required>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success" type="submit" name="Submit">Simpan</button>
                    </div>
                </form>
            </div>

            <!-- Handle permintaan POST dari form diatas -->
            <?php
            if (isset($_POST['Submit'])) {
                $id_dosen = $_POST['id_dosen'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $jabatan = $_POST['jabatan'];
                $notelp = $_POST['notelp'];

                // Memanggil koneksi menuju database
                include_once("connection.php");

                // Query untuk insert data ke database
                $result = mysqli_query(
                    $mysqli,
                    "INSERT INTO dosen (id_dosen,nama,alamat,jabatan,notelp) VALUES ('$id_dosen','$nama','$alamat','$jabatan','$notelp')"
                );
                echo "Berhasil menambah Dosen. <a href='indexDosen.php'>Lihat Data</a>";
            }
            ?>
        </div>
    </div>

</body>

</html>