<?php

	// url du projet

	if(!function_exists('get_url')){
		function get_url(){
			if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
				$url = "https"; 
			else
				$url = "http"; 
			
			// Ajoutez // à l'URL.
			$url .= "://"; 
			
			// Ajoutez l'hôte (nom de domaine, ip) à l'URL.
			$url .= $_SERVER['HTTP_HOST']; 
				
			// Afficher l'URL
			echo $url;
		}
	}

	// Génerer un token unique
	function generer($length)
	{
		$alphabet ="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		return substr( str_shuffle(str_repeat($alphabet,$length )),0, $length);
	}

	// Gestion automatique des noms de page en title
	function title($title)
	{
		echo isset($title)
		? $title .' - '. site_web.' - '
		: ' - '. site_web.' - ';
	}

	// vérification si un champs n'est pas vide
	if(!function_exists('not_empty')){
		function not_empty($fields = []){
			if (count ($fields) != 0){
				foreach ($fields as $field) {
					if (empty ($_POST[$field]) || trim ($_POST[$field]) ==""){
						return false;
					}
				}
				return true;
			}
		}
	}

	// vérification si un champs n'est pas vide
	if(!function_exists('null_verify')){
		function null_verify($value){
			if (empty ($value)  || trim ($value) =="" || $value =="Neant"){
					echo "Néant";
				} else {
					echo $value;
				}
		}
	}
	// vérification des variable dans la db
	if(!function_exists('is_already_in_use')){
		function is_already_in_use($field, $value, $table){
			global $db;
			$q = $db->prepare ("SELECT id FROM $table WHERE $field = ?");
			$q -> execute ([$value]);	
			$count = $q->rowCount();
			// $q-> closeClursor();
			return $count;
		}
	}

	// Sauvegarde en session d'un message + redirection sur une autre
	// ./includes/errors/flash_message.php
	if(!function_exists('set_flash')){
		function set_flash($message, $type="info"){
			$_SESSION['notification']['message'] = $message;
			$_SESSION['notification']['type'] = $type;
		}
	}


	// Fonction de redirection rapide
	if(!function_exists('redirect')){
		function redirect($page){
			header("location:" . $page); 
			exit();
		}
	}
	
	
	// Donnée echapper et traiter au sql injector
	if(!function_exists('e')){
		function e($string){
			if ($string){
				return htmlspecialchars($string);
			} 
		}
	}

	// Sauvegarde des donnée inputs après un refresh
	if(!function_exists('save_input_data')){
		function save_input_data(){
			foreach($_POST as $key => $value){
				if (strpos($key, 'password') === false){
					$_SESSION['input'][$key] = $value;
				}
			}
		}
	}	

	// Récuperation des données inputs sauvegarder
	if(!function_exists('get_input')){
		function get_input($key){
			if (!empty($_SESSION['input'][$key])){
				return  e($_SESSION['input'][$key]);
			} else {
				return Null;
			}
		}
	}

	// Suppression des données inputs sauvegarder
	if(!function_exists('clear_input_data')){
		function clear_input_data(){
			if (isset($_SESSION['input'])){
				$_SESSION['input']=[];
			} 
		}
	}

	//Encrypt
	if(!function_exists('encryptIt')){
		function encryptIt( $key ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$keyEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $key, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
			return( $keyEncoded );
		}
	}

	//Decrypt
	if(!function_exists('decryptIt')){
		function decryptIt( $key ) {
			$cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
			$keyDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $key ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
			return( $keyDecoded );
		}
	}


	// Encrypt And Decrypt
	
	if(!function_exists('encrypt_decrypt')){
		function encrypt_decrypt($string, $action = 'encrypt')
			{
				$encrypt_method = "AES-256-CBC";
				$secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
				$secret_iv = '5fgf5HJ5g27'; // user define secret key
				$key = hash('sha256', $secret_key);
				$iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
				if ($action == 'encrypt') {
					$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
					$output = base64_encode($output);
				} else if ($action == 'decrypt') {
					$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
				}
				return $output;
			}

			// echo "Your Encrypted password is = ". $pwd = encrypt_decrypt('spaceo', 'encrypt');
            // echo "<br>Your Decrypted password is = ". encrypt_decrypt($pwd, 'decrypt');
	}
	
	


	
	