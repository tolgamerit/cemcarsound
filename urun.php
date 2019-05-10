<?php define("include", true);
include("style/config.php");
include("style/functions.php");

$url = $_GET['url'];
$sorgu = $db->prepare("select * from projeler where seflink=?"); $sorgu->execute(array($url)); $gelen = $sorgu->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <?php include("style/function.php");?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta name="language" content="Turkish" />
    <meta property="og:title" content="CemCarSound – Adana Multimedya Navigasyon Hizmeti">
    <meta property="og:description" content="CemcarSound - Adana Navigasyon, Geri Dönüş Kamerası Montajı ve Harita Güncelleme ">
    <meta property="og:image" content="https://cemcarsound.com/resimler/slider0.jpg"> 
    
    <link rel="Shortcut Icon" href="favicon.jpg" type="image/x-icon">
    <meta name="keywords" content="<?php echo $print['keywords']; ?>" />
    <meta name="description" content="<?php echo $print['description']; ?>" />

    <title><?php echo $gelen['baslik']; ?>  | <?php echo $print['siteadi']; ?></title>
    <?php echo $print['analytics']; ?>
</head>

<body>

    <?php include("style/menu.php");

    ?>

    <div class="container mt-5 mb-5">

        <div class="card rounded border-0" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)">
            <div class="card-body">
                <h4 class="card-title p-3"><?php echo $gelen['baslik']; ?></h4>
                <div class="row p-5">

                <?php foreach($db->query("select * from urunler ") as $bbb) 
                
                
                if($bbb[model]==$gelen[seflink])
                {
                    {  ?>
 <div class="col-lg-3 col-md-4 col-sm-6 mb-5">

   
<div class="card border-0" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" >
<a href="cihazdetay/<?php echo $bbb['seflink']; ?>"><img class="card-img-top rounded mx-auto d-block" src="<?php echo $bbb['resimyolu'];?>" alt="Card image cap"></a>
<div class="card-body">
<p class="card-text text-center"><?php echo $bbb['baslik'];?></p>
</div>
</div>
</div>
<?php  }
} ?>




                </div> 
                </div> </div>


            </div>
  




    <div class="container-fluid fixed-row-bottom ">

        <div style="background-color:#6ec7e0" class="row p-5">
        
            <div class="col-md-12 ">
            <div class="row text-right mb-3">
<div class="col-md-12">
<div>
<a target="_blank" href="https://www.instagram.com/cemcarsound/"><em class="fab fa-instagram fa-2x text-white"></em></a>
<a target="_blank" href="https://www.youtube.com/channel/UCjaxbzMsaM76e-28WtFJZ8Q"><em class="ml-2 fab fa-youtube fa-2x text-white"></em></a>
<a target="_blank" href="https://www.facebook.com/CEMCARSOUND/"><em class="ml-2 fab fa-facebook fa-2x text-white"></em></a>
</div>

</div>
</div>
                <p class="text-center text-white h5">&copy; <?php date_default_timezone_set('Europe/Istanbul');
                                                            echo date('Y'); ?>, <?php echo $print['siteadi']; ?>. Tüm hakları saklıdır.</p>
      
<div class="row">
<div class="col-md-12 text-white lead">
<div>
<em class="fa fa-phone mr-2 mt-2"></em> 554 586 42 22 - 545 220 09 01
</div>
<div>

<em class="fas fa-paper-plane mr-3"></em>info@cemcarsound.com
</div>
<div>
<em class="fa fa-map-marker mr-3"></em> Reşatbey Mahallesi Stadyum Güney Kale Karşısı No:29 Güreken APT. Seyhan/Adana 
</div>
</div>
</div>


      
         </div>




        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html> 