<?php
if(isset($_SESSION["Kullanici"])){
?>

<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height ="40">
                    <td style="border-bottom: 2px solid black;">Alişveriş Sepeti</td>
                </tr>
                <tr height ="30">
                    <td style="border-bottom: 1px solid black;">Ürünler </td>
                </tr>
                <tr height ="30">
                    <td></td>
                </tr>
                    <?php
                    
                    $SepettekiUrunlerSorgusu = $con->prepare("SELECT * FROM sepet WHERE UyeId =?  ORDER BY id  DESC");
                    $SepettekiUrunlerSorgusu ->execute([$KullaniciID]);
                    $SepettekiUrunSayisi = $SepettekiUrunlerSorgusu->rowCount();
                    $SepettekiKayitlar = $SepettekiUrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);

                    if($SepettekiUrunSayisi>0){
                            foreach($SepettekiKayitlar as $SepetSatirlari){
                                $SepetID = $SepetSatirlari["id"];
                                $SepettekiUrunID = $SepetSatirlari["UrunId"];
                                $SepettekiUrunAdedi = $SepetSatirlari["UrunAdedi"];

                                $UrunBilgileri = $con->prepare("SELECT * FROM urunler WHERE id=? LIMIT 1");
                                $UrunBilgileri ->execute([$SepettekiUrunID]);
                              
                                $UrunKayit = $UrunBilgileri->fetch(PDO::FETCH_ASSOC);


                                $UrununTuru = $UrunKayit["UrunTuru"];
                                $UrunResmi = $UrunKayit["UrunResmiBir"];
                                $UrunAdi = $UrunKayit["UrunAdi"];
                                $UrunFiyati = $UrunKayit["UrunFiyati"];
                                    if($UrununTuru == 'Buzdolabi'){
                                        $UrunResimKlasoru = "Buzdolabi";
                                    }
                    
                    ?>


                                <tr height ="100">
                                    <td valign ="bottom" align="left"> 
                                        <table width ="700" align="left" border="0">
                                            <tr>
                                                <td style="border-bottom: 1px solid black;">    
                                                    <img src="Resimler/<?php echo $UrunResimKlasoru;?>/<?php echo $UrunResmi;?>" border ="0" width="60" height="80">
                                                </td>
                                                 <td width="100">
                                                    <?php echo $UrunAdi;?>
                                                </td>
                                                <td width="100">
                                                <?php  echo "Adedi: " ; echo $SepettekiUrunAdedi;?>
                                                </td>
                                                <td width="100">
                                                <?php echo $UrunFiyati; echo "TL";?>
                                                </td>
                                                <td width="20">
                                                    <a href="index.php?SK=45&ID=<?php echo $SepetID; ?>" style="text-decoration: none; color:blueviolet;">Sil</a>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr><td align="center">
                                    <a href="index.php?SK=46" style="text-decoration: none; color:crimson; font-size:20px;">Sepeti Onayla</a>
                                </td></tr>
                                      
                                


                    <?php
                                }
                            }else{
                                ?>

                                <tr>
                                    <td>Alişveriş Sepeti Boş</td>
                                </tr>


                                <?php
                            }
                    ?>















                

            </table>
       
    </tr>


</table>































<?php
}else{
   echo "Sepet Boş";
}

?>