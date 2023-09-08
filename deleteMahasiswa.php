<?php

include_once("connection.php");

$id = $_GET['id'];

$delete = mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE nim='$id'");

header("Location:indexMahasiswa.php");
?>