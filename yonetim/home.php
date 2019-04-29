<?php session_start(); define("include",true); include("../style/config.php"); if(isset($_SESSION['company'])){ $kuladi = $_SESSION['company']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">
	<meta name="author" content="Cem Car Sound" />	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> 
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> 
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/mystyle.css" />

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<title>Cem Car Sound Yönetim Paneli</title>
</head>
<body>

<div id="main">

	<div id="tray" class="box">

		<p class="f-left box">

			<span class="f-left" id="switcher">
				<a href="#" rel="1col" class="styleswitch ico-col1" title="Display one column"><img src="design/switcher-1col.gif" alt="1 Column" /></a>
				<a href="#" rel="2col" class="styleswitch ico-col2" title="Display two columns"><img src="design/switcher-2col.gif" alt="2 Columns" /></a>
			</span>

			<strong>Cem Car Sound Yönetim Paneli</strong>

		</p>

		<p class="f-right"><strong><a href="admin.php"><?php echo $kuladi; ?></a></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><a href="logout.php" id="logout">Çıkış</a></strong></p>

	</div>

	<hr class="noscreen" />

	<div id="menu" class="box">

		<ul class="box f-right">
			<li><a href="../index.php" target="_blank"><span><strong>Siteyi Görüntüle &raquo;</strong></span></a></li>
		</ul>

<?php include("css/menu1.php"); ?>
	</div>

	<hr class="noscreen" />

	<div id="cols" class="box">

		<div id="aside" class="box">

			<div class="padding box">

				<p id="logo"><a href="home.php"><img src="design/logo.png" title="Şirket Sitesi Yönetim Paneli" alt="" /></a></p><br><br>

			</div>
			
<?php include("css/menu2.php"); ?>
		</div>

		<hr class="noscreen" />

		<div id="content" class="box">

			<h1>Şirket Sitesi Yönetim Paneli</h1>
			<br>
<h3>Anasayfa Blokları</h3>			
<?php if(isset($_POST['gonder'])){

$id = $_POST['id'];
$baslik = $_POST['baslik'];
$resimyolu = $_POST['resimyolu'];
$text = $_POST['text'];
$n = count($id);

for($i=0;$i<$n;$i++){ $kayit = $db->prepare("update bloks SET baslik=?,resimyolu=?,text=? where id=?"); $kayit->execute(array($baslik[$i], $resimyolu[$i], $text[$i], $id[$i])); }

echo "<div class='done msg' style='width:200px;'><b>Düzenleme kaydedildi.</b></div>"; } ?>			
<form method="post">			
<div id="tabs">

  <ul>
    <li><a href="#tabs-1">Blok 1</a></li>
    <li><a href="#tabs-2">Blok 2</a></li>
    <li><a href="#tabs-3">Blok 3</a></li>
    <li><a href="#tabs-4">Blok 4</a></li>
	    <li><a href="#tabs-5">Blok 5</a></li>
		    <li><a href="#tabs-6">Blok 6</a></li>
			    <li><a href="#tabs-7">Blok 7</a></li>
				    <li><a href="#tabs-8">Blok 8</a></li>
					 <li><a href="#tabs-9">Blok 9</a></li>
					  <li><a href="#tabs-10">Blok 10</a></li>
					   <li><a href="#tabs-11">Blok 11</a></li>
					    <li><a href="#tabs-12">Blok 12</a></li>
  </ul>
  <div id="tabs-1">
<?php foreach($db->query("select * from bloks where id='1'") as $aa1){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa1['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa1['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa1['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa1['text']; ?></textarea><br><br>			
<?php } ?>
  </div>
  <div id="tabs-2">
<?php foreach($db->query("select * from bloks where id='2'") as $aa2){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa2['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa2['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa2['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa2['text']; ?></textarea><br><br>			
<?php } ?>
  </div>
  <div id="tabs-3">
<?php foreach($db->query("select * from bloks where id='3'") as $aa3){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa3['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa3['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa3['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa3['text']; ?></textarea><br><br>			
<?php } ?>
  </div>
  <div id="tabs-4">
<?php foreach($db->query("select * from bloks where id='4'") as $aa4){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa4['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa4['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa4['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa4['text']; ?></textarea><br><br>			
<?php } ?>
  </div>
  
 <div id="tabs-5">
<?php foreach($db->query("select * from bloks where id='5'") as $aa5){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa5['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa5['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa5['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa5['text']; ?></textarea><br><br>			
<?php } ?>
  </div>   

   <div id="tabs-6">
<?php foreach($db->query("select * from bloks where id='6'") as $aa6){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa6['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa6['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa6['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa6['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
     <div id="tabs-7">
<?php foreach($db->query("select * from bloks where id='7'") as $aa7){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa7['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa7['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa7['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa7['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
     <div id="tabs-8">
<?php foreach($db->query("select * from bloks where id='8'") as $aa8){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa8['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa8['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa8['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa8['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
  
  
  <div id="tabs-9">
<?php foreach($db->query("select * from bloks where id='9'") as $aa9){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa9['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa9['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa9['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa9['text']; ?></textarea><br><br>			
<?php } ?>
  </div>   

   <div id="tabs-10">
<?php foreach($db->query("select * from bloks where id='10'") as $aa10){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa10['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa10['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa10['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa10['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
     <div id="tabs-11">
<?php foreach($db->query("select * from bloks where id='11'") as $aa11){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa11['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa11['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa11['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa11['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
     <div id="tabs-12">
<?php foreach($db->query("select * from bloks where id='12'") as $aa12){ ?>
		<label><b>Başlık</b></label><br><input type="hidden" name="id[]" value="<?php echo $aa12['id']; ?>">
		<input type="text" size="70" name="baslik[]" value="<?php echo $aa12['baslik']; ?>" class="input-text" /><br><br>
		
		<label><b>Resim</b> (211x120)</label> <a onclick="window.open('/upload/upload.php','Upload','width=500,height=200,scrollbars=1');return false;" href="">Resim Yükle</a><br>
		<input type="text" size="70" name="resimyolu[]" value="<?php echo $aa12['resimyolu']; ?>" class="input-text" /><br><br>	

		<label><b>Yazı</b></label><br>
		<textarea cols="70" rows="2" name="text[]" class="input-text"><?php echo $aa12['text']; ?></textarea><br><br>			
<?php } ?>
  </div>  
  
  
  
  
  
  
  
</div>
	<input type="submit" class="input-submit" name="gonder" style="width:250px;" value="Kaydet" />
</form>			
			
		</div>

	</div>

	<hr class="noscreen" />

	<div id="footer" class="box">

		<p class="f-left">&copy; Cem Car Sound</p>

	
	</div> 

</div>

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>  
  
</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../index.php";</script>'; } ?>