<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View admin navigation
 */

?>

<div class="margin50 container" style="width: 1024px;">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="index.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-tachometer-alt"></i> Accueil
                </a>
                <a href="index.php?action=admin&todo=users" class="list-group-item list-group-item-action"><i
                        class="fa fa-user-plus"></i> Utilisateurs</a>
                <a href="index.php?action=admin&todo=events" class="list-group-item list-group-item-action"><i
                        class="fa fa-users"></i> Présences & Repas</a>
                <a href="index.php?action=admin&todo=candidates" class="list-group-item list-group-item-action"><i
                        class="fa fa-user"></i> Candidatures</a>
            </div>
        </div>