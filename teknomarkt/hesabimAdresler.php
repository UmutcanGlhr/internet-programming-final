<?php
if(isset($_SESSION["Kullanici"])){
?>
    <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

    <tr height="">
        <td colspan="3"><hr/></td>
    </tr>
    <tr>
        <td colspan="3">
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="border:1px solid black; text-align:center; padding: 10px 0;"><a href="index.php?SK=26" style="text-decoration: none;"><i><b> Üyelik Bilgileri</b></i></a></td>
                    <td>&nbsp;</td>
                    <td style="border:1px solid black; text-align:center; padding: 10px 0;"><i><b><a href="index.php?SK=28" style="text-decoration: none;"> Adresler</b></i></a></td>
                    
                    
              
                    
                </tr>
            </table>
        </td>
    </tr>

    <tr height="50">
        <td colspan="3"><hr/></td>
    </tr>



    <tr>
        
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height ="40">
                    <td><b> Hesabim > Adres Bilgileri </b> </td>
                </tr>
                <tr height ="40">
                    <td></td>
                </tr>
                <tr height = "40"><td colspan="5" style="background: grey; color:black" ><b>Adresler</td></b> </tr>
               
               <?php
               $AdreslerSorgusu = $con->prepare("SELECT * FROM adresler WHERE UyeId = ? ");
               $AdreslerSorgusu ->execute([$KullaniciID]);
               $AdreslerSayisi = $AdreslerSorgusu->rowCount();
               $Adreslerkaydi = $AdreslerSorgusu->fetchAll(PDO::FETCH_ASSOC);
               if($AdreslerSayisi>0){
                    foreach($Adreslerkaydi as $Adres){
                 ?>           
                        <tr bgcolor = "#FF69B4"height="40">
                            <td style="color:#0000CD" align="left"><b><?php echo $Adres["AdSoyad"];?> - <?php echo $Adres["adres"];?>-<?php echo $Adres["Ilce"];?>-<?php echo $Adres["Sehir"];?>-<?php echo $Adres["TelefonNumarasi"];?></b>   </td>
                            <td></td>
                            <td><a style="text-decoration: none; color:black;" href="index.php?SK=29&ID=<?php echo $Adres["id"]; ?>"><b>Sil</b></a></td>
                            <td></td>
                        </tr>
                    

                <?php
                    }
               }else{
                ?>
                        
                <tr height="30">
                    <td colspan="5" align="left">Sisteme Kayitli Adresiniz Bulunmamaktadir.</td>
                </tr>

                <?php
               } 
                ?>
                

                <tr height="200" valign="bottom"  >
                    <td colspan="5" align="center"><a style="text-decoration: none; font-size: large; color:crimson" href="index.php?SK=32">+ Adres Ekle</a> </td>
                </tr>

            </table>
        
    </tr>


</table>

<?php
}else{
    header("Location:index.php");
    exit();
}

?>