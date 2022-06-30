<?php 
$sunucu = "localhost";
$kullanici = "root";
$sifre = "";
$veritabani = "bitirme";
$sunucuya_baglan = @mysqli_connect($sunucu, $kullanici, $sifre, $veritabani) or die ("sunucuya bağlanılamadı");
?>