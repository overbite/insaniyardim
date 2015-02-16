<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Anasayfa</title>
</head>

<body>
<center>
<h1>Yardım Takip Sayfası</h1>
</center>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black; text-align: center">
			<a href="./ailekayit.php" style="color:#3F0"><h1>Aile Kayıt</h1></a>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black; text-align: center">
			<a href="./aileler.php" style="color:#F0F"><h1>Aileler</h1></a>
			<hr>
			<a href="./aileler.php?ozel=buhafta">Bu hafta gidilenler</a>
			<br><br>
			<a href="./aileler.php?ozel=gorulmeyenler">Evi görülmeyenler</a>
			<br><br>
			<a href="./aileler.php?ozel=calismayanlar">İşi olmayanlar</a>
			<br><br>
			<a href="./aileler.php?menu=gunceltarih">Güncelleme sırasına göre listele (yeniden eskiye)</a>
			<br><br>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black; text-align: center">
			<a href="./hastaara.php"><h1>Doktorlara Özel</h1></a>
		</div>
	</div>
	<br>
<?php if ($_SESSION['kullanici'] == "admin"):?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black; text-align: center">
			<h3>Yönetici Paneli</h3>
			<hr>
			<a href="userekle.php">Kullanıcılar</a>
			<br><br>
		</div>
	</div>
<?php endif ?>
</div>
</body>
</html>
