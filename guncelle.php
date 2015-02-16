<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
require 'mysql.php';
$connection = new Configdb;
$id = (int)$_GET['id'];
$fetch = $connection->query("SELECT * FROM aileler WHERE id='$id'" );
$row = mysqli_fetch_assoc($fetch);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Aile Güncelle</title>
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-8 col-md-offset-2 centered" style="border: 1px solid black; text-align: center">
		<a href="./anasayfa.php" style="color:red;"><h2 style="color:red;">Anasayfa</h2></a>
		<hr />
		<p><b>Önemli not:<b> Tüm alanları doldurmaya çalışınız.</p>
		<hr>
		<form class="form-horizontal" action="guncel.php" method="post">
			<fieldset>
				<legend>Aile Güncelle</legend>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="reis">Aile Reisi:</label>  
					<div class="col-md-8">
						<input id="reis" name="reis" placeholder="Aile reisinin adını yazın" class="form-control input-md" type="text" value="<?=$row["reis"]?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="telefon">Telefon Numarası:</label>  
					<div class="col-md-8">
						<input id="telefon" name="telefon" placeholder="Aile reisinin telefonu numarasını yazın" class="form-control input-md" type="text" value="<?=$row["telefon"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="mahalle">Mahalle:</label>  
					<div class="col-md-8">
						<input id="mahalle" name="mahalle" placeholder="Mahalle adını yazın" class="form-control input-md" type="text" value="<?=$row["mahalle"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="sokak">Sokak:</label>  
					<div class="col-md-8">
						<input id="sokak" name="sokak" placeholder="Sokak adını yazın" class="form-control input-md" type="text" value="<?=$row["sokak"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="apnu">Apartman No:</label>  
					<div class="col-md-8">
						<input id="apnu" name="apnu" placeholder="Apartman numarasını yazın" class="form-control input-md" type="text" value="<?=$row["apnu"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kapinu">Kapı No:</label>  
					<div class="col-md-8">
						<input id="kapinu" name="kapinu" placeholder="Daire numarasını yazın" class="form-control input-md" type="text" value="<?=$row["kapinu"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="evegidildi">Ev görüldü mü?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="evegidildi_0">
							<input name="evegidildi" id="evegidildi_0" value="evet" type="radio" <?php if($row['evegidildi'] == 'evet')echo 'checked="checked"';?>>Evet
						</label> 
						<label class="radio-inline" for="evegidildi_1">
							<input name="evegidildi" id="evegidildi_1" value="hayir" type="radio" <?php if($row['evegidildi'] == 'hayir')echo 'checked="checked"';?>><b>Hayır</b>
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="calisan">Çalışan var mı?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="calisan_0">
							<input name="calisan" id="calisan_0" value="var" type="radio" <?php if($row['calisan'] == 'var')echo 'checked="checked"';?>>Var
						</label> 
						<label class="radio-inline" for="calisan_1">
							<input name="calisan" id="calisan_1" value="yok" type="radio" <?php if($row['calisan'] == 'yok')echo 'checked="checked"';?>><b>Yok</b>
						</label>
						<label class="radio-inline" for="calisan_2">
							<input name="calisan" id="calisan_2" value="sor" type="radio" <?php if($row['calisan'] == 'sor')echo 'checked="checked"';?>>Bilinmiyor
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="yerkek">Yetişkim Erkek Sayısı:</label>  
					<div class="col-md-8">
						<input id="yerkek" name="yerkek" placeholder="Kaç yetişkin erkek var?" class="form-control input-md" type="text" value="<?=$row["yerkek"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="ykadin">Yetişkin Kadın Sayısı:</label>  
					<div class="col-md-8">
						<input id="ykadin" name="ykadin" placeholder="Kaç yetişkin kadın var?" class="form-control input-md" type="text" value="<?=$row["ykadin"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="ecocuk">Erkek Çocuk Sayısı:</label>  
					<div class="col-md-8">
						<input id="ecocuk" name="ecocuk" placeholder="Kaç erkek çocuk var?" class="form-control input-md" type="text" value="<?=$row["ecocuk"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kcocuk">Kız Çocuk Sayısı:</label>  
					<div class="col-md-8">
						<input id="kcocuk" name="kcocuk" placeholder="Kaç kız çocuk var?" class="form-control input-md" type="text" value="<?=$row["kcocuk"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="bebek">Bebek Sayısı:</label>  
					<div class="col-md-8">
						<input id="bebek" name="bebek" placeholder="Kaç bebek var?" class="form-control input-md" type="text" value="<?=$row["bebek"]?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="hasta">Hasta Var Mı?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="hasta_0">
							<input name="hasta" id="hasta_0" value="acil" type="radio" <?php if($row['hasta'] == 'acil')echo 'checked="checked"';?>>Var-<b>Acil</b>
						</label> 
						<label class="radio-inline" for="hasta_1">
							<input name="hasta" id="hasta_1" value="acild" type="radio" <?php if($row['hasta'] == 'acild')echo 'checked="checked"';?>>Var-Acil Değil
						</label> 
						<label class="radio-inline" for="hasta_2">
							<input name="hasta" id="hasta_2" value="yok" type="radio" <?php if($row['hasta'] == 'yok')echo 'checked="checked"';?>>Yok
						</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="ihtiyac">Ailenin İhtiyaçları:</label>
					<div class="col-md-8">                     
						<textarea class="form-control" id="ihtiyac" name="ihtiyac" rows="10"><?=$row["ihtiyac"]?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="verilen">Aileye Verilenler:</label>
					<div class="col-md-8">                     
						<textarea class="form-control" id="verilen" name="verilen" rows="10"><?=$row["verilen"]?></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kaydeden">Kaydeden:</label>  
					<div class="col-md-8">
						<input id="kaydeden" name="kaydeden" placeholder="Aile kaydını yapan" class="form-control input-md" type="text" value="<?=$row["kaydeden"]?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="guncelleyen">Güncelleyen:</label>  
					<div class="col-md-8">
						<input id="guncelleyen" name="guncelleyen" placeholder="Güncelleme yapan" class="form-control input-md" type="text" value="<?=$_SESSION['kullanici']?>" readonly>
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
</body>
</html>
