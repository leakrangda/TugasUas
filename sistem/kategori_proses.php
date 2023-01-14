<?php
    include("koneksi.php");

    $id_kategori=$_POST['kategori'];
    
    if($id_kategori){
        $q = "insert into kategori values(default, '$id_kategori')";
        if(mysqli_query($koneksi, $q))
            //jika berhasil kembali ke menu input barang
            header("location:../input/input_kategori.php");
        else
            //jika tidak tunjukan error apa
            header("location:error.php?err=internal");
    }else{
        //jika data tidak lengkap, tolak request input
        header("location: error.php?err=inComplete");
    }
    mysqli_close();
?>