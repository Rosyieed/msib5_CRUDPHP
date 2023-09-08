<?php

include_once("connection.php");

// Update
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $ipk = $_POST['ipk'];

    // query untuk update data
    $query = mysqli_query(
        $mysqli,
        "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', ipk='$ipk' WHERE nim='$nim' "
    );

    header('Location: indexMahasiswa.php');
}

// Ambil data user
$id = $_GET['id'];

$query = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nim='$id'");

while ($user_data = mysqli_fetch_array($query)) {
    $nim = $user_data['nim'];
    $nama = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $ipk = $user_data['ipk'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen - UNSIKA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="background-color: #f2f2f2;">

    <div class="container-editmahasiswa p-3 rounded d-flex justify-content-center">
        <div class="container-box rounded p-3" style="background-color: #fff;">
            <h1>Edit Data Mahasiswa</h1>

            <div class="mt-2 d-flex justify-content-end">
                <a href="indexMahasiswa.php" class="btn btn-primary me-3">Kembali</a>
            </div>
            <hr>

            <div class="mt-3 w-50">

                <form action="editMahasiswa.php" method="POST">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" name="nim" id="code" class="form-control" placeholder="NIM" value="<?= $nim ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="title" class="form-control" placeholder="Nama" value="<?= $nama ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="title" class="form-control" placeholder="Alamat" value="<?= $alamat ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="ipk" class="form-label">IPK</label>
                        <input type="float" name="ipk" id="title" class="form-control" placeholder="IPK" value="<?= $ipk ?>" required>
                    </div>

                    <div class="mt-3">
                        <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
                        <button class="btn btn-success" type="submit" name="update">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>