<?php define("include",true); include("style/config.php"); include("style/functions.php"); $url = htmlclean($_GET['url']); if($print['blog']=="1"){ header("Location:".$bshrf."index.php"); exit(); }
$athena = str_replace("-", " ", $url); if($url==""){ header("Location: ".$bshrf."index.php"); }else{ ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<link rel="Shortcut Icon"  href="favicon.jpg"  type="image/x-icon">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $print['keywords']; ?>" />
	<meta name="description" content="<?php echo $print['description']; ?>" />
  <meta property="og:title" content="CemCarSound – Adana Multimedya Navigasyon Hizmeti">
    <meta property="og:description" content="CemcarSound - Adana Navigasyon, Geri Dönüş Kamerası Montajı ve Harita Güncelleme ">
    <meta property="og:image" content="https://cemcarsound.com/resimler/slider0.jpg"> 
    
	<title>' <?php echo $athena; ?> ' Etiketli Yazılar  | <?php echo $print['siteadi']; ?></title>


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
    <div id="post-wrapper"><h3>' <?php echo $athena; ?> ' Etiketli Yazılar</h3>
<?php $limit = $print['bloglimit']; $page = @$_GET["page"]; if(empty($page) or !is_numeric($page)){ $page = 1; }

	$count			 =  $db->query("select count(*) from blog where keywords like '%$athena%'")->fetchColumn();
	$toplamsayfa	 = ceil($count / $limit);
	$baslangic		 = ($page-1)*$limit;

if($toplamsayfa < @$_GET["page"]){ echo '<meta http-equiv="refresh" content="0;URL='.$bshrf.'index.php">'; exit(); }else{ }

if($count=="0"){ echo '<div class="post"><b style="color:blue;">Aranılan anahtar kelimeyle ilişkili bir blog yazısı bulunamadı. Lütfen farklı bir kelime deneyin.</b></div>'; }else{

foreach($db->query("select * from blog where keywords like '%$athena%' order by id desc limit $baslangic,$limit") as $yazdir){ if($print['uzanti']==".php"){ ?>
      <div class="post">
        <h2 class="title"><a href="single.php?url=<?php echo $yazdir['seflink']; ?>"><?php echo $yazdir['baslik']; ?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
         Yayınlanma Tarihi : <div class="date"><?php echo timeConvert($yazdir['tarih']); ?></div></div>
		 <a href="single.php?url=<?php echo $yazdir['seflink']; ?>"><img src="<?php echo $yazdir['resimyolu']; ?>" alt="<?php echo $yazdir['baslik']; ?>" /></a>
        <p><?php echo htmlclean(kisalt($yazdir['icerik'], 150)); ?></p>
      </div>
<?php }elseif($print['uzanti']==".html"){ ?>
      <div class="post">
        <h2 class="title"><a href="<?php echo $bshrf; ?>blog/<?php echo $yazdir['seflink']; ?>.html"><?php echo $yazdir['baslik']; ?></a></h2>
        <div class="meta">
          <div class="top-border"></div>
         Yayınlanma Tarihi : <div class="date"><?php echo timeConvert($yazdir['tarih']); ?></div></div>
		 <a href="<?php echo $bshrf; ?>blog/<?php echo $yazdir['seflink']; ?>.html"><img src="<?php echo $yazdir['resimyolu']; ?>" alt="<?php echo $yazdir['baslik']; ?>" /></a>
        <p><?php echo htmlclean(kisalt($yazdir['icerik'], 150)); ?></p>
      </div>
<?php } } } ?>
      <ul class="page-navi">
<?php if($count > $limit) :
  $x = 2;
  $lastP = ceil($count/$limit);
  if($page > 1){
  $onceki = $page-1;
  //echo "<li><a href=\"?page=$onceki\"> Prev </a></li>";
  }
if($print['uzanti']==".php"){
  if($page==1) echo "<li><a class='current'>1</a></li>";
  else echo "<li><a href=\"etiket.php?url=$url&page=1\">1</a></li>";


  if($page-$x > 2) {
    echo "<li><a>...</a></li>";
    $i = $page-$x;
  } else {
    $i = 2;
  }

  for($i; $i<=$page+$x; $i++) {
    if($i==$page) echo "<li><a class='current'>$i</a></li>";
    else echo "<li><a href=\"etiket.php?url=$url&page=$i\">$i</a></li>";
    if($i==$lastP) break;
  }

  if($page+$x < $lastP-1) {
    echo "<li><a>...</a></li>";
    echo "<li><a href=\"etiket.php?url=$url&page=$lastP\">$lastP</a></li>";
  } elseif($page+$x == $lastP-1) {
    echo "<li><a href=\"etiket.php?url=$url&page=$lastP\">$lastP</a></li>";
} }elseif($print['uzanti']==".html"){
  if($page==1) echo "<li><a class='current'>1</a></li>";
  else echo "<li><a href=\"".$bshrf."etiket/$url/p1/\">1</a></li>";


  if($page-$x > 2) {
    echo "<li><a>...</a></li>";
    $i = $page-$x;
  } else {
    $i = 2;
  }

  for($i; $i<=$page+$x; $i++) {
    if($i==$page) echo "<li><a class='current'>$i</a></li>";
    else echo "<li><a href=\"".$bshrf."etiket/$url/p$i/\">$i</a></li>";
    if($i==$lastP) break;
  }

  if($page+$x < $lastP-1) {
    echo "<li><a>...</a></li>";
    echo "<li><a href=\"".$bshrf."etiket/$url/p$lastP/\">$lastP</a></li>";
  } elseif($page+$x == $lastP-1) {
    echo "<li><a href=\"".$bshrf."etiket/$url/p$lastP/\">$lastP</a></li>";
} }

  if($page < $lastP){
  $sonraki = $page+1;
  //echo "<li><a href=\"?page=$sonraki\"> Next </a></li>";
  } endif; ?>
      </ul>
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
