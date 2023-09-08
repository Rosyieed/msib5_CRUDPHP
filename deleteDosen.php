<?php

    include_once("connection.php");

    $id = $_GET['id'];

    $delete = mysqli_query($mysqli, "DELETE FROM dosen WHERE id_dosen='$id'");

    header("Location:indexDosen.php");
?>