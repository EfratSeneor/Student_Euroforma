<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller candidate
 */

$todo = filter_input(INPUT_GET, 'todo', FILTER_SANITIZE_STRING);
if (!$todo) {
    $todo = 'candidate1';
}

switch ($todo) {
case 'candidate1':
    include 'Views/v_candidate_1.php';
    break;
case 'candidate2':
    include 'Views/v_candidate_2.php';
    break;
case 'candidate3':
    include 'Views/v_candidate_3.php';
    break;
case 'candidate4':
    include 'Views/v_candidate_4.php';
    break;
case 'candidate1_validation':
    $c_email = filter_input(INPUT_POST, 'c_email', FILTER_SANITIZE_STRING);
    $c_choice = filter_input(INPUT_POST, 'c_choice', FILTER_SANITIZE_STRING);
    if(!validate_email($c_email)){
        $message = "Oh ! Il semble que l'email soit invalide... <br> "
            . "Merci de saisir une adresse email valide";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
    }else{
       $_SESSION['c_email'] = $c_email; 
       $_SESSION['c_choice'] = $c_choice;
    }
    include 'Views/v_candidate_2.php';
    break;
case 'candidate2_validation':
    $c_name = filter_input(INPUT_POST, 'c_name', FILTER_SANITIZE_STRING);
    $c_forename = filter_input(INPUT_POST, 'c_forename', FILTER_SANITIZE_STRING);
    $c_adress = filter_input(INPUT_POST, 'c_adress', FILTER_SANITIZE_STRING);
    $c_cp = filter_input(INPUT_POST, 'c_cp', FILTER_SANITIZE_STRING);
    $c_tel = filter_input(INPUT_POST, 'c_tel', FILTER_SANITIZE_STRING);
    $c_date = filter_input(INPUT_POST, 'c_date', FILTER_SANITIZE_STRING);
    if(!validate_cp($c_cp)){
        $message = "Oh ! Il semble que le code postal soit invalide... <br> "
            . "Merci de saisir un code postal valide";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_candidate_2.php';
    }elseif(!validate_telephone($c_tel)){
        $message = "Oh ! Il semble que le numéro de téléphone soit invalide... <br> "
            . "Merci de saisir un numéro de téléphone valide";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_candidate_2.php';
    }else{
        $_SESSION['c_name'] = $c_name;
        $_SESSION['c_forename'] = $c_forename;
        $_SESSION['c_adress'] = $c_adress;
        $_SESSION['c_cp'] = $c_cp;
        $_SESSION['c_tel'] = $c_tel;
        $_SESSION['c_date'] = $c_date;
        include 'Views/v_candidate_3.php';
    }
    break;
case 'candidate3_validation':
    $c_school = filter_input(INPUT_POST, 'c_school', FILTER_SANITIZE_STRING);
    $c_professionnal = filter_input(INPUT_POST, 'c_professionnal', FILTER_SANITIZE_STRING);
    
    $_SESSION['c_school'] = $c_school;
    $_SESSION['c_professionnal'] = $c_professionnal;
    
    if ((isset($_FILES['c_documents']['tmp_name'])&&($_FILES['c_documents']['error'] == UPLOAD_ERR_OK))) {     
        $destination = 'Documents/Tmp/';
        move_uploaded_file($_FILES['c_documents']['tmp_name'], $destination.$_FILES['c_documents']['name']);
    }
    $_SESSION['c_documents'] = $destination.$_FILES['c_documents']['name'];

    include 'Views/v_candidate_4.php';
    break;
case 'candidate4_validation':
    if(!isset($_SESSION['c_email'])||!isset($_SESSION['c_choice'])||!isset($_SESSION['c_name'])
            ||!isset($_SESSION['c_forename'])||!isset($_SESSION['c_adress'])||!isset($_SESSION['c_cp'])
            ||!isset($_SESSION['c_tel'])||!isset($_SESSION['c_date'])){
        $message = "Oh ! Il semble que certaines informations aient été omises... <br> "
            . "Merci de renseigner tous les champs demandés";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_candidate_4.php';
    }elseif($database->is_candidate($_SESSION['c_email'])){
        $message = "Oh ! Il semble que vous ayez déjà fait une inscription avec cet email ! <br> "
            . "Merci de modifier ou abandonner...";
        $type = "warning col-md-10";
        include 'Views/v_notification.php';
        include 'Views/v_candidate_1.php';
    }else{
        $email = $_SESSION['c_email'];
        $name = $_SESSION['c_name'];
        $forename = $_SESSION['c_forename'];
        $adress = $_SESSION['c_adress'];
        $cp = $_SESSION['c_cp'];
        $date = $_SESSION['c_date'];
        $tel = $_SESSION['c_tel'];
        $docs = $_SESSION['c_documents'];
        $class = intval($_SESSION['c_choice']);
        $school = $_SESSION['c_school'];
        $professionnal = $_SESSION['c_professionnal'];
        $status = 1;
        $database-> add_candidacy($email, $name, $forename, $adress, $cp, 
            $date, $tel, $docs, $class, $school, $professionnal, $status);
        $class_name = $database->get_class_name($class);
        // preparation and sending of the confirmation email
        $object = "Confirmation d'inscription";
        $content = "<h1 class='h2 mb-3 fw-normal'>Confirmation</h1>
                <h3>Le service de <b>Euroforma</b> a bien reçu votre candidature.</h3>
                <h3>Il vous recontactera dans les plus brefs délais.</h3>
                <p>Pour rappel, votre demande concerne la filière: <b><u>".$class_name." </u></b></p>
                <p>voici les détails que vous venez de renseigner:<br>
                Email : ".$email."<br>
                Nom : ".$name."<br>
                Prénom : ".$forename."<br>
                Adresse : ".$adress."<br>
                Code postal : ".$cp."<br>
                Téléphone : ".$tel."<br>
                Date de naissance : ".$date."<br>
                Parcours scolaire : ".$school."<br>
                Parcours professionnel : ".$professionnal."<br>
                </p>";
        $recipient = $_SESSION['c_email'];
        send_email($object, $content, $recipient);
        
        disconnect();
        $message = "Votre inscription a bien été prise en compte ! <br>"
                . "Vous recevrez un mail de confirmation avec les détails de votre demande."
                . "<br>Celle-ci sera traitée dans les plus brefs délais et vous serez informés de son avancée par mail.";
        $type = "success";
        include 'Views/v_notification.php';
        header('Location: index.php');
    }
    break;
case 'leave' :
    disconnect();
    header('Location: index.php');
    break;
}