<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * data_connection
 */

if ($_SERVER['SERVER_NAME']== "etudiant.euroforma.fr"){
    define('SERVERNAME', "db5006867321.hosting-data.io");
    define('USERNAME', "dbu2492668");
    define('DBNAME', "dbs5669984");
    define('PASSWORD', "SQL4euroforma!");
}else{
    define('SERVERNAME', "localhost");
    define('USERNAME', "local_user");
    define('DBNAME', "student_euroforma");
    define('PASSWORD', "Wm.-Jc9h(h6zZFbo");
}