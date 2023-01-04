<?php
if(isset($_GET["ID"])){

$GelenID = SayiliIcerikleriFiltrele(guvenlik($_GET["ID"]));


$UrunSorgusu = $con->prepare("SELECT * FROM urunler WHERE id = ? AND Durumu = ? ");
$UrunSorgusu->execute([$GelenID,1]);
$UrunBilgisi = $UrunSorgusu ->rowCount();
$UrunSorgusuKaydi =$UrunSorgusu->fetch(PDO::FETCH_ASSOC);
if($UrunBilgisi>0){

    $UrunTuru = $UrunSorgusuKaydi["UrunTuru"];
        if($UrunTuru=="Buzdolabi"){
            $ResimKlasoru = "Buzdolabi";
        }elseif($UrunTuru=="Camasir Makinesi"){
            $ResimKlasoru = "Camasir Makinesi";
        }else{
            $ResimKlasoru = "Bulasik Makinesi";
        }

 
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>

        <td width="350" valign="top">
        <table width="350" align="center" border="0" cellpadding="0" cellspacing="0">

        <tr>
            <td style="border:1px solid black;" align="center">
            <img id="BuyukResim" src="Resimler/<?php echo $ResimKlasoru;?>/<?php echo $UrunSorgusuKaydi["UrunResmiBir"];   ?>" width="350" height="400" border="0">
            </td>
        </tr>

        <tr height="5">
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>
            <table width="350" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                        <td width="10"></td>
                        <td width="75" style="border:1px solid black;" onclick="$.UrunDetayResmiDegistir('<?php echo $ResimKlasoru; ?>' ,'<?php echo $UrunSorgusuKaydi['UrunResmiBir']; ?>');"> <img src="Resimler/<?php echo $ResimKlasoru;?>/<?php echo $UrunSorgusuKaydi["UrunResmiBir"];   ?>" width="75" height="100" border="0"></td>
                        <td width="10">&nbsp;</td>
                        <td width="75" style="border:1px solid black;" onclick="$.UrunDetayResmiDegistir('<?php echo $ResimKlasoru; ?>' ,'<?php echo $UrunSorgusuKaydi['UrunResmiiki']; ?>');"> <img src="Resimler/<?php echo $ResimKlasoru;?>/<?php echo $UrunSorgusuKaydi["UrunResmiiki"];   ?>" width="75" height="100" border="0"></td>
                        <td width="10">&nbsp;</td>
                        <td width="75" style="border:1px solid black;" onclick="$.UrunDetayResmiDegistir('<?php echo $ResimKlasoru; ?> ','<?php echo $UrunSorgusuKaydi['UrunResmiUc']; ?>');"> <img src="Resimler/<?php echo $ResimKlasoru;?>/<?php echo $UrunSorgusuKaydi["UrunResmiUc"];   ?>" width="75" height="100" border="0"></td>
                        <td width="10">&nbsp;</td>
                        <td width="75" style="border:1px solid black;" onclick="$.UrunDetayResmiDegistir('<?php echo $ResimKlasoru; ?>' ,'<?php echo $UrunSorgusuKaydi['UrunResmiDort']; ?>');"> <img src="Resimler/<?php echo $ResimKlasoru;?>/<?php echo $UrunSorgusuKaydi["UrunResmiDort"];   ?>" width="75" height="100" border="0"></td>
                        <td width="10"></td>


                </tr>


            </table>
            </td>
        </tr>


        </table>
        </td>


        <td width="50">&nbsp;</td>


        <td width="705" valign = "top">
            <form action="index.php?SK=42&ID=<?php  echo $UrunSorgusuKaydi["id"]; ?>" method="POST">
        <table width="705" align="center" border="0" cellpadding="0" cellspacing="0">
            <tr height ="50" bgcolor="#F1F1F1">
                    <td style="text-align:left; font-size:18px; font-weight:bold; color:black"> <?php echo $UrunSorgusuKaydi["UrunAdi"]; ?>   </td>
            </tr>
                <tr>
                <td style="text-align:left; font-size:18px; font-weight:bold; color:black"> <?php echo $UrunSorgusuKaydi["UrunAciklamasi"]; ?>   </td>   
                </tr>


            <tr>
            <td style="text-align:left; font-size:18px; font-weight:bold; color:black"> <?php echo $UrunSorgusuKaydi["UrunFiyati"]; ?>  TL </td>
            </tr>

            <tr height ="50" bgcolor="#F1F1F1" >
               <td > <input style="color: red; background-color:aqua; border:0; height: 70px; width: 100px;" type="submit" value="Sepete Ekle"> </td>
            </tr>


            <tr>
                <td></td>
            </tr>

        </table>
        </form>
        </td>



    </tr>
</table>
<?php
}else{
    header("Location:index.php");
    exit();
}
}else{
header("Location:index.php");
exit();
}
?>