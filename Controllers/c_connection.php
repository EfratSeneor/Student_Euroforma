<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller connection
 */

$todo = filter_input(INPUT_GET, 'todo', FILTER_SANITIZE_STRING);
if (!$todo) {
    $todo = 'connection_request';
}

switch ($todo) {
case 'connection_request':
    include 'Views/v_connection.php';
    break;

case 'connection_confirmation':
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    // get user IP adress
    $user_ip = getIp();
    // checks number of connections with same login and from same ip adress 
    $connections = $database->get_count_connections($email, $user_ip);
    // get user information whose email was entered
    $user = $database->get_user_information($email);
    if($connections >3){
        $database->save_connection($email, $user_ip);
        $message = "Vous avez effectué plusieurs tentatives de connexion. <br> "
                . "Pour votre sécurité, le compte a été bloqué pour une durée de 24 heures.";
        $type = "warning";
        include 'Views/v_notification.php';
        include 'Views/v_connection.php';
    }
    // checks that a user has been found and that the password's crypt corresponds to that of this user
    elseif (!is_array($user) || !password_verify($password, $user["password"])) {
        // save this failed connection
        $database->save_connection($email, $user_ip);
        $message = "Login ou mot passe incorrect";
        $type = "danger";
        include 'Views/v_notification.php';
        include 'Views/v_connection.php';
    //Else = if a user has been found and the password's crypt corresponds to that of this user
    }else {
        $id = $user['id'];
        $title = $user['title'];
        $name = $user['name'];
        $forename = $user['forename'];
        $status = $user["is_admin"] ? "admin" : "student";
        connect($id, $title, $name, $forename, $status);
        $database->delete_connections($email, $user_ip);
        header('Location: index.php');
    }
    break;
    
default:
    include 'Views/v_connection.php';
    break;
}
