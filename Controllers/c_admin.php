<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller admin
 */

$is_admin_connceted = is_admin_connected();

$todo = filter_input(INPUT_GET, 'todo', FILTER_SANITIZE_STRING);
if (!$is_admin_connceted) {
    header('Location: index.php');
}elseif(!$todo) {
    $todo = 'home';
}

require 'Views/v_header.php';

$name = $_SESSION['name'];
$forename = $_SESSION['forename'];

include 'Views/v_admin_nav.php';

switch ($todo) {
case 'home':
    $total_users = $database->get_total_users();
    $demain = date('Y-m-d', strtotime('+1 day'));
    $total_meals_demain = $database->get_total_meals_demain($demain);
    $total_candidates = $database->get_total_candidates();
    include 'Views/v_admin_home.php';
    break;
case 'users':
    $users = $database->get_all_users();
    include 'Views/v_users.php';
    break;
case 'edit_user':
    $id_user_to_edit=$_GET['id'];
    $user_to_edit = $database->get_user($id_user_to_edit);
    $user_title = $user_to_edit['title'];
    $user_name = $user_to_edit['name'];
    $user_forename = $user_to_edit['forename'];
    $user_email = $user_to_edit['email'];
    $user_is_actif = $user_to_edit['is_actif'];
    $user_id_class = $user_to_edit['id_class'];
    $user_class = $database->get_class($user_id_class);
    include 'Views/v_edit_user.php';
    break;
case 'update_user':
    $user_id = filter_input(INPUT_POST, 'id_user_to_update', FILTER_SANITIZE_STRING);
    $user_title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $user_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $user_forename = filter_input(INPUT_POST, 'forename', FILTER_SANITIZE_STRING);
    $user_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $database->update_user($user_id, $user_title, $user_name, $user_forename, $user_email);
    header('Location: index.php');
    break;
}

?>
</div>  
</div>
