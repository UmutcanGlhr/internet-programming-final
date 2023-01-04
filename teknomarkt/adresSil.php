<?php
if(isset($_SESSION["Kullanici"])){

    
if(isset($_GET["ID"])){
    $GelenID = guvenlik($_GET["ID"]);
}else{
    $GelenID ="";
}


if($GelenID!=""){


    $AdresSil= $con->prepare("DELETE FROM adresler WHERE id = ? ");
    $AdresSil ->execute([$GelenID]);
    $AdresSilmeSayisi = $AdresSil->rowCount();
    if($AdresSilmeSayisi>0){
        header("Location:index.php?SK=30");
        exit();

    }else{
        header("Location:index.php?SK=31");
        exit();
    }




}else{
    header("Location:index.php?SK=31");
    exit();
}







?>
<?php
}else{
    header("Location:index.php");
    exit();
}

?>