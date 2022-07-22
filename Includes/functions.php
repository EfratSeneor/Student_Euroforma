<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Functions
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function connect($id, $title, $name, $forename, $status)
{
    $_SESSION['id'] = $id;
    $_SESSION['title'] = $title;
    $_SESSION['name'] = $name;
    $_SESSION['forename'] = $forename;
    $_SESSION['status'] = $status;
}

function disconnect()
{
    session_destroy();
}

function is_connected()
{
    return isset($_SESSION['id']);
}

function is_admin_connected()
{
   if(is_connected()){
       return($_SESSION['status']== 'admin');
   }
}

function is_student_connected()
{
   if(is_connected()){
       return($_SESSION['status']== 'student');
   }
}

function addMessage($message)
{
    if (!isset($_REQUEST['message'])) {
        $_REQUEST['message'] = array();
    }
    $_REQUEST['message'][] = $message;
}

function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function get_last_month($month) {
    $num_year = intval(substr($month, 0, 4));
    $num_month = intval(substr($month, 5, 2));
    if ($num_month == 1) {
        $num_month = 12;
        $num_year--;
    } else {
        $num_month--;
    }
    $result = $num_year."-". substr('0'.$num_month,-2);
    return $result;
}

function get_next_month($month){
    $num_year = intval(substr($month, 0, 4));
    $num_month = intval(substr($month, 5, 2));
    if ($num_month == 12) {
        $num_month = 1;
        $num_year++;
    } else {
        $num_month++;
    }
    $result = $num_year."-". substr('0'.$num_month,-2);
    return $result;
}

function send_email($objet, $contenu, $destinataire) {  
// on crée une nouvelle instance de la classe
$mail = new PHPMailer(true);
  // puis on l’exécute avec un 'try/catch' qui teste les erreurs d'envoi
  try {
    /* DONNEES SERVEUR */
    #####################
    $mail->isSMTP();                                       // envoi avec le SMTP du serveur
    $mail->Host       = 'smtp.ionos.fr';                  // serveur SMTP
    $mail->SMTPAuth   = true;                              // le serveur SMTP nécessite une authentification ("false" sinon)
    $mail->Username   = 'projets@euroforma.fr';     // login SMTP
    $mail->Password   = 'Email4EuroForma!';                // Mot de passe SMTP
    $mail->SMTPSecure = 'ssl';                             // encodage des données TLS (ou juste 'tls') > "Aucun chiffrement des données"; sinon PHPMailer::ENCRYPTION_SMTPS (ou juste 'ssl')
    $mail->Port       = 465;                               // port TCP (ou 25, ou 465...)

    /* DONNEES DESTINATAIRES */
    ##########################
    $mail->setFrom('projets@euroforma.fr', 'EUROFORMA No-Reply');            //adresse de l'expéditeur (pas d'accents)
    $mail->addAddress($destinataire, ' ');        // Adresse du destinataire (le nom est facultatif)
    // $mail->addReplyTo('moi@mon_domaine.fr', 'son nom');     // réponse à un autre que l'expéditeur (le nom est facultatif)
    // $mail->addCC('cc@example.com');            // Cc (copie) : autant d'adresse que souhaité = Cc (le nom est facultatif)
    // $mail->addBCC('bcc@example.com');          // Cci (Copie cachée) :  : autant d'adresse que souhaité = Cci (le nom est facultatif)

    /* PIECES JOINTES */
    ##########################
    // $mail->addAttachment('../dossier/fichier.zip');         // Pièces jointes en gardant le nom du fichier sur le serveur
    // $mail->addAttachment('../dossier/fichier.zip', 'nouveau_nom.zip');    // Ou : pièce jointe + nouveau nom

    /* CONTENU DE L'EMAIL*/
    ##########################
    $mail->isHTML(true);                                      // email au format HTML
    $mail->Subject = utf8_decode($objet);                     // Objet du message (éviter les accents là, sauf si utf8_encode)
    $mail->Body    = $contenu;                                // corps du message en HTML - Mettre des slashes si apostrophes
    $mail->AltBody = 'Contenu au format texte pour les clients e-mails qui ne le supportent pas'; // ajout facultatif de texte sans balises HTML (format texte)

    $mail->send();
  }
  // si le try ne marche pas > exception ici
  catch (Exception $e) {
    echo "Le Message n'a pas été envoyé. Mailer Error: {$mail->ErrorInfo}"; // Affiche l'erreur concernée le cas échéant
  }  
} // fin de la fonction sendmail
