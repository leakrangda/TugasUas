<?php
    include("koneksi.php");

    $satuan=$_POST['satuan'];
    if($satuan){
        $q = "insert into satuan values(default, '$satuan')";
        if(mysqli_query($koneksi, $q))
            //jika berhasil kembali ke menu input barang
            header("location:../input/input_satuan.php");
        else
            //jika tidak tunjukan error apa
            header("location:error.php?err=internal");
    }else{
        //jika data tidak lengkap, tolak request input
        header("location: error.php?err=inComplete");
    }
    mysqli_close();
?>