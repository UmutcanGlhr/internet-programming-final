<?php

session_start();
ob_start();


require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");
if(isset($_REQUEST["SK"])){
    $SayfaKoduDegeri = SayiliIcerikleriFiltrele($_REQUEST["SK"]);
}else{
    $SayfaKoduDegeri = 0;
}



$kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
foreach ($kur -> Currency as $cur) {
   if ($cur["Kod"] == "USD") {
       $usdAlis  = $cur -> ForexBuying;
       $usdSatis = $cur -> ForexSelling;
   }

   if ($cur["Kod"] == "EUR") {
       $eurAlis  = $cur -> ForexBuying;
       $eurAlis = $cur -> ForexSelling;
   }
}

?>



<!DOCTYPE html>
<html lang="tr-TR">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 Days">
    <title><?php echo donuşumlerigeridondur($SiteTitle); ?></title>
    <meta name="description " content="<?php echo donuşumlerigeridondur($SiteDescription); ?>">
    <meta name="keywords " content="<?php echo donuşumlerigeridondur($SiteKeywords); ?>">
    <script type="text/javascript" src="Frameworks/JQUERY/jquery-3.6.3.min.js" lang="javascript"></script>  
    <link type="text/css" rel="stylesheet" href="Ayarlar/stil.css">
    <script type="text/javascript" src="Ayarlar/fonksiyonlar.js" lang="javascript"></script>
</head>
<body>
    <table width="1065" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr height="40" bgcolor="#353745" >
            <td><h1>TeknoMarkt</h1></td>
        </tr>
        <tr height="110">
            <td>
                <table width="1065" height="30" align="center" border="0" cellpadding="0" cellspacing="0" >
                    <tr bgcolor ="#0088CC">
                        <td></td>
                            <td>
                            <b>USD Aliş: </b> <?php echo $usdAlis; ?> <br>
                            </td>
                            <td>
                            <b>USD Satiş: </b> <?php echo $usdSatis; ?>
                            </td>
                        <?php

                            if(isset($_SESSION["Kullanici"])){
                                ?>    
                                <td width="20"></td>
                                <td width="75"> <a href="index.php?SK=26" class="BeyazYazi">Hesabim </a> </td>
                                <td width="20"></td>
                                <td width="85"> <a href="index.php?SK=27" class="BeyazYazi">Çikiş Yap</a></td>
                                <td width="20"></td>



                                

                       
                        <?php
                            }else{
                                ?>
                                <td width="20"></td>
                                 <td width="75"> <a href="index.php?SK=17" class="BeyazYazi">Giriş Yap </a> </td>
                                <td width="20"></td>
                                <td width="85"> <a href="index.php?SK=9" class="BeyazYazi">  Yeni Üye Ol </a></td>
                                 <td width="20"></td>

                        <?php     
                            }
                         ?>
                            <?php

                                if(isset($_SESSION["Kullanici"])){
                                    ?>
                                <td width="103"> <a href="index.php?SK=44" class="BeyazYazi"> Alişveriş Sepeti</a></td>

                                <?php     
                                 }else{
                                    ?>

<td width="103" style="color:white;" >Alişveriş Sepeti</td>
                                <?php 
                                 }
                                ?>




                    </tr>
                </table>
                <table width="1065" height="80" align="center" border="0" cellpadding="0" cellspacing="0" >
                    <tr >
                            <td width="192"></td>
                    
                        <td >
                            
                            <table width="873" height="30" align="left" border="0" cellpadding="0" cellspacing="0" >
                            <tr align="right">
                            <td width ="354"></td>
                            <td width ="95"><b><a href="index.php?SK=0" class="Anamenu"> Ana Sayfa</a></b></td>
                            <td width ="120"><b><a href="index.php?SK=37" class="Anamenu"> Buzdolabi</a></b></td>
                            
                            <td></td>
                            <td></td>
                            </tr>
                            </table>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top">
                <table widht="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td align="center">
                            <?php
                            if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="")or$SayfaKoduDegeri==0)
                            {   
                                    include($Sayfa[0]);
                            }else{
                                include($Sayfa[$SayfaKoduDegeri]);
                            }
                            ?>
                        </td>
                    </tr>


            </table>
            
        </td>
        </tr>
        
        <tr height="210">
            <td>
                <table width="1065" height="30" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#F9F9F9" >
                    <tr height ="30" >
                        <td width="250" style="border-bottom: 1px dashed red;"><b> Kurumsal</b></td>
                        <td width="20"></td>
                        <td width="250" style="border-bottom: 1px dashed red;"><b>Üyelik ve Hizmetler</b></td>
                        <td width="20" ></td>
                        <td width="250" style="border-bottom: 1px dashed red;"><b>Sözleşmeler</b></td>
                        <td width="20"></td>
                        <td width="250"style="border-bottom: 1px dashed red;"><b>Bizi Takip</b></td>
                    </tr>
                    <tr height ="30" >
                        <td width=""><a href="index.php?SK=2">Hakkimizda</a> </td>
                        <td width="20"></td>
                        <td width=""><a href="#">Giriş Yap</a></td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=3">Üyelik Sözleşmesi</a></td>
                        <td width="20"></td>
                        <td width="">Instagram : </td>
                    </tr>
                    <tr height ="30">
                        <td width=""><a href="#">Banka Hesaplarimiz</a> </td>
                        <td width="20"></td>
                        <td width=""><a href="#">Yeni Üye Ol</a> </td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=4">Kullanim Koşullari</a> </td>
                        <td width="20"></td>
                        <td width="">Facebook :</td>
                    </tr>
                    <tr height ="30">
                        <td width=""><a href="#">Havale Bildirim Formu</a></td>
                        <td width="20"></td>
                        <td width=""><a href="#">Çok sorulan sorular</a></td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=5">Gizlilik Sözleşmesi</a></td>
                        <td width="20"></td>
                        <td width="">Twitter :</td>
                    </tr>
                    <tr height ="30">
                        <td width=""><a href="#">Kargo Nerede</a></td>
                        <td width="20"></td>
                        <td width=""></td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=6">Mesafeli Satiş Sözleşmesi</a></td>
                        <td width="20"></td>
                        <td width="">Youtube :</td>
                    </tr>
                    <tr height ="30">
                        <td width=""><a href="#">İletişim</a></td>
                        <td width="20"></td>
                        <td width=""></td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=7">Teslimat</a></td>
                        <td width="20"></td>
                        <td width=""> </td>
                    </tr>
                    <tr height ="30">
                        <td width=""></td>
                        <td width="20"></td>
                        <td width=""></td>
                        <td width="20"></td>
                        <td width=""><a href="index.php?SK=8">İptal ve İade ve Değişim</a></td>
                        <td width="20"></td>
                        <td width=""></td>
                    </tr>
                </table>    

            </td>
        </tr>
        <tr height="30">
            <td align="center"><?php echo donuşumlerigeridondur($SiteCopyrightMetni);?></td>
        </tr>
        

    </table>




</body>
</html>

<?php

$con = null;
ob_end_flush();

?>