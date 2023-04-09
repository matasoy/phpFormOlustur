<?php
require ('medoo.min.php');
use Medoo\Medoo;
$db = new Medoo(
	[
	'database_type' => 'mysql',
	'database_name' => 'information_schema',
	'server' => 'localhost',
	'username' => '',
	'password' => '',
	'charset' => 'utf8',
	]);


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
function sayi($ad,$metin){
	return '
<div class="form-group">
	<input type="number" class="form-control" id="'.$ad.'" placeholder="'.$metin.'">
</div>';
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
function goster(){
	document.getElementById('formkod').innerHTML='';
	var source = document.getElementById('formbilgi').innerHTML;
	document.getElementById('formbilgi').innerHTML='';
	source = source.replace(/</g,"&lt;");
	source = source.replace(/>/g,"&gt;");
	source = source.replace(/\t/g,"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
	document.getElementById('formkod').innerHTML='<pre>'+source+'</pre>';
}
</script>
<style>
.isaretle{
	clear:left;
	text-align:right;
	width:500px;	
}
body{
	padding:20px;
}
</style>
</head>

<body>
<div>Formunu oluşturacağınız veritabanını ve sonra tablosunu seçerek, formda görmek istediğiniz alanları işaretleyin. Gönder butonuna basın. Göster diyerek kodları kopyalayın.</div>
<?php


$vtler = $db->select("SCHEMATA","*");
echo '<select onchange="window.location=\'?vt=\'+this.options[this.selectedIndex].value"><option>Veritabanı Seç</option>';
foreach($vtler as $vt){
	echo "<option>".$vt['SCHEMA_NAME']."</option>";
}
echo '</select>';

if(isset($_GET['vt'])){
	$tbler = $db->query("select DISTINCT TABLE_NAME from COLUMNS where TABLE_SCHEMA='".$_GET['vt']."'")->fetchAll();
	echo '<select onchange="window.location=\'?vt='.$_GET['vt'].'&tb=\'+this.options[this.selectedIndex].value"><option>Tablo Seç</option>';
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
		
		degis = '<input type="text" name="x_'+alan+'" id="x_'+alan+'" value="'+alan2+'" />';
		document.getElementById(yer).innerHTML = document.getElementById(yer).innerHTML+' '+degis;
		document.getElementById(sec).checked = true;
	}
	</script>
	<?php
	$aciklama="";
	for($j=0;$j<count($alan);$j++){
		echo '<div class="isaretle" id="div'.$j.'">'.$alan[$j][0].' '.$alan[$j][1].' '.$alan[$j][2].' 
		<input type="checkbox" name="'.$alan[$j][0].'*'.$alan[$j][1].'*'.$alan[$j][2].'" id="'.$alan[$j][0].'*'.$alan[$j][1].'*'.$alan[$j][2].'" onclick="ekle(\''.$alan[$j][0].'\',\''.htmlentities($alan[$j][3], ENT_QUOTES | ENT_IGNORE, "UTF-8").'\',\'div'.$j.'\',\''.$alan[$j][0].'*'.$alan[$j][1].'*'.$alan[$j][2].'\')" /></div>		
		';
	}
	?>
	</form>
	<a onclick="document.getElementById('secim').submit()">Gönder</a><br />
	
	<?php
	$sql="";
	if(isset($_GET['f'])){
		//print_r($_POST);
		echo '
<div style="width:500px;" id="formbilgi">
<form name="kayit" id="kayit" action="" method="post">
';
foreach($_POST as $veri){
	
	if($veri=='on'){		
		$dilimler = explode("*", key($_POST));	
		$alan =  $dilimler[0];
		$tur = $dilimler[1];
		if($sql!="") $virgul=","; else $virgul="";	
		
		$sql = @$sql.' '.$virgul.' "'.@$dilimler[0].'"=>$'.@$dilimler[0].' ';
	}else{
		$dilimler = explode("*", key($_POST));
		switch($tur){
			case 'varchar': echo metin_k($alan,$veri); break;
			case 'text': echo metin_b($alan,$veri); break;
			case 'int': echo sayi($alan,$veri); break;
			case 'datetime': echo metin_k($alan,$veri); break;
			default: echo metin_k($alan,$veri); break;
		}
		
	}

	
	next($_POST);
}
		
		echo $sql = '
<button type="submit" class="btn btn-default" id="kaydet" name="kaydet">Kaydet</button>
</form> 
		
&lt;?php 
if(isset($_POST[\'kaydet\']))
	$db->insert("'.$_GET['tb'].'",array('.$sql.')); //we offer you to use medoo.in, its simple database connection and query library
?&gt;';
		
echo '</div>';
	}

}//if bitti vt ve tb var ise
?>

<div id="formkod"><a onclick="goster()">göster</a></div>
</body>
</html>
