<?php
    $IPAdresi = $_SERVER["REMOTE_ADDR"];
    $zaman_damgasi = time();
    $tarihsaat = date("d.m.Y H:i:s", $zaman_damgasi);


    function rakamharictumkarakterlerisil($deger){
        $islem = preg_replace("/[^0-9]/", "",$deger);
        $sonuc = $islem;
        return $sonuc;
    }
    function donuşumlerigeridondur($deger){
        $geridondur = htmlspecialchars_decode($deger, ENT_QUOTES);
        $sonuc = $geridondur;
        return $sonuc;
    }



    function guvenlik($deger){
        $bosluksil = trim($deger);
        $taglaritemizle = strip_tags($bosluksil);
        $etkisizyap = htmlspecialchars($taglaritemizle);
        $sonuc = $etkisizyap;
        return $sonuc; 
    }
    function SayiliIcerikleriFiltrele($deger){
        $bosluksil = trim($deger);
        $taglaritemizle = strip_tags($bosluksil);
        $etkisizyap = htmlspecialchars($taglaritemizle);
        $temizle = rakamharictumkarakterlerisil($etkisizyap);
        $sonuc = $temizle;
        return $sonuc;
    }
    
?>