<?php
if(isset($_SESSION["Kullanici"])){
?>





<?php

if(isset($_POST["KartNumarasi"])){
    $GelenKartNumarasi = guvenlik($_POST["KartNumarasi"]);
}else{
    $GelenKartNumarasi ="";
}
if(isset($_POST["cvv"])){
    $Gelencvv = guvenlik($_POST["cvv"]);
}else{
    $Gelencvv ="";
}

if($GelenKartNumarasi!="" && $Gelencvv!=""){

    $SepetSil= $con->prepare("DELETE FROM sepet WHERE  UyeId =? ");
    $SepetSil ->execute([$KullaniciID]);
    $SepetSilmeSayisi = $SepetSil->rowCount();
    header("Location:index.php?SK=47");
    exit();




}else{

header("Location:index.php?SK=48");
exit();
}
















?>
<?php
}else{
   header("Location:index.php");
   exit();
}

?>