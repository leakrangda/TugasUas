<?php
    include("koneksi.php");

    $nama=$_POST['nama'];
    $telp=$_POST['telp'];
    $status=$_POST['status'];
    
    if($nama && $telp && $status){
        $q = "insert into pelanggan values(default, '$nama', '$telp', '$status')";
        if(mysqli_query($koneksi, $q))
            //jika berhasil kembali ke menu input barang
            header("location:../input/input_pelanggan.php");
        else
            //jika tidak tunjukan error apa
            //header("location:error.php?err=internal");
            echo(mysqli_error($koneksi));
    }else{
        //jika data tidak lengkap, tolak request input
        //header("location: error.php?err=inComplete");
        var_dump($nama, $telp, $status);
    }
?>