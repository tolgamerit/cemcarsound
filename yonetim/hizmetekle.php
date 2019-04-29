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
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/switcher.js"></script>
	<title>Cem Car Sound Yönetim Paneli</title>
<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
        mode : "exact",
        elements : "elm1",		
		theme : "advanced",
		entities : "raw",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>	
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
			<h1>Hizmet Ekle</h1>
			<br>
<?php if($print['hizmetler']=="1"){ echo '<div class="warning msg"><b>Hizmetler sayfası kapalıdır. Yaptığınız değişiklikler site üzerinde gözükmeyecektir. Sayfayı aktif etmek için <a href="ayarlar.php">ayarlar</a> sayfasına gidin.</b></div><br>'; }

if(isset($_POST["gonder"])){

$sira = $_POST['sira'];
$baslik = $_POST['baslik'];
$icerik = $_POST['icerik'];

if($sira==""||$baslik==""||$icerik==""){ echo '<div class="error msg" style="width:300px;"><b>Bütün alanları doldurmanız gerekmektedir.</b></div><br>'; }else{

$kayit = $db->prepare("insert into hizmetler SET sira=?,baslik=?,icerik=?"); $kayit->execute(array($sira, $baslik, $icerik));

echo "<div class='done msg' style='width:200px;'><b>Hizmet eklendi.</b></div><br>"; } } ?>
						<form method="post">
							<div class="col50">
			
				<p class="t-justify">   
				
						<label><b>Sıra No</b></label><br>
						<input type="text" size="20" name="sira" class="input-text" /><br><br>					
				
						<label><b>Başlık</b></label><br>
						<input type="text" size="70" name="baslik" class="input-text" /><br><br>				

						<label><b>İçerik</b></label><br>
						<textarea cols="75" rows="20" name="icerik" id="elm1" class="input-text"></textarea><br><br>	
						
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