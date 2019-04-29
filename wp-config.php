<?php
/**
 * WordPress için taban ayar dosyası.
 *
 * Bu dosya şu ayarları içerir: MySQL ayarları, tablo öneki,
 * gizli anahtaralr ve ABSPATH. Daha fazla bilgi için
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php düzenleme}
 * yardım sayfasına göz atabilirsiniz. MySQL ayarlarınızı servis sağlayıcınızdan edinebilirsiniz.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * @package WordPress
 */

// ** MySQL ayarları - Bu bilgileri sunucunuzdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'adananav_wordpress' );

/** MySQL veritabanı kullanıcısı */
define( 'DB_USER', 'adananav_tolga' );

/** MySQL veritabanı parolası */
define( 'DB_PASSWORD', '415987aQ' );

/** MySQL sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define('DB_COLLATE', '');

/**#@+
 * Eşsiz doğrulama anahtarları.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz. Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'x%|]/!;/H`D+?nT D7MLb8b3OIv-:{ih<T6s}J7qblBldg{?%947XW7^p_J-YMO9' );
define( 'SECURE_AUTH_KEY',  '/IptM/m6iF&$Lk;a~W:oVh:|;46S02)Oz#[``4zT(oJc:-EXMlt|IsqH<_@mF~gM' );
define( 'LOGGED_IN_KEY',    've(j?-)#e}fsIxiWL>.-*_Tnl$%/c,TBX;gz*gEp,dvD?$:^!!=#x6Sad 4})2- ' );
define( 'NONCE_KEY',        '>os3a:V5ulqtS{q-2C;skIk<pEOLEUXQq2- 7lkFjzwis7ebdb8[YFxdsNp5=/R;' );
define( 'AUTH_SALT',        'Ynu1Kj:r7UoH@T]Xhk(D*q]EA{oJFoq+#tMlp965@zO:v3af]3yF3NC!rLvzFY?v' );
define( 'SECURE_AUTH_SALT', 'G>#35#^?ns!X)oo%;N=!X}l8^KlMNYf.I:L$M>1#!(Nvy)`T&=6&{XDSvb1)DGJ;' );
define( 'LOGGED_IN_SALT',   '@t-a/}0/Sw_,y[Q}4gN<=us2H5+ebj~~OWe=a6jW*s4~kOQVA7X(F}t1;47tu4{Q' );
define( 'NONCE_SALT',       'B|jVZ-Z r[oJ^^_v,l;)UcI+4Xaf8r3V@1Ibs`b3dkf,Y7^`%mJs,sM,3g)BTO%~' );
/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri "true" yaparak geliştirme sırasında hataların ekrana basılmasını sağlayabilirsiniz.
 * Tema ve eklenti geliştiricilerinin geliştirme aşamasında WP_DEBUG
 * kullanmalarını önemle tavsiye ederiz.
 */
define('WP_DEBUG', false);

/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** WordPress değişkenlerini ve yollarını kurar. */
require_once(ABSPATH . 'wp-settings.php');
