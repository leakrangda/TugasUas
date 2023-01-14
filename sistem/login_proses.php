<?php 
    session_start();
    include "koneksi.php";

    if(empty($koneksi)){
        header("location:sistem/error.php?err=koneksi");
    }
    else{
        //ambil query user
        $user = $_POST["akun"];
        if(!empty($user)){
            $q = "select id_admin, password, session_id, login from admin where nama='$user'";
            $hasil=mysqli_query($koneksi, $q);
            if(mysqli_num_rows($hasil)){
                $data = mysqli_fetch_assoc($hasil);
                if(hash('sha256', $_POST['pass'])==$data["password"]){
                    $_SESSION['aksi'] = "login";
                    $_SESSION['id'] = $data['id_admin'];
                    $_SESSION['user'] = $user;
                    $_SESSION['level'] = $data['level_id'];
                    if(empty($data['session_id'])){
                        //baru login, ambil data device, ipv4, dan set login status jadi true
                        date_default_timezone_set('Asia/Bangkok');
                        $waktu = date("H:i:s");
                        $sesi = session_id();
                        $log = True;

                        //simpan ke database
                        $result=mysqli_query($koneksi, 
                            "update admin set timestamp='$waktu', 
                            session_id='$sesi', login='$log' where id_admin=$data[id_admin]");
                        if($result)
                                //berhasil, relocate ke menu
                                header("location:../tampilan/dashboard.php?user=$user");
                        else
                            //ada masalah, langsung beri tahu kepada user
                            header("location: error.php?err=lainya");
                    }else{
                        //user sudah login, maka jangan berikan akses lagi
                        header("location: error.php?err=double");
                    }
                }
                else
                    //user password salah
                    header("location: sistem/error.php?err=password");
            }else{
                //tidak ada user dengan nama itu
                header("location: sistem/error.php?err=user&nama=$user");
            }
        }else{
            echo(mysqli_error($koneksi));
        }
    }
?>