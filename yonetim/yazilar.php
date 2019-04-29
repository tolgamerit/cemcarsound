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

			<h1>Yazılar</h1><br><br>
<?php if($print['blog']=="1"){ echo '<div class="warning msg"><b>Blog sayfası kapalıdır. Yaptığınız değişiklikler site üzerinde gözükmeyecektir. Sayfayı aktif etmek için <a href="ayarlar.php">ayarlar</a> sayfasına gidin.</b></div><br>'; }
if(isset($_GET['sil'])){ $sil = $db->prepare("delete from blog where id = :id"); $sil->execute(array('id' => $_GET['sil'])); 
echo '<meta http-equiv="refresh" content="2;URL=yazilar.php">'; echo '<div class="warning msg" style="width:300px;"><b>Yazı silindi.</b></div><br>'; } ?>					
			<table>
				<tr>
				    <th>Başlık</th>
				    <th style="text-align:center;">İşlemler</th>
				</tr>
<?php $limit = 20;  $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; } 

	$count			 =  $db->query("select count(*) from blog")->fetchColumn();
	$toplamsayfa	 = ceil($count / $limit);
	$baslangic		 = ($page-1)*$limit;
	
if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'index.php">'; exit(); }else{ } 

foreach($db->query("select * from blog order by id desc limit $baslangic,$limit") as $gelen){ ?>					
			<?php if ($gelen['id']%2!=0){ echo '<tr>'; }else{ echo '<tr class="bg">'; } ?>							
				    <td width="99%"><?php echo $gelen['baslik']; ?></td>							
				    <td align="center"><a href="yaziedit.php?id=<?php echo $gelen['id']; ?>"><img src="design/edit.png" alt="" title="Düzenle" /></a>
					<a href="yazilar.php?sil=<?php echo $gelen['id']; ?>"><img src="design/cross.png" alt="" title="Sil" /></a></td>
				</tr>
<?php } echo '</table><br>';
 if($count > $limit) : 
  $x = 2; 
  $lastP = ceil($count/$limit); 

  if($page > 1){

  $onceki = $page-1;
  echo "<a href=\"?page=$onceki\">Geri</a>&nbsp;"; 
  }
 
  if($page==1) echo "1&nbsp;"; 
  else echo "<a href=\"?page=1\">1</a>&nbsp;";   

  
  if($page-$x > 2) { 
    echo "...&nbsp;"; 
    $i = $page-$x; 
  } else { 
    $i = 2; 
  } 

  for($i; $i<=$page+$x; $i++) { 
    if($i==$page) echo "$i&nbsp;"; 
    else echo "<a href=\"?page=$i\">$i&nbsp;</a>&nbsp;"; 
    if($i==$lastP) break; 
  } 

  if($page+$x < $lastP-1) { 
    echo "...&nbsp;"; 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } elseif($page+$x == $lastP-1) { 
    echo "<a href=\"?page=$lastP\">$lastP</a>"; 
  } 
  
  if($page < $lastP){
  $sonraki = $page+1;
  echo "<a href=\"?page=$sonraki\">İleri</a>"; 
  } endif; ?> <br>
			
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