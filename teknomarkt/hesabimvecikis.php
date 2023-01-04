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
                    <td><b> Hesabim</b> </td>
                </tr>
                <tr height ="40">
                    <td><b> Üyelik Bilgileri</b> </td>
                </tr>
                <tr height = "40"><td></td></tr>
               
                <tr height ="50">
                    <td valign="top" align="left"> Email Adresi </td>
                    <td valign="top" align="left"><?php echo $EmailAdresi; ?></td>
                </tr>
               
                <tr height ="50">
                    <td valign="top" align="left"> Ad Soyad </td>
                    <td valign="top" align="left"><?php echo $AdSoyad; ?></td>
                </tr>
                
                <tr height ="50">
                    <td valign="top" align="left"> Telefon Numarasi </td>
                    <td valign="top" align="left"><?php echo $TelefonNumarasi; ?></td>
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
