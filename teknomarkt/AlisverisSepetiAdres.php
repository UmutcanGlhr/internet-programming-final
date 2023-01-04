<?php
if(isset($_SESSION["Kullanici"])){
?>


<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

<form action="index.php?SK=49" method="POST">
    
    
   

    <tr height="40">
        <td >
        <input type="text" name= "KartNumarasi" placeholder="Kart Numaranizi giriniz">
        </td>
    </tr>
    
    <tr height="40">
        <td>
        <input type="text" name= "cvv" placeholder="cvv giriniz">
        </td>
    </tr>
   
    <tr height="40">
        <td>
        <input type="submit" value="Satin Al">
        </td>
    </tr>



    







    </form>
</table>






<?php
}else{
   header("Location:index.php");
   exit();
}

?>