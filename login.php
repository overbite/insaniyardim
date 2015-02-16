<?php 
session_start();
date_default_timezone_set('Europe/Istanbul');
if(isset($_POST['kadi']) && isset($_POST['sifre'])){
	require 'mysql.php';
	extract($_POST);
	$connection = new Configdb;
	$fetch = $connection->query("SELECT kadi,sifre FROM users WHERE kadi='$kadi'");
	while ($row = mysqli_fetch_assoc($fetch)) {
		$sifrex = md5(md5($sifre));
		if($row['kadi'] == $kadi and $row['sifre'] == $sifrex){
			$_SESSION['giris'] = 'evet';
			$_SESSION['kullanici'] = $row['kadi'];
			$girdi = 'girdi';
			$tarih = time();
			$ipadresi = $_SERVER['REMOTE_ADDR'];
			$connection->query("UPDATE users SET songiris='$tarih', ipadresi='$ipadresi' WHERE kadi='$kadi'");
		} else{
			break;
		}
	}
}
if((@$girdi == 'girdi') or @$_SESSION['giris'] == 'evet')header("Location: ./anasayfa.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Giriş Sayfası</title>
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3 centered" style="border: 1px solid black">
	<form class="form-horizontal" method="post" action="login.php">
	<fieldset>

	<!-- Form Name -->
	<legend>Giriş Yap</legend>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="kadi">Kullanıcı Adı:</label>  
	  <div class="col-md-4">
	  <input id="kadi" name="kadi" placeholder="Kullanıcı adınızı girin" class="form-control input-md" type="text">
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sifre">Şifre:</label>
	  <div class="col-md-4">
		<input id="sifre" name="sifre" placeholder="Şifrenizi girin" class="form-control input-md" type="password">
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for=""></label>
	  <div class="col-md-4">
		<button id="" name="" class="btn btn-primary">Giriş</button>
	  </div>
	</div>

	</fieldset>
	</form>
	</div>
</div>
</div>
</body>
</html>
