<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
$tarih=time();
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
$connection = new Configdb;
foreach ($_POST as $eleman=>$icerik) {
	$_POST[$eleman] = addslashes($icerik);
}
extract($_POST);
$ekle = $connection->query("INSERT INTO aileler(reis,telefon,mahalle,sokak,apnu,kapinu,evegidildi,yerkek,ykadin,ecocuk,kcocuk,bebek,hasta,ihtiyac,verilen,kaydeden,guncelleyen,gunceltarih,calisan) VALUES('$reis','$telefon','$mahalle','$sokak','$apnu','$kapinu','$evegidildi','$yerkek','$ykadin','$ecocuk','$kcocuk','$bebek','$hasta','$ihtiyac','$verilen','$kaydeden','$kaydeden','$tarih','$calisan')");

if ($ekle == true) {
	header("Location: goruntule.php?id=".$connection->insertid());	
} else {
	echo "Hata olustu, tekrar deneyin.\n<br><br>\nHata devam ederse bildirin. kudret";
}
?>
