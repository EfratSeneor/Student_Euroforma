<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller password
 */

$todo = filter_input(INPUT_GET, 'todo', FILTER_SANITIZE_STRING);

switch ($todo) {
case 'request':
    include 'Views/v_email.php';
    break;
case 'send_email':
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    if(!validate_email($email)){
        $message = "Oh ! Il semble que l'email soit invalide... <br> "
            . "Merci de saisir une adresse email valide";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_email.php';
    }else{
        $user = $database->get_user_email($email);
        if($user){
            $id = $user['id'];
            $hour= date('d-m-y h:i:s');
            $to_crypt=$email.$hour;
            // Crypt token
            $crypt=hash("sha256",$to_crypt);
            $database->add_token($id, $crypt, $hour);

            // Data for email : 
            $object="Reinitialisation de mot de passe";
            $body= "<h1>Euroforma </h1>"
                    . "<p>Pour réinitialiser votre mot de passe cliquez sur le lien suivant: <br>"
                    . "https://etudiant.euroforma.fr/index.php?action=password&todo=new&token="
                    . $crypt
                    ."&id="
                    .$id
                    . "<br>"
                    . "L'envoi de cet email est automatique, merci de ne pas y répondre.</p>";

           send_email($object, $body, $email);
           $message = "Un email vient d'être envoyé. <br> "
                   . "Vous pouvez désormais réinitialiser votre mot de passe.";
            $type = "success col-md-10";
            include 'Views/v_notification.php';
        }
        else{
            $message = "Une erreur est survenue";
            $type = "danger col-md-10";
            include 'Views/v_notification.php';
            include 'Views/v_email.php';
        }
    }
    break;
case 'new':
    $token = $_GET['token'];
    $id = $_GET['id'];
    include 'Views/v_new_password.php';
    break;
case 'reinitialize':
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
    $user = $database->get_user_token($id, $token);
    
    if($user){
        if(validate_password($password) && $password==$password2){
            $crypt_password = crypt($password, "1234");
            $database->update_password($id, $crypt_password);
            $message = "Le nouveau mot de passe a bien été pris en compte";
            $type = "success col-md-10";
            include 'Views/v_notification.php'; 
        }
        else{
            $message = "Le mot de passe n'est pas conforme"
                    . "<br> ou les 2 mots de passe ne sont pas identiques.";
            $type = "danger";
            include 'Views/v_notification.php';
            include 'Views/v_new_password.php'; 
        }
    }
    else{
        $message = "Une erreur est survenue";
        $type = "danger col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_email.php';
    }
    break;
}