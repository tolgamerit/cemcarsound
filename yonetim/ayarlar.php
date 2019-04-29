<?php session_start(); define("include",true); include("../style/config.php"); if(isset($_SESSION['company'])){ $kuladi = $_SESSION['company']; ?>
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
			<h1>Ayarlar</h1><br>
<?php if(isset($_POST['gonder'])){

$siteadi = $_POST['siteadi']; $uzanti = $_POST['uzanti']; $keywords = $_POST['keywords']; $description = $_POST['description']; $tfont = $_POST['tfont']; $analytics = $_POST['analytics'];
$hometext = $_POST['hometext']; $facebook = $_POST['facebook']; $twitter = $_POST['twitter']; $bloglimit = $_POST['bloglimit']; $iletisim = $_POST['iletisim']; $googlemap = $_POST['googlemap'];
$blog = $_POST['blog']; $urunler = $_POST['urunler']; $hizmetler = $_POST['hizmetler'];

if($siteadi==""||$keywords==""||$description==""){ echo '<div class="error msg" style="width:300px;"><b>Lütfen tüm alanları doldurun!</b></div><br>'; }else{

$kayit = $db->prepare("update ayarlar SET siteadi=?,uzanti=?,keywords=?,description=?,tfont=?,analytics=?,hometext=?,facebook=?,twitter=?,bloglimit=?,iletisim=?,googlemap=?,blog=?,urunler=?,hizmetler=?"); 
$kayit->execute(array($siteadi, $uzanti, $keywords, $description, $tfont, $analytics, $hometext, $facebook, $twitter, $bloglimit, $iletisim, $googlemap, $blog, $urunler, $hizmetler));

echo "<div class='done msg'><b>Düzenleme kaydedildi.</b></div><br>"; echo '<meta http-equiv="refresh" content="2">'; } } ?>
		<form method="post">				
			<div class="col50">
				<p class="t-justify">     
		
						<label><b>Site Adı</b></label><br>
						<input type="text" size="60" name="siteadi" value="<?php echo $print['siteadi']; ?>" class="input-text" /><br><br>

						<label><b>Seo URL</b></label><br>
						<?php if($print['uzanti']==".php"){ ?>
						<input type="radio" name="uzanti" value=".php" checked>.php<br>
						<input type="radio" name="uzanti" value=".html">.html<br><br>
						<?php }elseif($print['uzanti']==".html"){ ?>
						<input type="radio" name="uzanti" value=".php">.php<br>
						<input type="radio" name="uzanti" value=".html" checked>.html<br><br>						
						<?php } ?>
						
						<label><b>Anahtar kelimeler</b>(keywords)</label><br>
						<textarea cols="75" rows="2" name="keywords" class="input-text"><?php echo $print['keywords']; ?></textarea><br><br>

						<label><b>Siteni tanımlama</b> (cümle,kelime v.b. - description)</label><br>
						<textarea cols="75" rows="2" name="description" class="input-text"><?php echo $print['description']; ?></textarea><br><br>		
						
						<label><b>Site Yazı Stili</b></label><br>
						<select name="tfont" class="input-text"><option><?php echo $print['tfont']; ?></option>
						<option>aller.css</option>
						<option>comfortaa.css</option>
						<option>delicious.css</option>
						<option>folks.css</option>
						<option>mido.css</option>
						<option>museo.css</option>
						<option>ptsans.css</option>
						<option>puritan.css</option>
						</select><br><br>						
		
						<label><b>Sayaç</b> (google analytics, yandex metrica vb.)</label><br>
						<textarea cols="75" rows="2" name="analytics" class="input-text"><?php echo $print['analytics']; ?></textarea><br><br>	

						<label><b>Anasayfa Yazısı</b></label><br>
						<textarea cols="75" rows="2" name="hometext" class="input-text"><?php echo $print['hometext']; ?></textarea><br><br>						
		
		</p>
				
			</div> 

			<div class="col50 f-right">
			
				<p class="t-justify">

						<label><b>Blog'da Gösterilecek Yazı Adedi</b></label><br>
						<input type="number" min="0" max="20" name="bloglimit" value="<?php echo $print['bloglimit']; ?>" class="input-text" /><br><br>	

						<label><b>Blog Sayfası</b></label><br>
						<?php if($print['blog']=="0"){ ?>
						<input type="radio" name="blog" value="0" checked>Açık &nbsp;&nbsp;
						<input type="radio" name="blog" value="1">Kapalı<br><br>
						<?php }elseif($print['blog']=="1"){ ?>
						<input type="radio" name="blog" value="0">Açık &nbsp;&nbsp;
						<input type="radio" name="blog" value="1" checked>Kapalı<br><br>						
						<?php } ?>

						<label><b>Urunler Sayfası</b></label><br>
						<?php if($print['urunler']=="0"){ ?>
						<input type="radio" name="urunler" value="0" checked>Açık &nbsp;&nbsp;
						<input type="radio" name="urunler" value="1">Kapalı<br><br>
						<?php }elseif($print['urunler']=="1"){ ?>
						<input type="radio" name="urunler" value="0">Açık &nbsp;&nbsp;
						<input type="radio" name="urunler" value="1" checked>Kapalı<br><br>						
						<?php } ?>

						<label><b>Hizmetler Sayfası</b></label><br>
						<?php if($print['hizmetler']=="0"){ ?>
						<input type="radio" name="hizmetler" value="0" checked>Açık &nbsp;&nbsp;
						<input type="radio" name="hizmetler" value="1">Kapalı<br><br>
						<?php }elseif($print['hizmetler']=="1"){ ?>
						<input type="radio" name="hizmetler" value="0">Açık &nbsp;&nbsp;
						<input type="radio" name="hizmetler" value="1" checked>Kapalı<br><br>						
						<?php } ?>						

						<label><b>Facebook</b></label><br>
						<input type="text" size="60" name="facebook" value="<?php echo $print['facebook']; ?>" class="input-text" /><br><br>

						<label><b>Twitter</b></label><br>
						<input type="text" size="60" name="twitter" value="<?php echo $print['twitter']; ?>" class="input-text" /><br><br>	

						<label><b>İletişim Bilgileri</b></label><br>
						<textarea cols="75" rows="2" name="iletisim" class="input-text"><?php echo $print['iletisim']; ?></textarea><br><br>	

						<label><b>Yerimiz</b> (google map, yandex map vb.)</label><br>
						<textarea cols="75" rows="2" name="googlemap" class="input-text"><?php echo $print['googlemap']; ?></textarea><br><br>							

				</p>
				
			</div> 
			<div class="fix"></div>						

			<p style="padding-left:380px;"><input type="submit" class="input-submit" name="gonder" style="width:250px;" value="Kaydet" /></p>	
		</form>	<br>
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