<?php
    include "koneksi.php";
    session_start();
    $resultSet=mysqli_query($koneksi, 
    "update admin set session_id=null, timestamp=null, login=null where id_admin=$_SESSION[id]");
    if($resultSet){
    //update data pada user
        session_unset();
        unset($_SESSION['user']);
        unset($_SESSION['id']);
        unset($_SESSION['aksi']);
        unset($_SESSION['level']);
        session_destroy();
    }else{
        header("location:../sistem/error.php?err=exit");
    }
    header("location:../index.html");
?>