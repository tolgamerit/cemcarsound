<?php define("include",true); include("style/config.php"); include("style/functions.php"); $url = htmlentities(htmlclean($_GET['url']));
$sorgu = $db->prepare("select * from sayfalar where seflink=?"); $sorgu->execute(array($url)); if($sorgu->rowCount()=="0"){ header("Location: ".$bshrf."index.php"); }else{ $gelen = $sorgu->fetch(PDO::FETCH_ASSOC); ?>
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
    <div class="content">
      <h2><?php echo $gelen['baslik']; ?></h2>
      <br />
	<?php echo $gelen['icerik']; ?>
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
	<link rel="stylesheet" type="text/css" href="<?php echo $bshrf; ?>style/contact.css" media="all" />
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
