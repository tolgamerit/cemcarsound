<?php define("include", true);
include("style/config.php");
include("style/functions.php");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
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

    <title>İletişim | <?php echo $print['siteadi']; ?></title>
    <?php echo $print['analytics']; ?>
    <style>
    .map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}</style>
</head>

<body>

    <?php include("style/menu.php");
   
    ?>

    <div class="container mt-5 mb-5">

        <div class="card rounded border-0" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)">
            <div class="card-body">
                <h4 class="card-title p-3">İletişim</h4>
              <div class="row p-3">
              <p class="lead p-3">Bizimle iletişim kurabilmek için aşağıda yer alan iletişim formunu doldurabilir veya iletişim bilgilerimizden herhangi biri ile bilgi alabilirsiniz.

</p></div>
                <div class="row">
               
<div class="col-md-6 p-5">
<?php if(isset($_POST['submit'])){

$adsoyad = $_POST['adsoyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$mesaj = htmlclean($_POST['mesaj']);
$tarih = date_default_timezone_set('Europe/Istanbul');
$ip = $_SERVER['REMOTE_ADDR'];

if($adsoyad==""||$email==""||$telefon==""||$mesaj==""){ echo '<strong style="color:red;">Lütfen tüm alanları doldurun!</strong>'; }else{

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ echo '<strong style="color:red;">Lütfen geçerli bir e-mail adresi girin!</strong>'; }else{

$kayit = $db->prepare("insert into contact SET adsoyad=?,email=?,telefon=?,mesaj=?,tarih=?,ip=?");
$insert = $kayit->execute(array($adsoyad, $email, $telefon, $mesaj, $tarih, $ip));




echo '


<div class="alert alert-success" role="alert">
Mesajınız iletilmiştir.
</div>
<meta http-equiv="refresh" content="1;URL=index.php">        

'; } } } ?>





<form method="POST">
  <div class="form-group">
   
    <input  class="form-control" placeholder="Ad Soyad" type="text" name="adsoyad" id="name" required>
  </div>
  <div class="form-group">
    
    <input type="email" class="form-control"  placeholder="E-Mail" name="email" id="email" required>
  </div><div class="form-group">
  
    <input type="text" class="form-control" placeholder="Telefon" name="telefon" id="phone" required>
  </div>
 
  <div class="form-group">

    <textarea class="form-control" name="mesaj" rows="6" cols="30" placeholder="Mesaj" required></textarea>
  </div>
  <input type="submit" name="submit" value="Gönder" class="btn btn-gray float-right"></input>

</form>
</div>   

<div class="col-md-6 p-5">
<h5>İletişim Bilgileri</h5>
<div>
<em class="fa fa-phone mr-2 mt-2"></em> 554 586 42 22 - 545 220 09 01
</div>
<div>

<em class="fas fa-paper-plane mr-3"></em>info@cemcarsound.com
</div>
<div>
<em class="fa fa-map-marker mr-3"></em> Reşatbey Mahallesi Stadyum Güney Kale Karşısı No:29 Güreken APT. Seyhan/Adana 
</div>
<div class="map-responsive">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3186.493355859901!2d35.32783431487138!3d36.998024979908294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15288f6b7b4f5fa7%3A0xeff8c934d6fe8f47!2sCEM+CAR+SOUND+Adana+Multimedya+Navigasyon+ve+Ses+Sistemleri+Montaj+Servis+ve+Yedek+Par%C3%A7a+Merkezi!5e0!3m2!1str!2str!4v1477313124563" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

</div>
                
                </div>


            </div>
        </div>


    </div>





    <div class="container-fluid fixed-row-bottom ">

        <div style="background-color:#29ABE2" class="row p-5">
        
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