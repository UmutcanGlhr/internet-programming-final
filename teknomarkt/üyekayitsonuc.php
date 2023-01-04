<?php


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
if(isset($_POST["SifreTekrar"])){
    $GelenSifreTekrar = guvenlik($_POST["SifreTekrar"]);
}else{
    $GelenSifreTekrar ="";
}
if(isset($_POST["AdSoyad"])){
    $GelenAdSoyad= guvenlik($_POST["AdSoyad"]);
}else{
    $GelenAdSoyad ="";
}
if(isset($_POST["TelefonNumarasi"])){
    $GelenTelefonNumarasi = guvenlik($_POST["TelefonNumarasi"]);
}else{
    $GelenTelefonNumarasi ="";
}
if(isset($_POST["SozlesmeOnay"])){
    $GelenSozlesmeOnay = guvenlik($_POST["SozlesmeOnay"]);
}else{
    $GelenSozlesmeOnay ="";
}


$MD5sifre = md5($GelenSifre);

if(($GelenEmailAdresi!="") and ($GelenSifre!="") and ($GelenSifreTekrar!="") and ($GelenAdSoyad!="") and ($GelenTelefonNumarasi!="") and ($GelenSozlesmeOnay!="") )
{
    if($GelenSozlesmeOnay==0){
        header("Location:index.php?SK=16");
        exit();
    }else{
        if($GelenSifre!=$GelenSifreTekrar){
            header("Location:index.php?SK=15");
            exit();
        }else{
            $KontrolSorgusu = $con->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ?");
            $KontrolSorgusu->execute([$GelenEmailAdresi]);
            $Kullanicisayisi = $KontrolSorgusu ->rowCount();
           if($Kullanicisayisi>0){
            header("Location:index.php?SK=14");
            exit();
           }else{
            $UyeSorgusu = $con->prepare("INSERT INTO uyeler (EmailAdresi, Sifre , AdSoyad, TelefonNumarasi,Durumu, kayitTarihi, KayitIpAdresi)  values (?,?,?,?,?,?,?)" );
            $UyeSorgusu->execute([$GelenEmailAdresi,$MD5sifre,$GelenAdSoyad,$GelenTelefonNumarasi,1,$zaman_damgasi,$IPAdresi]);
            $KayitKontrol = $UyeSorgusu ->rowCount();

                if($KayitKontrol>0){
                         
                    header("Location:index.php?SK=11");
                    exit();

                }else{
                    header("Location:index.php?SK=12");
                    exit();
                }


           }
        }
    }
}


?>