<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Controller logout
 */

 
disconnect();
$message = "Vous avez bien été déconnecté !";
$type = "success";

include 'Views/v_notification.php';
include 'Views/v_connection.php';
