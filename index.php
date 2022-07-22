<?php 

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * index
 */

require_once 'Models/Pdo_euroforma.php';
require_once 'Includes/functions.php';
require_once 'Includes/validation.php';
session_start();
$database = Pdo_euroforma::getBdEuroforma();

$is_connceted = is_connected();
$is_student_connceted = is_student_connected();
$is_admin_connceted = is_admin_connected();

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if($action == 'password'){
    $action = 'password';
}elseif (!$is_connceted && ($action !="candidate")) {
    $action = 'connection';
} elseif (!$action) {
    $action = 'home';
}

include 'Views/v_head.php';
switch ($action) {
case 'connection':
    include 'Controllers/c_connection.php';
    break;
case 'logout':
    include 'Controllers/c_logout.php';
    break;
case 'home':
    if ($is_admin_connceted) {
        include 'Controllers/c_admin.php';
    } else if ($is_student_connceted) {
        include 'Controllers/c_student.php';
    } else {
        include 'Controllers/c_connection.php';
    }
    break;
case 'admin':
    include 'Controllers/c_admin.php';
    break;
case 'student':
    include 'Controllers/c_student.php';
    break;
case 'candidate':
    include 'Controllers/c_candidate.php';
    break;
case 'password':
    include 'Controllers/c_password.php';
    break;
default:
    include 'Controllers/c_connection.php';
}

require 'Views/v_footer.php';
