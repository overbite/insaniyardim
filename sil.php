<?php
session_start();
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
}
require 'mysql.php';
$connection = new Configdb;
extract($_GET);
$cumle = "DELETE FROM aileler WHERE id='$id'";
$query = $connection -> query($cumle);
if ($query) {
	header("Location: aileler.php");
} else {
	echo "Silme sirasinda hata olustu.";
}
?>
