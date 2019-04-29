<?php define("include",true); include("style/config.php"); include("style/functions.php"); $url = htmlentities(htmlclean($_GET['url'])); if($print['urunler']=="1"){ header("Location:".$bshrf."index.php"); exit(); }
$sorgu = $db->prepare("select * from projeler where seflink=?"); $sorgu->execute(array($url)); if($sorgu->rowCount()=="0"){ header("Location: ".$bshrf."index.php"); }else{ $gelen = $sorgu->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $gelen['keywords']; ?>" />
	<meta name="description" content="<?php echo $gelen['description']; ?>" />

	<title><?php echo $gelen['baslik']; ?> | <?php echo $print['siteadi']; ?></title>


<?php echo $print['analytics']; ?>
</head>
<body>

<div id="container">
  <div id="page-top">
    <div id="header-wrapper">
      <div id="header">
        <div id="logo"><a href="<?php echo $bshrf; ?>index<?php echo $print['uzanti']; ?>"><img src="<?php echo $bshrf; ?>style/images/logo.png" alt="<?php echo $print['siteadi']; ?>" /></a></div>
<?php include("style/menu.php"); ?>
      </div>
    </div>
  </div>

  <div id="wrapper">
    <div id="portfolio-single">
      <div class="image"><?php if($gelen['resim1']==""){ }else{ ?><img src="<?php echo $gelen['resim1']; ?>" alt="<?php echo $gelen['baslik']; ?>" /><?php } ?>
	<?php if($gelen['resim2']==""){ }else{ ?><img src="<?php echo $gelen['resim2']; ?>" alt="<?php echo $gelen['baslik']; ?>" /><?php } ?></div>
      <div class="text">
        <h3><?php echo $gelen['baslik']; ?></h3>
		<?php echo $gelen['icerik']; ?>
		<b>Kategori</b> : <?php $kategori = $db->query("select * from pkat where seflink='".$gelen['kategori']."'")->fetch(PDO::FETCH_ASSOC); echo $kategori['baslik']; ?><br>

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

      <div id="socials">
        <ul>
          <li><a href="#"><img src="<?php echo $bshrf; ?>style/images/icon-rss.png" alt="Site Haritası" /></a></li>
          <li><a href="<?php echo $print['twitter']; ?>" target="_blank"><img src="<?php echo $bshrf; ?>style/images/icon-twitter.png" alt="Twitter" /></a></li>
          <li><a href="<?php echo $print['facebook']; ?>" target="_blank"><img src="<?php echo $bshrf; ?>style/images/icon-facebook.png" alt="Facebook" /></a></li>
        </ul>
      </div>
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
<script type="text/javascript">
		$(function() {
            var offset = $(".text").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $(".text").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $(".text").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
</script>

</body>
</html>
<?php } ?>
