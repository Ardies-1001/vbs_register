<?php
// inclusion des paramètres
session_start();
require_once ('bootstrap.php');


if (isset($_POST['register'])){   

    if (not_empty(['nom', 'prenom', 'pseudo', 'email', 'password', 'repassword'])){
        // creation d'un tableau pour recuperer les erreurs.  
        $errors=[];
        extract($_POST);	
                
        if (mb_strlen($pseudo) < 5){
            $errors[] = "Nom trop court! (Mim 5 charactères)";
        }          
        if (mb_strlen($nom) < 5){
            $errors[] = "Nom trop court! (Mim 5 charactères)";
        }
        
        if (mb_strlen($prenom) < 3){
            $errors[] = "Prenom trop court! (Mim 3 charactères)";
        }

        if (mb_strlen($password) < 5 ){
            $errors[] = "Votre mot de passe fait moins de 5 caractères";
        }

        if ($password !== $repassword){
            $errors[] = "Mot de passe non identique";
        }

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] = "Adresse Email Invalide";
        }

        if (is_already_in_use('email', $email, 'users')){
            $errors[] = "Adresse Email déjà utilisé!";
        }
        

        if(count($errors) == 0){ // si pas d'erreur

            //$password_crypt = password_hash($password, PASSWORD_BCRYPT);
            $password_crypt = sha1($password);
            //$password_true = sha1($pseudo.$email.$password_sha1);  
            //order PASSWORD_DEFAULT PASSWORD_BCRYPT PASSWORD_ARGON2I PASSWORD_ARGON2ID

            $token_id=generer(5);

            $q = $db->prepare( "INSERT INTO `users` (`id`,`nom`,`prenom`,`pseudo`, `email`, `password`, `created` )
                                VALUES (:id ,:nom, :prenom, :pseudo, :email, :password, NOW() )" );
            $q->execute([
                'id' => $token_id,
                'nom' => $nom,
                'prenom' => $prenom,
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password_crypt
            ]);

            set_flash("Utilisateur enrégistrer", 'success');
            redirect('index.php') ;

        } else { 
            // s'il y a des erreurs alors on sauvegarde
            save_input_data();
        }

    } else {
        $errors[] = "Veuillez SVP remplir tous les champs";
        save_input_data();
        // var_dump(($_POST));
    }

} else { 
    // si l'utilisateur vient pour la première fois alors tout doit être surprimer
    clear_input_data();
}


require("views/home.view.php");