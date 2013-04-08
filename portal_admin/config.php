<?php
//$APP_URL='http://'.$_SERVER['SERVER_NAME']; 
$DB_CONFIG=array(
	'DB_SERVER'	=>'localhost',
	'DB_NAME'	=>'mazatleca',
	'DB_USER'	=>'root',
	'DB_PASS'	=>'',
	'PASS_AES'=>'faztA3s'
);

$APP_CONFIG=array(
	'nombre'=>'Marina MVC',
	'tema'=>'rocket'
);

$_DEFAULT_CONTROLLER='general';
$_DEFAULT_ACTION='index';
$_LOGIN_REDIRECT_PATH = '/portal_admin/'.$_DEFAULT_CONTROLLER.'/'.$_DEFAULT_ACTION;

// if (!defined('DEFAULT_APP') ) define('DEFAULT_APP','portal_admin');
// if (!defined('DEFAULT_CONTROLLER') ) define('DEFAULT_CONTROLLER','general');
// if (!defined('DEFAULT_ACTION') ) define('DEFAULT_ACTION','index');

// $_LOGIN_REDIRECT_PATH = '/'.DEFAULT_APP.'/'.DEFAULT_CONTROLLER.'/'.DEFAULT_ACTION;
// Configuracion del ssitio
// define ("NOMBRE_APL",'Marina MVC');
// define ("PASS_AES",'faztA3s');

// define ("TEMA",'rocket');
// define ("TEMA",'black-tie');

// define ("PATH_MVC",'../mvc/');
//define ("DEFAULT_CONTROLLER",'general');
// CONFIGURA LA RUTA DEL NUCLEO
// define ("PATH_NUCLEO",'../mvc_core/');

?>