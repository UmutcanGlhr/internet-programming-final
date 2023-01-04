<?php
    if(isset($_GET["MenuID"])){
        $GelenMenuID = $_GET["MenuID"];
    }else{
        $GelenMenuID="";
    }



?>










<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr height="100" >
        <td width="250" align="left" >
            <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">


                <tr>
                    <td><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                            
                        </tr>
                     



                       
                        </table>
                    </td>

                    

                    
                </tr>









            </table>
        </td>
        <td width="11" align="left"></td>


                        






        <td width="795"  align="left" valign="top">
        <table width="795"  align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <div >
                            <form action="index.php?SK=37" method="POST">
                                <div align = "center">
                                
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>            

                    <tr><td>&nbsp;</td></tr>

                    <tr>
                        <td>
                            <?php
                            $UrunlerSorgusu =$con ->prepare("SELECT * FROM urunler WHERE UrunTuru='Buzdolabi' AND Durumu='1' ORDER BY id DESC");
                            $UrunlerSorgusu->execute();
                            $UrunSayisi = $UrunlerSorgusu->rowCount();
                            $UrunKayitlari = $UrunlerSorgusu->fetchAll(PDO::FETCH_ASSOC);

                            $DonguSayisi = 1;
                            $AdetSayisi = 3;
                            foreach($UrunKayitlari as $Kayit){
                            ?>

                                <td width = "191" valign = "top" align="left">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px solid black; margin-bottom:10px;">
                                        <tr height = "40" >
                                            <td  align="center"> <a href="index.php?SK=38&ID=<?php echo $Kayit["id"]; ?>"><img src="Resimler/Buzdolabi/<?php echo $Kayit["UrunResmiBir"]; ?>" border="0" width="190" height="160"></a></td>
                                            <tr height="26">
                                                <td width = "253" align="center"><a style="text-decoration: none; color:black; font-size:large; font-family:Arial, Helvetica, sans-serif;" href="index.php?SK=38&ID=<?php echo $Kayit["id"]; ?>"><?php echo $Kayit["UrunAdi"]; ?></a></td>
                                            </tr>
                                            <tr height="26">
                                                <td width = "253" align="center"><a style="text-decoration: none; color:black; font-size:large; font-family:Arial, Helvetica, sans-serif;" href="index.php?SK=38&ID=<?php echo $Kayit["id"]; ?>"><?php echo $Kayit["UrunAciklamasi"]; ?></a></td>
                                            </tr>



                                            <tr height="26">
                                                <td width = "253" align="center"><a style="text-decoration: none; color:black; font-size:large; font-family:Arial, Helvetica, sans-serif;" href="index.php?SK=38&ID=<?php echo $Kayit["id"]; ?>"><?php echo $Kayit["UrunFiyati"]; ?> TL</a></td>
                                            </tr>
                                            
                                        </tr>
                                    </table>

                                </td>
                                <?php
                                if($DonguSayisi<$AdetSayisi){
                                ?>
                                    <td width="10">&nbsp;</td>
                                <?php
                                }
                                ?>

                            <?php
                                $DonguSayisi++;
                                if($DonguSayisi>$AdetSayisi){
                                    echo "</tr><tr>";
                                    $DonguSayisi=1;

                                }



                            }
                           ?>
                            








                        </td>
                    </tr>







        </table>

        </td>

    </tr>

</table>


