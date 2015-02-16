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
$cumle = "UPDATE aileler SET reis='$reis', telefon='$telefon', mahalle='$mahalle', sokak='$sokak', apnu='$apnu', kapinu='$kapinu', evegidildi='$evegidildi', yerkek='$yerkek', ykadin='$ykadin', ecocuk='$ecocuk', kcocuk='$kcocuk', bebek='$bebek', hasta='$hasta', ihtiyac='$ihtiyac', verilen='$verilen', guncelleyen='$guncelleyen', gunceltarih='$tarih', calisan='$calisan' WHERE id='$id'";

$query = $connection -> query($cumle);
if ($query) {
	header("Location: goruntule.php?id=".$id);
} else {
	echo $query;
	echo "\n<br>\n";
	echo "guncelleme sirasinda hata olustu";
}
?>
