<?php
session_start();
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
$connection = new Configdb;
extract($_GET);
$id = (int)$id;
$sorgu = $connection -> query("DELETE FROM hastalar WHERE id='$id'");
if ($sorgu) {
	header("Location: hastaara.php");
} else {
	echo "Hasta silinirken hata olustu.";
}
?>
