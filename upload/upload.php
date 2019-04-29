<?php session_start(); if(isset($_SESSION['company'])){ ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<form action="yukle.php" method="post" enctype="multipart/form-data">


<div align="center">


<table border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td><b>Resmi Secin :</b></td>
		<td>&nbsp;<input type="file" name="dosya" size="20"></td>
	</tr>
	<tr>
    <td></td>
		<td><br /><input type="submit" value="Yukle" style="width:220px;"></td>
	</tr>
</table>


</div>

</form>
<?php }else{ echo '<meta http-equiv="refresh" content="0;URL=http://www.google.com.tr">'; } ?>