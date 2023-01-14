<?php
    include("koneksi.php");

    $nama = $_POST['nama'];
    $pass = hash('sha256', $_POST['pass']);

    $q = "insert into admin values(default,'$pass','$nama', null, null, null)";
    $resultSet = mysqli_query($koneksi, $q);
    if($resultSet)
        header("location:../input/input_admin.php");
    else
        header("location:sistem/error.php?err=internal");
    mysqli_close($koneksi);
?>