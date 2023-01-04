<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';

if(isset($_POST["EmailAdresi"])){
    $GelenEmailAdresi = guvenlik($_POST["EmailAdresi"]);
}else{
    $GelenEmailAdresi ="";
}
if(isset($_POST["Sifre"])){
    $GelenSifre = guvenlik($_POST["Sifre"]);
}else{
    $GelenSifre ="";
}

$MD5sifre = md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="") )
{
    $KontrolSorgusu = $con->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND Sifre = ?");
    $KontrolSorgusu->execute([$GelenEmailAdresi,$MD5sifre]);
    $Kullanicisayisi = $KontrolSorgusu ->rowCount();
    $KullaniciKaydi = $KontrolSorgusu ->fetch(PDO::FETCH_ASSOC);

    if($Kullanicisayisi>0){
        if($KullaniciKaydi["Durumu"]==1){
            $_SESSION["Kullanici"] = $GelenEmailAdresi;

            if($KullaniciKaydi["Durumu"]==1){

            
                $_SESSION["Kullanici"] = $GelenEmailAdresi;

                if($_SESSION["Kullanici"]==$GelenEmailAdresi){
                    header("Location:index.php?SK=26");
                    exit();

                }else{
                    header("Location:index.php?SK=19");
                    exit();

                }


    
                }else{
                
                }



                }else{

}
}else{
    header("Location:index.php?SK=22");
    exit();
          
}

}else{
    header("Location:index.php?SK=20");
    exit();
                

}


?>