<?php
//DISPARA OS ERROS
ini_set('display_errors', 0);
error_reporting(E_ALL);

$dominiowww = $_SERVER['SERVER_NAME'];
$dominio = str_replace('www.', '', $_SERVER['HTTP_HOST']);

// Caminho para a raiz
define('RAIZ', dirname(__FILE__));
// URL da home
define('HOME_URI', 'http://' . $dominiowww . '/tcc');
// URL do dominio
define('DOMINIO', 'http://' . $dominiowww);
// URL de stats
define('STATS', 'http://' . $dominiowww . '/stats');
// URL da webmail
define('WEBMAIL', 'http://' . 'webmail.' . $dominio);
// email remetente padrão
define('EMAIL_REMETENTE', 'webmaster@' . $dominiowww);
// URL de INCLUDE
define('INCLUSAO', 'views/_include');
// URL de INCLUDE HEAD
define('INCLUDE_HEAD', HOME_URI . '/views/_include');
// URL de CSS
define('CSS', HOME_URI . '/views/_css');
// URL de JS
define('JS', HOME_URI . '/views/_js');
// URL de images
define('IMAGES', HOME_URI . '/views/_images');
// URL de arquivos Clientes
define('CLIENTES', HOME_URI . '/views/_clientes');
// URL DE LOAD VIEWS
define('LOAD_VIEW', HOME_URI . '/views/');

//CONEXAO BD
define('MYSQL', 'mysql.' . $dominio);
define('USER', 'falcon5m28');
define('PASS', 'falcon14');
define('BD', 'falcon5m28');

define('VIEWS', 'views');
define('MODELS', 'models');
define('CONTROLLERS', 'controllers');

define('DEBUG', false);

require_once 'includes/functions.php';
require_once 'load.php';
