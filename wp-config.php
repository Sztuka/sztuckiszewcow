<?php
define( 'WP_CACHE', true );
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Ten plik zawiera konfiguracje: ustawień MySQL-a, prefiksu tabel
 * w bazie danych, tajnych kluczy i ABSPATH. Więcej informacji
 * znajduje się na stronie
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Kodeksu. Ustawienia MySQL-a możesz zdobyć
 * od administratora Twojego serwera.
 *
 * Ten plik jest używany przez skrypt automatycznie tworzący plik
 * wp-config.php podczas instalacji. Nie musisz korzystać z tego
 * skryptu, możesz po prostu skopiować ten plik, nazwać go
 * "wp-config.php" i wprowadzić do niego odpowiednie wartości.
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', "sztuckiszewcow");

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', "root");

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', 'xSu3XdlYabsL7DKM');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', "devkinsta_db");

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '?_4 <E1Yn0A|PY> DXP=CmXtL<6+pATuLYV3Z/EGuwHK7<2?_-qJ.t6#>zfpcFMc');
define('SECURE_AUTH_KEY',  '(ahaKjk)@*pjz)`?m gi64lM&o+<Z?1en<Xj~5{)cB|5P@)QFL?,alpX,I,~{FN|');
define('LOGGED_IN_KEY',    '-w: #+jFzjhk|--Y:W|yfF|:d]lj[R%|??y]a4-&I45o3{)>.}9w+@#6;s`=zE}V');
define('NONCE_KEY',        'MJk+0ppNgSbz./LA0U;;6jlpAo+B]lo~Se[rR*;DF/ZEX?/h)pSCMDiv>&kR%M|A');
define('AUTH_SALT',        'osg.@^+5g4Fb^sV_Kf-1F q>2TZ`HvV[&L|SaVO^h?s`&D9|455_|K&f7S36-pj]');
define('SECURE_AUTH_SALT', 'IZj&h+#49.SYI{he-4|wnV>>cq]1]JvNc<Za%roIcw34g$;i{v`?J `Z/yRfxeiH');
define('LOGGED_IN_SALT',   'n4OG1=RH`Va1*mbUJDhX-~m[+E*LQa}ryfr527+YAI@#V8oK^,mp%*=o}Tqd{[Fi');
define('NONCE_SALT',       '9R$1r)m@DO:z-co~1MX8C~a%^!01 6on?wRD$Tfg1iN7/qN|x3zQ`a}YA~e1r@t ');


/**#@-*/
/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */

$table_prefix  = 'wp_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie ostrzeżeń
 * podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG w miejscach pracy nad nimi.
 */
define( 'WP_DEBUG', false );

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
        define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
