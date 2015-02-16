<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
$connection = new Configdb;
extract($_GET);
$connection -> query("UPDATE aileler SET hasta='yok' WHERE id='$id'");
?>
<html>
<head>
<script type="text/javascript">setInterval(function(){window.location = "./hastaara.php";},2000);</script>
</head>
<body>
<h1>
BASARIYLA SILINDI. YONLENDIRILIYORSUNUZ.
</h1>
</body>
</html>
