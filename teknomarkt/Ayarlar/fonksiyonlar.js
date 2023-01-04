$(document).ready(function() {


    $.UrunDetayResmiDegistir = function (Klasor,ResimDegeri) {
        
        var ResimicinDosyaYolu ="Resimler/" + Klasor + "/"+ ResimDegeri;
        $("#BuyukResim").attr("src", ResimicinDosyaYolu);
    }



});