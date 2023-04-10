<?php
require ('medoo.min.php');
use Medoo\Medoo;
$db = new Medoo(
	[
	'database_type' => 'mysql',
	'database_name' => 'information_schema',
	'server' => 'localhost',
	'username' => 'tid3b_vtuser',
	'password' => '*t1i2d334b5',
	'charset' => 'utf8',
	]);
function sayi($ad,$metin){
	return '
<div class="form-group">
	<label for="metin'.$ad.'">'.$metin.'</label>
	<input type="number" class="form-control" id="'.$ad.'" placeholder="'.$metin.'">
</div>';
}
function metin_k($ad,$metin){
	return '
<div class="form-group">
	<label for="metin'.$ad.'">'.$metin.'</label>
	<input type="text" class="form-control" id="'.$ad.'" placeholder="'.$metin.'">
</div>';
}
function metin_b($ad,$metin){
	return '
<div class="form-group">
	<textarea class="form-control" rows="3" name="'.$ad.'" id="'.$ad.'" placeholder="'.$metin.'"></textarea>
</div>';
}
function sifre($ad,$metin){
	return '
<div class="form-group">
	<label for="metin'.$ad.'">'.$metin.'</label>
	<input type="password" class="form-control" id="'.$ad.'" placeholder="*****">
</div>';
}
function eposta($ad,$metin){
	return '
<div class="form-group">
	<label for="metin'.$ad.'">'.$metin.'</label>
	<input type="email" class="form-control" id="'.$ad.'" placeholder="'.$metin.'">
</div>';
}
function checkbox2($ad,$metin){
	return '	
	<table border="0" cellspacing="0" cellpadding="0" class="tablo_'.$ad.' table">
	  <thead>
		<tr>
		  <th></th><th>'.$ad.'1</th><th>'.$ad.'2</th>
		</tr>
	  </thead>
	  <tr>
		<td>'.$metin.'</td>
		<td width="30"><input type="radio" name="'.$ad.'" id="'.$ad.'1" value="1"></td>
		<td width="30"><input type="radio" name="'.$ad.'" id="'.$ad.'2" value="2"></td>
	  </tr>
	</table><br>
	';
}

function checkbox4($ad,$metin){
	return '
<table  border="0" cellspacing="0" cellpadding="0" class="tablo_'.$ad.' table">
  <thead>
    <tr>
      <th></th><th>'.$ad.'1</th><th>'.$ad.'2</th><th>'.$ad.'3</th><th>'.$ad.'4</th>
    </tr>
  </thead>
  <tr>
  	<td width="250" height="25" align="left" valign="middle" style="padding:5px;">'.$metin.' </td>
	<td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'1" value="1"></td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'2" value="2">	</td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'3" value="3">	</td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'4" value="4">	</td>
  </tr>
</table>
';
}

function checkbox5($ad,$metin){
	return '
<table border="0" cellspacing="0" cellpadding="0" class="tablo_'.$ad.' table">
  <thead>
    <tr>
      <th></th><th>'.$ad.'1</th><th>'.$ad.'2</th><th>'.$ad.'3</th><th>'.$ad.'4</th><th>'.$ad.'5</th>
    </tr>
  </thead>
  <tr>
  	<td width="250" height="25" align="left" valign="middle" style="padding:5px;">'.$metin.' </td>
	<td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'1" value="1"></td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'2" value="2">	</td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'3" value="3">	</td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'4" value="4">	</td>
    <td width="50" height="25" align="left" valign="middle"><input type="radio" name="'.$ad.'" id="'.$ad.'5" value="5">	</td>
  </tr>
</table>
';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Oluştur</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>



<script>
var eski = 0;
function goster(){
	if(eski==0){
		
		var source = document.getElementById('formbilgi').innerHTML;
		eski = source;
		document.getElementById('formbilgi').innerHTML='';
		source = source.replace(/</g,"&lt;");
		source = source.replace(/>/g,"&gt;");
		source = source.replace(/\t/g,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
		document.getElementById('formbilgi').innerHTML='<pre>'+source+'</pre>';
		document.getElementById('formkod').innerHTML='Formu Göster';
	}else{
		document.getElementById('formbilgi').innerHTML = eski;
		document.getElementById('formkod').innerHTML='Kodu Göster';
		eski=0;
	}
}
</script>
<style>
body{
	width:900px;
padding:10px;	
}
.isaretle{
	clear:left;
	text-align:right;
	width:900px;
	padding-right:300px;	
}
table[class^="tablo_"] {
    background: #F7F7F7;
}
table[class^="tablo_"]:hover {
    background: #CCCCCC;
}
</style>
</head>

<body>
<p class="bg-info">Açıklama:
Veritabanınızı ve Tablonuzu seçtikten sonra formunu oluşturmak istediğiniz alanları işaretleyiniz. İşaretleme işini kaldırma özelliği koyulmamıştır. Bu yüzden işaretlerken dikkatli işaretleme yapınız. Yanlarına açılan metin kutuları formunuzda form elemanınız içinde veya üstünde gözükmesini istediğiniz metindir. Doldurabilirsiniz veya boş bırakabilirsiniz. Otomatik doldurulmasını istiyorsanız veritabanınızı oluştururken alanlarınızın yorum kısımlarını metninizi yazarsanız buraya otomatik gelecektir.
İşaretlemeden sonra alanlarınızın ne türde bir form olacağını seçiniz.<br />
Bunlar bu versiyon için;
<ul class="list-inline bg-info">
<li><strong>Küçük Metin</strong>: text alanı</li>
<li><strong>Büyük Metin</strong>: textarea alanı</li>
<li><strong>2li Radyo</strong>: evet hayır soruları için</li>
<li><strong>4lü Radyo</strong>:henüz yok</li>
<li><strong>5li Radyo</strong>:henüz yok</li>
<li><strong>7li Radyo</strong>:7 seçenekli radyo grubu için</li>
<li><strong>Pasaport</strong>: şifre alanları için</li>
<li><strong>Mail</strong>: eposta alanları için</li>
</ul>
</p>
<?php


$vtler = $db->select("SCHEMATA","*");
echo '<select onchange="window.location=\'?vt=\'+this.options[this.selectedIndex].value" class="form-control"><option>Veritabanı Seç</option>';
foreach($vtler as $vt){
	echo "<option>".$vt['SCHEMA_NAME']."</option>";
}
echo '</select>';

if(isset($_GET['vt'])){
	$tbler = $db->query("select DISTINCT TABLE_NAME from COLUMNS where TABLE_SCHEMA='".$_GET['vt']."'")->fetchAll();
	echo '<select onchange="window.location=\'?vt='.$_GET['vt'].'&tb=\'+this.options[this.selectedIndex].value" class="form-control"><option>Tablo Seç</option>';
	foreach($tbler as $tb){
		echo "<option>".$tb['TABLE_NAME']."</option>";
	}
	echo '</select>';	
}


if(isset($_GET['vt']) && isset($_GET['tb'])){
	
	$alanlar = $db->query("SELECT COLUMN_NAME,DATA_TYPE,CHARACTER_MAXIMUM_LENGTH,COLUMN_COMMENT FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$_GET['vt']."' AND TABLE_NAME = '".$_GET['tb']."'")->fetchAll();
	$i=0;
	foreach($alanlar as $a){
		$alan[$i][0] = $a['COLUMN_NAME'];
		$alan[$i][1] = $a['DATA_TYPE'];
		$alan[$i][2] = $a['CHARACTER_MAXIMUM_LENGTH'];
		$alan[$i][3] = $a['COLUMN_COMMENT'];
		$i++;
	}
	?>
	
	<form action="index.php?f=1<?php echo '&vt='.$_GET['vt'].'&tb='.$_GET['tb']; ?>" method="post" name="secim" id="secim">
	<script>
	function ekle(alan,alan2,yer,sec){
		degis = '<input type="text" name="x_'+alan+'" id="x_'+alan+'" value="'+alan2+'" /><select name="tur'+alan+'" id="tur'+alan+'"><option>From Türü Seç</option><option>Küçük Metin</option><option>Büyük Metin</option><option>Sayı</option><option>2li Radyo</option><option>4lü Radyo</option><option>5li Radyo</option><option>Pasaport</option><option>Mail</option></select>';
		document.getElementById(yer).innerHTML = document.getElementById(yer).innerHTML+' '+degis;
		document.getElementById(sec).checked = true;
	}
	</script>
	<?php
	$aciklama="";
	for($j=0;$j<count($alan);$j++){
		echo '<div class="isaretle" id="div'.$j.'">'.$alan[$j][0].' '.$alan[$j][1].' '.$alan[$j][2].' 
		<input type="checkbox" name="'.$alan[$j][0].'" id="'.$alan[$j][0].'" 
		onclick="ekle(\''.$alan[$j][0].'\',\''.$alan[$j][3].'\',\'div'.$j.'\',\''.$alan[$j][0].'\')" /></div>		
		';
	}
	?>
	</form>
    
    
	
    
    
	<a class="btn btn-primary" onclick="document.getElementById('secim').submit()">Form Oluştur</a><a class="btn btn-success" id="formkod" onclick="goster()">Kodu Göster</a><br />
	
	<?php
	$sql="";
	if(isset($_GET['f'])){
		//print_r($_POST);
		echo '
<div style="width:900px; border:1px solid #efefef" id="formbilgi">
<style>
table[class^="tablo_"] {
    background: #F7F7F7;
}
table[class^="tablo_"]:hover {
    background: #CCCCCC;
}
</style>
<form name="kayit" id="kayit" action="" method="post">
';
$s=0;
foreach($_POST as $veri){
		if($s==0){
			$alan =  key($_POST);
		}else if($s==1){
			$metin = $veri;
		}else if($s==2){
			$tur=$veri;
		}
		$s++;
		if($s==3) { 
			$s=0; 
			//echo $alan.' '.$metin.' '.$tur.' ......<br>';
			if($sql!="") $virgul=","; else $virgul="";			
			$sql = @$sql.' '.$virgul.' "'.$alan.'"=>$_POST[\''.$alan.'\'] ';
			
			switch($tur){
				case 'Küçük Metin': echo metin_k($alan,$metin); break;
				case 'Büyük Metin': echo metin_b($alan,$metin); break;
				case 'Pasaport': echo sifre($alan,$metin); break;
				case 'Sayı': echo sayi($alan,$metin); break;
				case 'Mail': echo eposta($alan,$metin); break;
				case '2li Radyo': echo checkbox2($alan,$metin); break;
				case '4lü Radyo': echo checkbox4($alan,$metin); break;
				case '5li Radyo': echo checkbox5($alan,$metin); break;		
				default: echo metin_k($alan,$veri); break;
			}
			
			next($_POST);
			next($_POST);
			next($_POST);
		}
		
		
}
		
		echo $sql = '<button type="submit" class="btn btn-default" id="kaydet" name="kaydet">Kaydet</button>
</form> 
		
&lt;?php 
if(isset($_POST[\'kaydet\']))
	$db->insert("'.$_GET['tb'].'",array('.$sql.')); //we offer you to use medoo.in, its simple database connection and query library
?&gt;';
		
echo '</div>';
	}

}//if bitti vt ve tb var ise
?>

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>


</body>
</html>