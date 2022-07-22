<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View admin home
 */

?>

<div class="col-md-9">
    <h1>
        <i class="fa-solid fa-home-user"></i> Accueil - <small><?php echo $forename.' '.$name?></small>
    </h1>
    <hr class="margin30">
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a href="index.php?action=admin&todo=users" class="margin5 btn btn-primary btn-lg px-4 gap-3">Gérer les utilisateurs</a>
        <a href="index.php" class="rose margin5 btn btn-primary btn-lg px-4 gap-3">Gérer les évènements</a>
        <a href="index.php" class="margin5 btn btn-primary btn-lg px-4 gap-3">Gérer les candidatures</a>
    </div>
    <hr class="margin30">
    <h3>
        <i class="fa-solid fa-dashboard"></i> Tableau de bord
    </h3>
    <div class="content">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-users fa-3x"></i>
                            </div>
                            <div class="col-sm-8">
                                <div class="float-sm-right">&nbsp;<span style="font-size: 30px">
                                        <?php echo $total_users ?>
                                    </span></div>
                                <div class="clearfix"></div>
                                <div class="float-sm-right">Total utilisateurs</div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item-primary list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-sm-8">
                                <p class="">Tous les utilisteurs</p>
                            </div>
                            <div class="col-sm-4">
                                <a href="index.php?action=admin&todo=users"><i class="fa fa-arrow-right float-sm-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-users fa-3x"></i>
                            </div>
                            <div class="col-sm-8">
                                <div class="float-sm-right">&nbsp;<span style="font-size: 30px">
                                     <?php echo $total_candidates ?>   
                                    </span></div>
                                <div class="clearfix"></div>
                                <div class="float-sm-right">Total candidatures</div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item-primary list-group-item list-group-item-action">
                        <a href="index.php?page=all-users">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p class="">Toutes les candidatures</p>
                                </div>
                                <div class="col-sm-4">
                                    <i class="fa fa-arrow-right float-sm-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="fa fa-utensils fa-3x"></i>
                            </div>
                            <div class="col-sm-8">
                                <div class="float-sm-right">&nbsp;<span style="font-size: 30px">
                                     <?php echo $total_meals_demain ?>   
                                    </span></div>
                                <div class="clearfix"></div>
                                <div class="float-sm-right">Total repas pour demain</div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item-primary list-group-item list-group-item-action">
                        <a href="index.php?action=admin&todo=candidates">
                            <div class="row">
                                <div class="col-sm-8">
                                    <p class="">Tous les évènements</p>
                                </div>
                                <div class="col-sm-4">
                                    <i class="fa fa-arrow-right float-sm-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<hr>