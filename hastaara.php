<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
extract($_GET);
$connection = new Configdb;
if(!isset($_GET['menu'])) {
	$fetch = $connection->query("SELECT id,reis,hasta,mahalle,sokak,apnu,kapinu FROM aileler WHERE hasta!='yok' ORDER BY hasta,mahalle");
} else {
	if($_GET['menu'] == 'Aile Reisi')$order = 'reis';
	if($_GET['menu'] == 'Mahalle')$order = 'mahalle';
	if($_GET['menu'] == 'Kaydeden')$order = 'kaydeden';
	$fetch = $connection->query("SELECT id,reis,hasta,mahalle,sokak,apnu,kapinu FROM aileler WHERE hasta!='yok' ORDER BY $order");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hasta Ara</title>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 centered" style="border: 1px solid black">
			<div align="center">
			<a href="./anasayfa.php" style="color:red;"><h2 style="color:red;">Anasayfa</h2></a>
			<hr />
			<h1>Doktor Paneli</h1>
			<br>
<pre>Kullanım: Lütfen Dikkatlice okuyunuz!
Gidilecek aileler kısmında Rapor Yaz kısmı 
Hastanın durumu ile ilgili rapor yazdırır. 
Rapor yazdığınızda hasta gidilecek aileler kısmından düşer.
Hastalar Kısmına yazılır. Yanlış kayıtta ve 
Hasta iyileşmişse Sil kısmından silebilirsiniz.
Bilgileri Aç kısmından adres bilgilerini bakıp gidebilirsiniz.
Ayrıca Rapor Yaz kısmından birden fazla hasta ekleyebilirsiniz.</pre>
			<br>
			
			<form action="hastaara.php" method="get"><strong>Filtreye Göre Sırala:</strong>
			  <select name="menu">
				<option>Mahalle</option>
				<option>Aile Reisi</option>
				<option>Kaydeden</option>
			  </select>
			  <input name="" type="submit" value="Sırala" />
			</form>
			<br>
			
			<h3>Gidilecek Aileler</h3>

			<table class="table bordered">
				<thead>
					<tr>
						<th>Aile Reisi</th>
						<th>Adres</th>
						<th>Aciliyet</th>
						<th>Aile Bilgisi</th>
						<th>Hasta Sil</th>
						<th>Rapor yaz</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_assoc($fetch)){?>
					<tr>
						<td><?=$row['reis']?></td>
						<td><?=$row['mahalle']?> Mahallesi <?=$row['sokak']?> Sokak <?=$row['apnu']?>/<?=$row['kapinu']?></td>
						<td><?php if($row['hasta'] == 'acil')echo '<strong style="color:red;">Acil</strong>';if($row['hasta'] == 'acild')echo 'Acil Değil'; ?></td>
						<td><a href="./goruntule.php?id=<?=$row['id']?>">Görüntüle</a></td>
						<td><a href="./delete.php?id=<?=$row['id']?>" >Hasta Sil</a></td>
						<td><a href="./rapor.php?id=<?=$row['id']?>" >Rapor Yaz</a></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<br>
			<h3>Doktor Giden Hastalar</h3>
			<table class="table bordered">
				<thead>
					<tr>
						<th>Hasta İsmi</th>
						<th>Adres</th>
						<th>Aile Bilgisi</th>
						<th>Sil</th>
						<th>Güncelle/Görüntüle</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				$parse = $connection -> query("SELECT hastalar.id,hastalar.isim,hastalar.idiki,aileler.mahalle,aileler.sokak,aileler.apnu,aileler.kapinu FROM hastalar INNER JOIN aileler ON hastalar.idiki=aileler.id");
				while($obj = mysqli_fetch_assoc($parse) ){
				?>
					<tr>
						<td><?=$obj['isim']?></td>
						<td><?=$obj['mahalle']?> Mahallesi <?=$obj->sokak?> Sokak <?=$obj['apnu']?>/<?=$obj['kapinu']?></td>
						<td><a href="./goruntule.php?id=<?=$obj['idiki']?>">Görüntüle</a> </td>
						<td><a href="./hastasil.php?id=<?=$obj['id']?>">Sil</a></td>
						<td><a href="./raporguncelle.php?id=<?=$obj['id']?>">Durum</a></td>
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
