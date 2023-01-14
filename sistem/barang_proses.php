<?php
    include("koneksi.php");

    $barang=$_POST['barang'];
    $id_kategori=$_POST['kategori'];
    $id_satuan=$_POST['satuan'];
    
    if($barang && $id_kategori && $id_satuan){
        $q = "insert into barang values(default, '$barang', '$id_kategori', '$id_satuan')";
        if(mysqli_query($koneksi, $q))
            //jika berhasil kembali ke menu input barang
            header("location:../input/input_barang.php");
        else
            //jika tidak tunjukan error apa
            //header("location:error.php?err=internal");
            echo(mysqli_error($koneksi));
    }else{
        //jika data tidak lengkap, tolak request input
        header("location: error.php?err=inComplete");
    }
?>