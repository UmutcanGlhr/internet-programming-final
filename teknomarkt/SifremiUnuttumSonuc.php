<?php

if(isset($_POST["EmailAdresi"])){
    $GelenEmailAdresi = guvenlik($_POST["EmailAdresi"]);
}else{
    $GelenEmailAdresi ="";
}
if(isset($_POST["TelefonNumarasi"])){
    $GelenTelefonNumarasi= guvenlik($_POST["TelefonNumarasi"]);
}else{
    $GelenTelefonNumarasi ="";
}
if(isset($_POST["SifreYenile"])){
    $GelenSifre = guvenlik($_POST["SifreYenile"]);
}else{
    $GelenSifre ="";
}
if(isset($_POST["SifreYenileTekrar"])){
    $GelenSifreTekrar = guvenlik($_POST["SifreYenileTekrar"]);
}else{
    $GelenSifreTekrar ="";
}

$Md5Sifre = md5($GelenSifre);

if(($GelenEmailAdresi !="") and ($GelenTelefonNumarasi !="") and ($GelenSifre !="")and($GelenSifreTekrar !=""))
{   
    if($GelenSifre!=$GelenSifreTekrar){
        header("Location:index.php?SK=25");
        exit();

    }else{
        $KontrolSorgusu = $con->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? AND TelefonNumarasi = ?");
        $KontrolSorgusu->execute([$GelenEmailAdresi,$GelenTelefonNumarasi]);
        $Kullanicisayisi = $KontrolSorgusu ->rowCount();
         $KullaniciKaydi = $KontrolSorgusu ->fetch(PDO::FETCH_ASSOC);
        if($KullaniciKaydi>0){
            $SifreDegistirSorgusu = $con->prepare("UPDATE uyeler SET Sifre = ? WHERE EmailAdresi = ?");
            $UyeSifre->execute([$Md5Sifre,$GelenEmailAdresi]);
            $Kontrol = $UyeSifre ->rowCount();
            
            if($Kontrol){
                header("Location:index.php?SK=17");
                exit();
            }

        }else{
            echo 'Kullanici  bulunamadi';
        } 
    }


}else{
    header("Location:index.php?SK=25");
    exit();

}

?>