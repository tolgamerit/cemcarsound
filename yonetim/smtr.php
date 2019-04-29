<?php
require_once("mysql.php");

	$il=$_GET['il'];


		$dk=$db->q("SELECT * FROM `projeler` WHERE `kategori`='$il'");
		$list='{"0":"İlçe Seçiniz",';
		while($ilr=$db->fassoc($dk)){
			$list.='"'.$ilr['seflink'].'":"'.$ilr['baslik'].'",';
		}
		$list.="}";

		echo $list;


$db->close();
?>
