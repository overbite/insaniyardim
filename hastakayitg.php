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
$id = (int)$id;
$query = "UPDATE hastalar SET isim='$isim',rapor='$rapor' WHERE id='$id'";
$sorgu = $connection -> query($query);
if ($sorgu) {
	header("Location: hastaara.php");
} else {
	echo "Rapor guncellenirken hata olustu.";
}
?>
