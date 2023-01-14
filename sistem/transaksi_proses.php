<?php
    include("koneksi.php");

    $nTransaksi = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $jumlah = $_POST['qty'];
    $barangId=$_POST['barang'];
    $harga = $_POST['harga'];
    $pelangganId=$_POST['pelanggan'];
    $diskon = 0;

    $p = "select status, if(status=1,3,5) as dis from pelanggan ";
    $diskon+=mysqli_fetch_assoc(mysqli_query($koneksi, $p))['dis'];
    $q = "insert into transaksi values(default, '$nTransaksi', '$tanggal', ".
        "'$harga', '$jumlah', '$barangId', '$diskon', '$pelangganId')";
    $resultSet = mysqli_query($koneksi, $q);
    echo(var_dump($nTransaksi, $tanggal, $jumlah, $barangId, $harga, $pelangganId, $diskon));
    if($resultSet)
        header("location:../input/input_transaksi.php");
    else
        header("locaton:../sistem/error.php?err=internal");
?>