<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
extract($_POST);
$connection = new Configdb;
$id = (int)$_GET['id'];
$fetch = $connection->query("SELECT * FROM aileler WHERE id='$id'" );
$row = mysqli_fetch_assoc($fetch);
$toplam=$row['yerkek']+$row['ykadin']+$row['ecocuk']+$row['kcocuk']+$row['bebek'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Aile Bilgisi - <?=$row['reis']?></title>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 centered" style="border: 1px solid black">
			<div align="center">
			<a href="./aileler.php" style="color:red;"><h2 style="color:#F0F;">Aileler</h2></a>
			<hr />
			<b><?=$toplam?> Kişi</b>
			<br>
			<table class="table table-bordered">
				<tr><td><b>Aile Reisi:</b></td><td><?php echo $row['reis'];?></td></tr>
				<tr><td><b>Telefon:</b></td><td><?php echo $row['telefon'];?></td></tr>
				<tr><td><b>Adres:</b></td><td><?=$row['mahalle']?> Mahallesi <?=$row['sokak']?> Sokak No:<?=$row['apnu']?>/<?=$row['kapinu']?></td></tr>
				<tr><td><b>Ev görüldü mü?</b></td><td><?php if ($row['evegidildi'] == "evet") {echo "Evet";} elseif ($row['evegidildi'] == "hayir") {echo "<b>Hayır</b>";} ?></td></tr>
				<tr>
					<td><b>Çalışan var mı?</b></td>
					<td>
					<?php
					if ($row['calisan'] == 'var') {
						echo "Var";
					} elseif ($row['calisan'] == 'yok') {
						echo "<b>Yok</b>";
					} elseif ($row['calisan'] == 'sor') {
						echo "Bilinmiyor";
					}
					?>
					</td>
				</tr>
				<tr><td><b>Yetişkin Erkek Sayısı:</b></td><td><?=$row['yerkek']?></td></tr>
				<tr><td><b>Yetişkin Kadın Sayısı:</b></td><td><?=$row['ykadin']?></td></tr>
				<tr><td><b>Erkek Çocuk Sayısı:</b></td><td><?=$row['ecocuk']?></td></tr>
				<tr><td><b>Kız Çocuk Sayısı:</b></td><td><?=$row['kcocuk']?></td></tr>
				<tr><td><b>Bebek Sayısı:</b></td><td><?=$row['bebek']?></td></tr>
				<tr>
					<td><b>Hasta var mı?</b></td>
					<td>
					<?php
					if ($row['hasta'] == 'acil') {
						echo "Var - <b>Acil</b>";
					} elseif ($row['hasta'] == 'acild') {
						echo "Var - Acil Değil";
					} elseif ($row['hasta'] == 'yok') {
						echo "Yok";
					} else {
						echo "Bilinmiyor";
					}
					?>
					</td>
				</tr>
				<tr><td><b>Ailenin ihtiyaçları:</b></td><td><pre><?=$row['ihtiyac']?></pre></td></tr>
				<tr><td><b>Aileye Verilenler:</b></td><td><pre><?=$row['verilen']?></pre></td></tr>
				<tr><td><b>Son Güncelleme:</b></td><td><?=date("d.m.Y H:i", $row['gunceltarih'])?></td></tr>
				<tr><td><b>Kaydeden:</b></td><td><?=$row['kaydeden']?></td></tr>
				<tr><td><b>Güncelleyen:</b></td><td><?=$row['guncelleyen']?></td></tr>
			</table>
			<a href="./guncelle.php?id=<?=$id?>" style="color:navy;"><h2>Güncelleme Yap</h2></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
