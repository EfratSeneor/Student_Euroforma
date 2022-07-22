<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller student
 */

$is_student_connceted = is_student_connected();

$todo = filter_input(INPUT_GET, 'todo', FILTER_SANITIZE_STRING);
if (!$is_student_connceted) {
    header('Location: index.php');
}elseif(!$todo) {
    $todo = 'home';
}

require 'Views/v_header.php';

$m = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
if (!$m) {
    $m = date("Y-m");
}

//$month = explode('-', $m)[0];
// $year = explode('-', $m)[1];
$month = date("m", strtotime($m));
$year = date("Y", strtotime($m));

$id_user = $_SESSION['id'];
$name = $_SESSION['name'];
$forename = $_SESSION['forename'];

switch ($todo) {
case 'home':
    $month_name = date("F", mktime(0, 0, 0, $month, 10));
    $events = $database->get_events($id_user, $month, $year);
    $calendar = $database->build_calendar($month, $year, $events);
    include 'Views/v_student_home.php';
    break;
case 'edit_event':
    $date = filter_input(INPUT_GET, 'date', FILTER_SANITIZE_STRING);
    $today = date("Y-m-d");
    $date_time = strtotime($date);
    $today_time = strtotime($today);
    if ($date_time <= $today_time) {
        include 'Views/v_update_meal.php';
    }else{
        include 'Views/v_update_presence.php';
    }
    break;
case 'update_presence':
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $presence = filter_input(INPUT_POST, 'presence', FILTER_SANITIZE_STRING);
    if($database->is_event($id_user, $date)){
        $database->update_event($id_user, $date, $presence, 0);  
    }else{
        $database->add_event($id_user, $date, $presence, 0);  
    }
    header("Location: index.php?action=student"); 
    break;
case 'update_meal':
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $meal = filter_input(INPUT_POST, 'meal', FILTER_SANITIZE_STRING);
    if($database->is_event($id_user, $date)){
        $database->update_event($id_user, $date, 1, $meal);  
    }else{
        $database->add_event($id_user, $date, 1, $meal);  
    }
    header("Location: index.php?action=student"); 
    break;
}