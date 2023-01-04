<?php
if(isset($_SESSION["Kullanici"])){

    
if(isset($_GET["ID"])){
    $GelenID = guvenlik($_GET["ID"]);
}else{
    $GelenID ="";
}


if($GelenID!=""){


    $SepetSil= $con->prepare("DELETE FROM sepet WHERE id = ? AND UyeId =? ");
    $SepetSil ->execute([$GelenID,$KullaniciID]);
    $SepetSilmeSayisi = $SepetSil->rowCount();
    if($SepetSilmeSayisi>0){
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

?>
<?php
}else{
    header("Location:index.php");
    exit();
}

?>