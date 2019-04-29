<?php if (!defined("include")) {
  echo '<meta http-equiv="refresh" content="0;URL=../index.php">';
  exit();
}
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first = $components[1]; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            <img width="220" height="220" src="style/images/logo.png" alt="Cem Car Sound Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto h5">
                <a class="nav-item nav-link" href="<?php echo $bshrf; ?>index<?php echo $print['uzanti']; ?>" <?php if ($first == "" || $first == "index.php" || $first == "index.html") { } ?>>Anasayfa</a>
                <?php foreach ($db->query("select * from skat order by sira asc") as $skat) { ?>
                <?php if ($print['hakimizda'] == "1") { } else { ?>
                <a class="nav-item nav-link" href="<?php echo $bshrf; ?>hakkimizda<?php echo $print['uzanti']; ?>" <?php if ($first == "hakkimizda.php" || $first == "hakkimizda.html" || $first == "hakkimizda.php" || $first == "hakkimizda.html") { } ?>>Hakkımızda</a><?php 
                                                                                                                                                                                                                                                                        } ?>

                <?php 
              } ?>
                <?php if ($print['blog'] == "1") { } else { ?><a class="nav-item nav-link" href="<?php echo $bshrf; ?>blog<?php echo $print['uzanti']; ?>" <?php if ($first == "blog.php" || $first == "blog.html" || $first == "single.php" || $first == "blog" || $first == "etiket.php" || $first == "etiket") { } ?>>Blog</a><?php 
                                                                                                                                                                                                                                                                                                                                } ?>
                <?php if ($print['urunler'] == "1") { } else { ?><a class="nav-item nav-link" href="<?php echo $bshrf; ?>urunler<?php echo $print['uzanti']; ?>" <?php if ($first == "urunler.php" || $first == "urunler.html" || $first == "incele.php" || $first == "incele.html") { } ?>>Ürünler</a><?php 
                                                                                                                                                                                                                                                                                                      } ?>
                <?php if ($print['hizmetler'] == "1") { } else { ?><a class="nav-item nav-link" href="<?php echo $bshrf; ?>hizmetler<?php echo $print['uzanti']; ?>" <?php if ($first == "hizmetler.php" || $first == "hizmetler.html") { } ?>>Hizmetler</a><?php 
                                                                                                                                                                                                                                                          } ?>
                <a class="nav-item nav-link" href="<?php echo $bshrf; ?>iletisim<?php echo $print['uzanti']; ?>" <?php if ($first == "iletisim.php" || $first == "iletisim.html") { } ?>>İletişim</a>
            </div>
            <div class="row text-right ml-3">
                <div class="col-md-12">
                    <div>
                        <a target="_blank" href="https://www.instagram.com/cemcarsound/"><em class="fab fa-instagram fa-2x text-dark"></em></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCjaxbzMsaM76e-28WtFJZ8Q"><em class="ml-2 fab fa-youtube fa-2x text-dark"></em></a>
                        <a target="_blank" href="https://www.facebook.com/CEMCARSOUND/"><em class="ml-2 fab fa-facebook fa-2x text-dark"></em></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav> 