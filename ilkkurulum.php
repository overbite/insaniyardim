<?php
require 'mysql.php';
$connection = new Configdb;
$sifre = "ŞİFREYİ BURAYA YAZIN";

$sifrex = md5(md5($sifre));
$kadi = "admin";
$ekle = $connection->query("INSERT INTO users(kadi,sifre) VALUES('$kadi','$sifrex') ");

if ($ekle) {
  echo "islem tamam, ilkkurulum.php dosyasini siliniz.";
} else {
  echo "hata: admin eklenemedi.";
}
?>
