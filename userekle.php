<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['kullanici'] != 'admin')die('yetkiniz yok');
require 'mysql.php';
$connection = new Configdb;
if(isset($_POST['kadi']) && isset($_POST['sifre'])) {
	extract($_POST);
	$sifrex=md5(md5($sifre));
	$ekleme = $connection->query("INSERT INTO users(kadi,sifre) VALUES('$kadi','$sifrex') ");
	$islem = "eklendi";
} else {
	$islem = "liste";
}
$kullanicilar = $connection->query("SELECT kadi,songiris FROM users ORDER BY songiris DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Kullanıcı Ekle</title>
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black">
	<div align="center">
	<a href="./anasayfa.php" style="color:red;"><h2 style="color:red;">Anasayfa</h2></a>
	<hr>
	<?php
	if ($islem == 'eklendi') {
		echo '<h2 style="color:green">'+$kadi+' eklendi</h2>\n<hr>\n';
	}
	?>
	<form class="form-horizontal" method="post" action="userekle.php">
	<fieldset>

	<!-- Form Name -->
	<legend>Kullanıcı Ekle</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="kadi">Kullanıcı Adı:</label>  
	  <div class="col-md-4">
	  <input id="kadi" name="kadi" placeholder="Kullanıcı adını girin" class="form-control input-md" type="text">
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sifre">Şifre:</label>
	  <div class="col-md-4">
		<input id="sifre" name="sifre" placeholder="Şifreyi girin" class="form-control input-md" type="password">
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for=""></label>
	  <div class="col-md-4">
		<button id="" name="" class="btn btn-primary">Ekle</button>
	  </div>
	</div>

	</fieldset>
	</form>
	
	<hr>
	
	<h3>Mevcut Kullanıcılar</h3>
	<table class="table bordered">
		<thead>
			<tr>
				<th>Kullanıcı Adı</th>
				<th>Son Giriş Tarihi</th>
			</tr>
		</thead>
		<tbody>
			<?php while($row = mysqli_fetch_assoc($kullanicilar)){?>
			<tr>
				<td><?=$row['kadi']?></td>
				<td><?=date('d.m.Y H:i',$row['songiris'])?></td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	
	</div>
	</div>
</div>
</div>
</body>
</html>
