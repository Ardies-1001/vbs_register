<?php
//parametrage des accès
$db = [
	'host' => '127.0.0.1',
	'name' => 'vbs_register',
	'user' => 'root',
	'password' =>''
	];
# connexion a la base donnée
try {	
$db = new PDO('mysql:host='.$db['host'].'; dbname='.$db['name'], $db['user'], $db['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
echo "ERREUR DE CONNEXION A LA BASE DE DONNEE !";
die();
}


/*  fonctions, constante et autre */
include_once ('includes/errors/404.php');
require_once ('includes/functions/function.php');
include_once ("includes/constantes/constante.php");
erreur404();



/*authentification ssl
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST']."/framework/";
header('Location: '.$uri);
exit;
authentification ssl*/

