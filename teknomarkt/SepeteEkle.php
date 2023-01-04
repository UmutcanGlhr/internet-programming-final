<?php
if(isset($_SESSION["Kullanici"])){
    if(isset($_GET["ID"])){
        $GelenID = guvenlik($_GET["ID"]);
    }else{
        $GelenID = "" ;
    }



if($GelenID!=""){

    $KullaniciniSepetKontolSorgusu = $con->prepare("SELECT * FROM sepet Where UyeId=? ORDER BY id DESC LIMIT 1");
    $KullaniciniSepetKontolSorgusu->execute([$KullaniciID]);
    $Sepetsayisi = $KullaniciniSepetKontolSorgusu ->rowCount();
    if($Sepetsayisi>0){
        $UrununSepetKontolSorgusu = $con->prepare("SELECT * FROM sepet Where UyeId=? AND UrunId =? ORDER BY id DESC LIMIT 1");
        $UrununSepetKontolSorgusu->execute([$KullaniciID,$GelenID]);
        $UrunSepetsayisi = $UrununSepetKontolSorgusu ->rowCount();
        $UrununSepetKaydi = $UrununSepetKontolSorgusu->fetch(PDO::FETCH_ASSOC);

        if($UrunSepetsayisi>0){

            $UrununIdsi = $UrununSepetKaydi["id"];
            $UrununSepettekiMevcudAdedi = $UrununSepetKaydi["UrunAdedi"];
            $UrununYeniAdedi = $UrununSepettekiMevcudAdedi+1;
           
            $UrunGuncellemeSorgusu = $con->prepare("UPDATE sepet SET UrunAdedi=? Where id=? AND UyeId=? AND UrunId=? LIMIT 1");
            $$UrunGuncellemeSorgusu->execute([$UrununYeniAdedi,$UrununIdsi,$KullaniciID,$GelenID]);
            $UrunGuncelle= $$UrunGuncellemeSorgusu ->rowCount();
            if($UrunGuncelle>0){
                header("Location:index.php");
                exit();

            }else{
                header("Location:index.php");
                exit();
            }



        }else{
           
            header("Location:index.php");
                exit();

        }

    }else{
        
        $UrunEklemeSorgusu = $con->prepare("INSERT INTO sepet (UyeId,UrunId,UrunAdedi,SepetNumarasi) VALUES (?,?,?,?)");
        $UrunEklemeSorgusu->execute([$KullaniciID,$GelenID,1,1]);  
        $UrunEklemeSayisi = $UrunEklemeSorgusu ->rowCount();
        $SonIdDegeri =$con->LastInsertId();
        if($UrunEklemeSayisi>0){
            $SiparisNumarasiniGuncelle = $con->prepare("UPDATE sepet SET SepetNumarasi=? Where UyeId=? ");
            $SiparisNumarasiniGuncelle->execute([$SonIdDegeri,$KullaniciID]);
            $SiparisNumarasiGuncelleSayisi = $SiparisNumarasiniGuncelle ->rowCount();
            $SiparisNumarasiGuncelleSayisi = $SiparisNumarasiniGuncelle ->rowCount();
            if($SiparisNumarasiGuncelleSayisi>0){
                header("Location:index.php?SK=44");
                exit();
            }else{
                header("Location:index.php?SK=44");
                exit();
            }

        }else{
            header("Location:index.php?SK=44");
                exit();
        }

    }






}else{
    header("Location:index.php");
                exit();
}
}else{
    header("Location:index.php?SK=43");
    exit();
}

?>