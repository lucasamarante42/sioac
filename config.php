<?php

define('DB_NAME', 'db_flashv_consulta');


define('DB_USER', 'ELOHIM_JIREH');


define('DB_PASSWORD', 'evangelhoJCN19');


define('DB_HOST', 'localhost');

ini_set('display_errors', true);
error_reporting(E_ALL);

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	

if ( !defined('BASEURL') )
	define('BASEURL', '/flashview/');
	

if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'cjcninc/database.php');

define('HEADER_TEMPLATE', ABSPATH . 'cjcninc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'cjcninc/footer.php');	
	
?>
