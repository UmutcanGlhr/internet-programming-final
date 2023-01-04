<?php
if(isset($_SESSION["Kullanici"])){
?>


<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <form action="index.php?SK=33" method="POST">
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height ="40">
                    <td>Hesabim > Adres Kayit</td>
                </tr>
                <tr height ="30">
                    <td>Adres Bilgilerini Giriniz</td>
                </tr>
                <tr height ="30">
                    <td></td>
                </tr>
                <tr height ="30">
                    <td valign="top" align="left"><input type="text" name="AdSoyad" placeholder="Ad Soyad Giriniz..."></td>
                </tr>
                <tr height ="30">
                    <td valign="top" align="left"><input type="text" name="Adres" placeholder="adres bilgilerini giriniz ...."></td>
                    
                </tr>
                <tr height ="30">
                    <td valign="top" align="left"><input type="text" name="ilce" placeholder="İlçenizi giriniz....."></td>
                    
                </tr>
                <tr height ="30">
                    <td valign="top" align="left"><input type="text" name="Sehir" placeholder="Sehir giriniz......"></td>
                    
                </tr>
                <tr height ="30">
                    <td valign="top" align="left"><input type="text" name="TelefonNumarasi" placeholder="TelefonNumarasi"></td>
                    
                </tr>
                <tr height ="30">
                    <td colspan="2"valign="top" align="left"><input type="submit" value="Adresi Kaydet"></td>
                    
                </tr>
                    
            </table>
        </form>
    </tr>


</table>


<?php
}else{
    header("Location:index.php");
    exit();
}

?>