<?php session_start(); define("include",true); include("../style/config.php"); include("../style/functions.php"); if(isset($_SESSION['company'])){ $kuladi = $_SESSION['company']; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex,nofollow,nosnippet,noodp,noarchive,noimageindex">
	<meta name="author" content="Php Scriptlerim, www.phpscriptlerim.com" />	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/main.css" /> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/2col.css" title="2col" /> 
	<link rel="alternate stylesheet" media="screen,projection" type="text/css" href="css/1col.css" title="1col" /> 
	<!--[if lte IE 6]><link rel="stylesheet" media="screen,projection" type="text/css" href="css/main-ie6.css" /><![endif]--> 
	<link rel="stylesheet" media="screen,projection" type="text/css" href="css/style.css" />
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
			<h1>Sayfa Kategorisi Ekle</h1><br>
<?php if(isset($_POST["gonder"])){
	
$sira = $_POST['sira'];
$baslik = $_POST['baslik'];
$url = temizle($baslik);

if($sira==""||$baslik==""){ echo '<div class="error msg" style="width:300px;"><b>Lütfen tüm alanları doldurun!</b></div><br>'; }else{
	
$kayit = $db->prepare("insert into skat SET sira=?,baslik=?,seflink=?"); $kayit->execute(array($sira, $baslik, $url));

echo "<div class='done msg' style='width:200px;'><b>Sayfa kategorisi eklendi.</b></div><br>"; } } ?>
						<form method="post">

						<div class="col50">
			
			<p class="t-justify">   
						<label><b>Sıra No</b></label><br>
						<input type="text" size="20" name="sira" class="input-text" /><br><br>		
		
						<label><b>Başlık</b></label><br>
						<input type="text" size="70" name="baslik" class="input-text" /><br><br>					
				</p>
				
			</div> 

			<div class="fix"></div>						

			<input type="submit" class="input-submit" name="gonder" style="width:250px;" value="Ekle" />
			
			</form>			
			<br>
		</div>

	</div>

	<hr class="noscreen" />

	<div id="footer" class="box">

		<p class="f-left">&copy; Cem Car Sound</p>

		
	</div> 

</div>

</body>
</html>
<?php }else{ echo '<script language="javascript">location.href="../index.php";</script>'; } ?>