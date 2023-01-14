<?php
    session_start();
    //tidak ada yang login, langsung keluar saja
    $user = $_SESSION['user'];
    if(empty($user))
        header("location:sistem/error.php?err=noLog");
        //echo("$user");
    else{
        //ada yang login, tapi check dulu usernya siapa
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            //karena secara default request method adalah GET, maka harus double check
            //apakah variable user ada pada request 
            if(!empty($_GET['user'])){
                //jika iya, maka check
                if(($_GET['user']!=$_SESSION['user']))
                    //keluar jika bukan user yang benar
                    header("location:../sistem/error.php?err=intr");
            }
        }
        else if($_SERVER["REQUEST_METHOD"]=="POST"){
            if($_POST['user'] != $_SESSION['user']){
            //keluar jika bukan user yang benar
                //header("location:../sistem/error.php?err=intr");
                echo("post dipanggil");
            }
        }
        //jika sampai sini berarti aman
    }
?>