<?php
try{
    $con = new PDO("mysql:host=localhost;dbname=teknomarktweb;charset=UTF8","root","mysql1234");
}catch(PDOException $Hata){
    echo "bağlanti hatasi";
    die();
}

$ayarlarsorgusu = $con->prepare("SELECT * FROM ayarlar LIMIT 1");
$ayarlarsorgusu->execute();
$ayarsayisi = $ayarlarsorgusu ->rowCount();
$ayar = $ayarlarsorgusu ->fetch(PDO::FETCH_ASSOC);
if($ayarsayisi >0){
    
    $SiteAdi =  $ayar["SiteAdi"];
    $SiteTitle =  $ayar["SiteTitle"];
    $SiteDescription =  $ayar["SiteDescription"];
    $SiteKeywords =  $ayar["SiteKeywords"];
    $SiteCopyrightMetni =  $ayar["SiteCopyrightMetni"];
    $SiteLogosu =  $ayar["SiteLogosu"];
    $SiteEmailAdresi =  $ayar["SiteEmailAdresi"];
    $SiteEmailSifresi =  $ayar["SiteEmailSifresi"];
    $SiteLinki=  $ayar["SiteLinki"];

}else{
    die();
}
$MetinlerSorgusu = $con->prepare("SELECT * FROM sozlesmelervemetinler LIMIT 1");
$MetinlerSorgusu->execute();
$Metinsayisi = $MetinlerSorgusu ->rowCount();
$Metin = $MetinlerSorgusu ->fetch(PDO::FETCH_ASSOC);
if($Metinsayisi >0){
    
    $hakkimizdametni =  $Metin["hakkimizdametni"];
    $üyeliksözlesmesimetni =  $Metin["üyeliksözlesmesimetni"];
    $kullanimkosullarimetni =  $Metin["kullanimkosullarimetni"];
    $gizliliksözlesmesimetni =  $Metin["gizliliksözlesmesimetni"];
    $mesafelisatissözlesmesimetni =  $Metin["mesafelisatissözlesmesimetni"];
    $teslimatmetni = $Metin["teslimatmetni"];
    $iptaliadedegisimmetni =  $Metin["iptaliadedegisimmetni"];
    


}else{
    die();
}


if(isset($_SESSION["Kullanici"])){
    $KullaniciSorgusu = $con->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? " );
    $KullaniciSorgusu->execute([$_SESSION["Kullanici"]]);
    $Kullanicisayisi = $KullaniciSorgusu ->rowCount();
    $Kullanici = $KullaniciSorgusu ->fetch(PDO::FETCH_ASSOC);
    if($Kullanicisayisi >0){
        
        $KullaniciID =  $Kullanici["id"];
        $EmailAdresi =  $Kullanici["EmailAdresi"];
        $Sifre =  $Kullanici["Sifre"];
        $AdSoyad =  $Kullanici["AdSoyad"];
        $TelefonNumarasi =  $Kullanici["TelefonNumarasi"];
        $Durumu = $Kullanici["Durumu"];
        $kayitTarihi  =  $Kullanici["kayitTarihi"];
        $KayitIpAdresi  =  $Kullanici["KayitIpAdresi"]; 
        

    }else{
        die();
    }
}


if(isset($_SESSION["Yönetici"])){
    $YöneticiSorgusu = $con->prepare("SELECT * FROM yöneticiler WHERE KullaniciAdi = ? " );
    $YöneticiSorgusu ->execute([$_SESSION["Yönetici"]]);
    $Yöneticisayisi = $YöneticiSorgusu  ->rowCount();
    $Yönetici = $YöneticiSorgusu  ->fetch(PDO::FETCH_ASSOC);
    if($Yöneticisayisi >0){
        
        $YöneticiID =  $Yönetici["id"];
        $KullaniciAdi = $Yönetici["KullaniciAdi"];
        $Sifre =  $Yönetici["Sifre"];
        $AdSoyad =  $Yönetici["AdSoyad"];
        $EmailAdresi =  $Yönetici["EmailAdresi"];
        $TelefonNumarasi =  $Yönetici["TelefonNumarasi"];
        
        

    }else{
        die();
    }
}








?>