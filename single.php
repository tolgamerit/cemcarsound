<?php define("include",true); include("style/config.php"); include("style/functions.php"); $url = htmlentities(htmlclean($_GET['url'])); if($print['blog']=="1"){ header("Location:".$bshrf."index.php"); exit(); }
$sorgu = $db->prepare("select * from blog where seflink=?"); $sorgu->execute(array($url)); if($sorgu->rowCount()=="0"){ header("Location: ".$bshrf."index.php"); }else{ $gelen = $sorgu->fetch(PDO::FETCH_ASSOC);
if(!@$_COOKIE[md5('blog-'.$gelen['id'])]){ $hit = $db->prepare("update blog set hit=hit+1 where id = :id"); $hit->execute(array("id" => $gelen['id'])); setcookie(md5('blog-'.$gelen['id']), true, time() + (60 * 60 * 24 * 12) ); } ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<link rel="Shortcut Icon"  href="favicon.jpg"  type="image/x-icon">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $gelen['keywords']; ?>" />
	<meta name="description" content="<?php echo $gelen['description']; ?>" />
  <meta name="language" content="Turkish" />
  <meta property="og:title" content="CemCarSound – Adana Multimedya Navigasyon Hizmeti">
    <meta property="og:description" content="CemcarSound - Adana Navigasyon, Geri Dönüş Kamerası Montajı ve Harita Güncelleme ">
    <meta property="og:image" content="https://cemcarsound.com/resimler/slider0.jpg"> 
    
	<title><?php echo $gelen['baslik']; ?> | <?php echo $print['siteadi']; ?></title>


<?php echo $print['analytics']; ?>
</head>
<body>

<div id="container">
  <div id="page-top">
    <div id="header-wrapper">
      <div id="header">
        <div id="logo"><a href="<?php echo $bshrf; ?>index<?php echo $print['uzanti']; ?>"><img src="<?php echo $bshrf; ?>style/images/logo.png" alt="<?php echo $print['siteadi']; ?>" /></a></div>
<a target="_blank" href="https://www.facebook.com/CEMCARSOUND/"><img src="png-logo/facebook.png" align="right"> </a>
<a target="_blank" href="https://plus.google.com/115934011899947357383"><img src="png-logo/googleplus.png" align="right"> </a>
<a target="_blank" href="https://www.youtube.com/channel/UCjaxbzMsaM76e-28WtFJZ8Q"><img src="png-logo/youtube.png" align="right"> </a>
<a target="_blank" href="https://www.instagram.com/cemcarsound/"><img src="png-logo/instagram.png" align="right"> </a>

		<?php include("style/menu.php"); ?>
      </div>
    </div>
  </div>

  <div id="wrapper">
    <div id="post-wrapper">
      <div class="post">
        <h2 class="title"><?php echo $gelen['baslik']; ?></h2>
        <div class="meta">
          <div class="top-border"></div>
		Yayınlanma Tarihi : <div class="date"><?php echo timeConvert($gelen['tarih']); ?></div></div>
        <img src="<?php echo $gelen['resimyolu']; ?>" alt="<?php echo $gelen['baslik']; ?>" />
        <?php echo $gelen['icerik']; ?>
        <div class="top-border"></div>
        <div class="tags"> Etiketler : <?php $t = explode(', ', $gelen['keywords']); $xyz = count($t); for($i=0; $i<$xyz; $i++){ $etiket = trim($t[$i]); $acayip = str_replace(" ", "-", $etiket);
	if($print['uzanti']==".php"){ echo '<a href="etiket.php?url='.$acayip.'">'.$etiket.'</a>, '; }elseif($print['uzanti']==".html"){ echo '<a href="'.$bshrf.'etiket/'.$acayip.'/">'.$etiket.'</a>, '; } } ?></div>
      </div>
    </div>

    <div id="sidebar">
      <div class="sidebox">
<?php if(isset($_POST['search'])){ $xyz = $_POST['xyz']; if($xyz==""){ }else{
if($print['uzanti']==".php"){ echo '<meta http-equiv="refresh" content="0;URL=etiket.php?url='.$xyz.'">';
}elseif($print['uzanti']==".html"){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'etiket/'.$xyz.'/">'; } } } ?>
        <form id="searchform" method="post">
          <input type="text" id="s" name="xyz" placeholder="Blog içi arama..." />
		  <input type="submit" name="search" value="">
        </form>
      </div>
      <div class="sidebox">
        <h3>Popüler Yazılar</h3>
        <ul class="post-list">
	<?php foreach($db->query("select * from blog order by hit desc limit 0,5") as $aaa){ if($print['uzanti']==".php"){ ?>
          <li><a href="single.php?url=<?php echo $aaa['seflink']; ?>"><img src="<?php echo $aaa['resimyolu']; ?>" alt="<?php echo $aaa['baslik']; ?>" /></a>
            <h4><a href="single.php?url=<?php echo $aaa['seflink']; ?>"><?php echo $aaa['baslik']; ?></a></h4>
            <span class="info"><?php echo timeConvert($aaa['tarih']); ?></span></li>
	<?php }elseif($print['uzanti']==".html"){ ?>
          <li><a href="<?php echo $bshrf; ?>blog/<?php echo $aaa['seflink']; ?>.html"><img src="<?php echo $aaa['resimyolu']; ?>" alt="<?php echo $aaa['baslik']; ?>" /></a>
            <h4><a href="<?php echo $bshrf; ?>blog/<?php echo $aaa['seflink']; ?>.html"><?php echo $aaa['baslik']; ?></a></h4>
            <span class="info"><?php echo timeConvert($aaa['tarih']); ?></span></li>
		<?php } } ?>
        </ul>
      </div>
      <div class="sidebox">
        <h3>Etiketler</h3>
        <ul class="tags">
	<?php foreach($db->query("select * from blog group by keywords order by id desc limit 0,5") as $bitch){ $t = explode(', ', $bitch['keywords']); $xyz = count($t); for($i=0; $i<$xyz; $i++){ $etiket = trim($t[$i]); $acayip = str_replace(" ", "-", $etiket);
	if($print['uzanti']==".php"){ echo '<li><a href="etiket.php?url='.$acayip.'">'.$etiket.'</a></li>'; }elseif($print['uzanti']==".html"){ echo '<li><a href="'.$bshrf.'etiket/'.$acayip.'/">'.$etiket.'</a></li>'; } } } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="push"></div>
</div>

<div id="footer-wrapper">
  <div id="footer">
    <div id="footer-content">
      <div id="copyright">
        <p>&copy; <?php date_default_timezone_set('Europe/Istanbul'); echo date('Y'); ?>, <?php echo $print['siteadi']; ?>. Tüm hakları saklıdır.</p>

	  </div>
<a target="_blank" href="https://www.facebook.com/CEMCARSOUND/"><img src="png-logo/facebook.png" align="right"> </a>
<a target="_blank" href="https://plus.google.com/115934011899947357383"><img src="png-logo/googleplus.png" align="right"> </a>
<a target="_blank" href="https://www.youtube.com/channel/UCjaxbzMsaM76e-28WtFJZ8Q"><img src="png-logo/youtube.png" align="right"> </a>
<a target="_blank" href="https://www.instagram.com/cemcarsound/"><img src="png-logo/instagram.png" align="right"> </a>


    </div>
  </div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo $bshrf; ?>style/style.css" media="all" />
<link rel="stylesheet" media="all" href="<?php echo $bshrf; ?>style/type/<?php $print['tfont']; ?>" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo $bshrf; ?>style/css/ie7.css" media="all" />
<![endif]-->
<script type="text/javascript" src="<?php echo $bshrf; ?>style/js/jquery-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo $bshrf; ?>style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="<?php echo $bshrf; ?>style/js/scripts.js"></script>

</body>
</html>
<?php } ?>
