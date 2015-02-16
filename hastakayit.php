<?php
session_start();
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
$connection -> query("INSERT INTO hastalar(isim,idiki,rapor) VALUES('$isim','$id','$rapor')");
$connection -> query("UPDATE aileler SET hasta='yok' WHERE id='$id'");
if($varmi == 'var') {
	header("Location: rapor.php?id=".$id);
} elseif ($varmi == 'yok') {
	header("Location: hastaara.php");
}
?>
