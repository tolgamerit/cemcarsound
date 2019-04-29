<?php session_start(); define("include",true); include("../style/config.php"); include("../style/functions.php");	?>
						<label><b>Ürün Marka</b></label><br>
						<select name="kategori" style="width:445px" class="input-text"><option></option>
						<?php foreach($db->query("select * from pkat order by sira asc") as $sss){ echo '<option value="'.$sss['seflink'].'">'.$sss['baslik'].'</option>'; } ?></select><br><br>							

						<label><b>Ürün Model</b></label><br>
						<select name="model" style="width:445px" class="input-text"><option></option>
						<?php 
						
						foreach($db->query("select * from projeler where kategori=".$sss['seflink']."") as $ss){ echo '<option value="'.$ss['seflink'].'">'.$ss['baslik'].'</option>'; } 
	
?>
				</select><br><br>				
				
						
						
						
						