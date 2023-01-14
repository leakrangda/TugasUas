<?php
    $errorCode = $_GET['err'];
    $message="";
    $judul="";

    if($errorCode=="double"){
        $judul="login ganda";
        $message="maaf anda tidak diperbolehkan untuk melakukan login ganda";
    }else if($errorCode=="password"){
        $judul="password salah";
        $message="maaf password yang anda masukan salah, mohon check kembali";
    }else if($errorCode=="user"){
        $judul="user tidak ada";
        $message="maaf user yang anda masukan tidak ada, mohon check kembali";
    }else if($errorCode=="intr"){
        $judul="akses illegal";
        $message="anda tidak memiliki akses, silahkan login terlebih dahulu!";
    }else{
        $message="error tidak diketahui";
    }
?>
<html>
    <head>
        <title><?php echo($judul);?></title>
    </head>
    <body>
        <div>
            <div>
                <p><?php echo($message); ?></p>
            </div>
        </div>
<?php
    include("../tampilan/footer.html");
?>