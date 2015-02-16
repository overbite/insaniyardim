<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
//extract($_GET);
$connection = new Configdb;
$cumle = "SELECT id,reis,mahalle,sokak,apnu,kapinu,kaydeden,guncelleyen,evegidildi,gunceltarih FROM aileler";
if (isset($_GET['ozel'])) {
	if ($_GET['ozel'] == "buhafta") $cumle .= " WHERE gunceltarih > ".(time()-604800);
	if ($_GET['ozel'] == "gorulmeyenler") $cumle .= " WHERE evegidildi='hayir'";
	if ($_GET['ozel'] == "calismayanlar") $cumle .= " WHERE calisan='yok'";
}
if (isset($_GET['menu'])) {
	$cumle .= " ORDER BY ".$_GET['menu'];
	if ($_GET['menu'] == "gunceltarih") {
		$cumle .= " DESC";
	}
} else {
	$cumle .= " ORDER BY mahalle,sokak,apnu ASC";
}
$fetch = $connection->query($cumle);
$toplamaile = mysqli_num_rows($fetch);
$simdi = time();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Aileler</title>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 centered">
			<div align="center">
			<a href="./anasayfa.php" style="color:red;"><h2 style="color:red;">Anasayfa</h2></a>
			<hr />
			<form class="form-inline" action="aileler.php" method="get">
			<fieldset>
			<div class="form-group">
				<label class="control-label" for="menu">Filtreye göre sırala:</label>
				<select id="menu" name="menu" class="form-control">
					<option value="mahalle">Mahalle</option>
					<option value="sokak">Sokak</option>
					<option value="reis">Aile Reisi</option>
					<option value="kaydeden">Kaydeden</option>
				</select>
			</div>
			<div class="form-group">
				<button id="" name="" class="btn btn-primary">Sırala</button>
			</div>
			</fieldset>
			</form>
			<hr />
			<table class="table table-bordered table-hover table-condensed">
			<caption align="top">Toplam <b><?=$toplamaile?></b> Aile Kayıtlı</caption>
				<thead>
					<tr>
						<th>Aile Reisi</th>
						<th>Mahalle</th>
						<th>Adres</th>
						<th>Ev Görüldü?</th>
						<th>Kaydeden</th>
						<th>Güncelleyen</th>
						<th>Görüntüle</th>
						<th>Güncelle</th>
						<?php if ($_SESSION['kullanici'] === "admin") { ?>
						<th>Sil</th>
						<?php } ?>
						<th>Tarih</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_assoc($fetch)){?>
					<tr>
						<td><?=$row['reis']?></td>
						<td><?=$row['mahalle']?></td>
						<td><?=$row['sokak']?> Sokak <?=$row['apnu']?>/<?=$row['kapinu']?></td>
						<td><?php if ($row['evegidildi'] == "evet") {echo "Evet";} elseif ($row['evegidildi'] == "hayir") {echo "<b>Hayır</b>";} ?></td>
						<td><?=$row['kaydeden']?></td>
						<td><?=$row['guncelleyen']?></td>
						<td><a href="./goruntule.php?id=<?=$row['id']?>"><b>Görüntüle</b></a></td>
						<td><a href="./guncelle.php?id=<?=$row['id']?>"><b>Güncelle</b></a></td>
						<?php if ($_SESSION['kullanici'] === "admin") { ?>
						<td><a href="./sil.php?id=<?=$row['id']?>"><b>Sil</b></a></td>
						<?php } ?>
						<?php
						$sure = $simdi - $row['gunceltarih'];
						if ($sure < 259200) {
							$tarihrengi = "#5db871";
						} elseif ($sure < 604800) {
							$tarihrengi = "#a3d1ff";
						} else {
							$tarihrengi = "#fc3147";
						}
						?>
						<td bgcolor="<?=$tarihrengi?>"><?=date("d.m.Y H:i", $row['gunceltarih'])?></td>
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
