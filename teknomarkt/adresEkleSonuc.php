<?php
if(isset($_SESSION["Kullanici"])){


if(isset($_POST["AdSoyad"])){
    $GelenAdSoyad= guvenlik($_POST["AdSoyad"]);
}else{
    $GelenAdSoyad ="";
}
if(isset($_POST["Adres"])){
    $GelenAdres= guvenlik($_POST["Adres"]);
}else{
    $GelenAdres ="";
}
if(isset($_POST["ilce"])){
    $Gelenilce= guvenlik($_POST["ilce"]);
}else{
    $Gelenilce ="";
}
if(isset($_POST["Sehir"])){
    $GelenSehir= guvenlik($_POST["Sehir"]);
}else{
    $GelenSehir ="";
}
if(isset($_POST["TelefonNumarasi"])){
    $GelenTelefonNumarasi = guvenlik($_POST["TelefonNumarasi"]);
}else{
    $GelenTelefonNumarasi ="";
}


if(($GelenAdSoyad!="")and ($GelenAdres !="")and ($Gelenilce !="") and ($GelenSehir !="") and ($GelenTelefonNumarasi !="")){

    $AdresEklemeSorgu = $con->prepare("INSERT INTO adresler (UyeId,AdSoyad,adres,Ilce,Sehir,TelefonNumarasi) values (?,?,?,?,?,?)");
    $AdresEklemeSorgu->execute([ $KullaniciID,$GelenAdSoyad,$GelenAdres,$Gelenilce,$GelenSehir,$GelenTelefonNumarasi ]);
    $EklemeKontrol = $AdresEklemeSorgu->rowCount();

    if($EklemeKontrol>0){
        header("Location:index.php?SK=34");
        exit();

    }else{
        header("Location:index.php?SK=35");
        exit();
    }


}else{
    header("Location:index.php?SK=35");
    exit();
}










}else{
    header("Location:index.php");
    exit();
}

?>