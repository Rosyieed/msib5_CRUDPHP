<?php

include_once("connection.php");

// Update
if (isset($_POST['update'])) {
    $id_dosen = $_POST['id_dosen'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $notelp = $_POST['notelp'];

    // query untuk update data
    $query = mysqli_query(
        $mysqli,
        "UPDATE dosen SET nama='$nama', alamat='$alamat', jabatan='$jabatan', notelp='$notelp' WHERE id_dosen='$id_dosen' "
    );

    header('Location: indexDosen.php');
}

// Ambil data user
$id = $_GET['id'];

$query = mysqli_query($mysqli, "SELECT * FROM dosen WHERE id_dosen='$id'");

while ($user_data = mysqli_fetch_array($query)) {
    $id_dosen = $user_data['id_dosen'];
    $nama = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $jabatan = $user_data['jabatan'];
    $notelp = $user_data['notelp'];
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
    <div class="container-editdosen p-3 rounded d-flex justify-content-center">
        <div class="container-box rounded p-3" style="background-color: #fff;">
            <h1>Edit Data Dosen</h1>

            <div class="mt-2 d-flex justify-content-end">
                <a href="indexDosen.php" class="btn btn-primary me-3">Kembali</a>
            </div>
            <hr>

            <div class="mt-3 w-50">

                <form action="editDosen.php" method="POST">
                    <div class="mb-3">
                        <label for="id_dosen" class="form-label">NIP</label>
                        <input type="number" name="id_dosen" id="code" class="form-control" placeholder="NIP" value="<?= $id_dosen ?>" required>
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
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="title" class="form-control" placeholder="Jabatan" value="<?= $jabatan ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="notelp" class="form-label">No. Telp</label>
                        <input type="number" name="notelp" id="title" class="form-control" placeholder="Jabatan" value="<?= $notelp ?>" required>
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