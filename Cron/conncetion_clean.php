<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * Cron connection clean
 */

require_once 'Models/Pdo_euroforma.php';

$database = Pdo_euroforma::getBdEuroforma();

$database->clean_all_connections();