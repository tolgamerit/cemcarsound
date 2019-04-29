<?php if(!defined("include")){ echo '<meta http-equiv="refresh" content="0;URL=../index.php">'; exit(); }

try {
     $db = new PDO("mysql:host=localhost;dbname=adananav_site", "adananav_tolga", "415987aQ", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch ( PDOException $e ){
     print $e->getMessage(); exit();
}

$bshrf = 'https://'.$_SERVER['HTTPS_HOST'].'cemcarsound.com/'; $print = $db->query("select * from ayarlar")->fetch(PDO::FETCH_ASSOC); ?>