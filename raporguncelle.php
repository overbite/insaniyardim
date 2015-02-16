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
$fetch = $connection->query("SELECT isim,rapor FROM hastalar WHERE id='$id'");
$row = mysqli_fetch_assoc($fetch);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Rapor Güncelle</title>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 centered" style="border: 1px solid black">
			<div align="center">
			<a href="hastaara.php" style="color:#F00"><h2>Hastalar</h2></a>
			<hr />
			<form class="form-horizontal" action="hastakayitg.php" method="post">
				<fieldset>
				
				<legend>Rapor Güncelle</legend>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="isim">Hasta Adı:</label>  
					<div class="col-md-8">
						<input id="isim" name="isim" placeholder="Hastanın adını yazın" class="form-control input-md" type="text" value="<?=$row['isim']?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="rapor">Raporunuz:</label>
					<div class="col-md-8">                     
						<textarea class="form-control" id="rapor" name="rapor" rows="10"><?=$row['rapor']?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-12">
						<button id="id" name="id" class="btn btn-primary" value="<?=$id?>">Güncelle</button>
					</div>
				</div>
				
				</fieldset>
			</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>
