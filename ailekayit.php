<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(@$_SESSION['giris'] != 'evet') {
	header("Location: ./login.php");
	die();
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<title>Aile Kayıt</title>
</head>

<body>
<div class="container">
<div class="row">
	<div class="col-md-8 col-md-offset-2 centered" style="border: 1px solid black; text-align: center">
		<a href="./anasayfa.php" style="color:red;"><h2 style="color:red;">Anasayfa</h2></a>
		<hr />
		<p><b>Önemli not:<b> Tüm alanları doldurmaya çalışınız.</p>
		<hr>
		<form class="form-horizontal" action="kayit.php" method="post">
			<fieldset>
				<legend>Aile Kayıt</legend>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="reis">Aile Reisi:</label>  
					<div class="col-md-8">
						<input id="reis" name="reis" placeholder="Aile reisinin adını yazın" class="form-control input-md" type="text">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="telefon">Telefon Numarası:</label>  
					<div class="col-md-8">
						<input id="telefon" name="telefon" placeholder="Aile reisinin telefonu numarasını yazın" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="mahalle">Mahalle:</label>  
					<div class="col-md-8">
						<input id="mahalle" name="mahalle" placeholder="Mahalle adını yazın. Örnek: Fakülteler" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="sokak">Sokak:</label>  
					<div class="col-md-8">
						<input id="sokak" name="sokak" placeholder="Sokak adını yazın. Örnek: Dirim" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="apnu">Apartman No:</label>  
					<div class="col-md-8">
						<input id="apnu" name="apnu" placeholder="Apartman numarasını yazın" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kapinu">Kapı No:</label>  
					<div class="col-md-8">
						<input id="kapinu" name="kapinu" placeholder="Daire numarasını yazın" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="evegidildi">Ev görüldü mü?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="evegidildi_0">
							<input name="evegidildi" id="evegidildi_0" value="evet" type="radio">Evet
						</label> 
						<label class="radio-inline" for="evegidildi_1">
							<input name="evegidildi" id="evegidildi_1" value="hayir" type="radio" checked="checked"><b>Hayır</b>
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="calisan">Çalışan var mı?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="calisan_0">
							<input name="calisan" id="calisan_0" value="var" type="radio">Var
						</label> 
						<label class="radio-inline" for="calisan_1">
							<input name="calisan" id="calisan_1" value="yok" type="radio"><b>Yok</b>
						</label>
						<label class="radio-inline" for="calisan_2">
							<input name="calisan" id="calisan_2" value="sor" type="radio" checked="checked">Bilinmiyor
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="yerkek">Yetişkim Erkek Sayısı:</label>  
					<div class="col-md-8">
						<input id="yerkek" name="yerkek" placeholder="Kaç yetişkin erkek var?" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="ykadin">Yetişkin Kadın Sayısı:</label>  
					<div class="col-md-8">
						<input id="ykadin" name="ykadin" placeholder="Kaç yetişkin kadın var?" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="ecocuk">Erkek Çocuk Sayısı:</label>  
					<div class="col-md-8">
						<input id="ecocuk" name="ecocuk" placeholder="Kaç erkek çocuk var?" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kcocuk">Kız Çocuk Sayısı:</label>  
					<div class="col-md-8">
						<input id="kcocuk" name="kcocuk" placeholder="Kaç kız çocuk var?" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="bebek">Bebek Sayısı:</label>  
					<div class="col-md-8">
						<input id="bebek" name="bebek" placeholder="Kaç bebek var?" class="form-control input-md" type="text">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="hasta">Hasta Var Mı?</label>
					<div class="col-md-8"> 
						<label class="radio-inline" for="hasta_0">
							<input name="hasta" id="hasta_0" value="acil" type="radio">Var-<b>Acil</b>
						</label> 
						<label class="radio-inline" for="hasta_1">
							<input name="hasta" id="hasta_1" value="acild" type="radio">Var-Acil Değil
						</label> 
						<label class="radio-inline" for="hasta_2">
							<input name="hasta" id="hasta_2" value="yok" type="radio" checked="checked">Yok
						</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="ihtiyac">Ailenin İhtiyaçları:</label>
					<div class="col-md-8">                     
						<textarea class="form-control" id="ihtiyac" name="ihtiyac" rows="10"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="verilen">Aileye Verilenler:</label>
					<div class="col-md-8">                     
						<textarea class="form-control" id="verilen" name="verilen" rows="10"></textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-4 control-label" for="kaydeden">Kaydeden:</label>  
					<div class="col-md-8">
						<input id="kaydeden" name="kaydeden" placeholder="Aile kaydını yapan" class="form-control input-md" type="text" value="<?=$_SESSION['kullanici']?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<button id="" name="" class="btn btn-primary">Kaydet</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
</div>
</body>
</html>
