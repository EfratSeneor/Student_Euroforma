<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View header
 */

?>
        <?php
        $uc = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if ($is_admin_connceted) {
            ?>
            <div class="border_bottom header-area header-absoulate">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo">
                                <a href="index.php">
                                    <i class="fa-solid fa-home fa-2x"></i>
                                    <img class="mb-4" src="Images/logo.jpg" alt="image_logo" width="180" height="38">
                                </a>
                            </div>
                        </div>

<!--                        <div class="col-md-7">
                            <div class="text_fonce main-menu">
                                <ul>
                                    <li><a class="text_fonce" href="">Accueil</a></li>
                                    <li><a class="text_fonce" href="">admission</a></li>
                                    <li><a class="text_fonce" href="">students</a></li>
                                    <li><a class="text_fonce" href="">contact us</a></li>
                                </ul>
                            </div>
                        </div>-->
                        <div class="col-md-1 text-right">
                            <span class="social-icon">
                                <a href="index.php?action=logout"><i class="fa fa-sign-out-alt fa-2x"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <br>

        <?php
        } elseif ($is_student_connceted) {
            ?>
        <div class="border_bottom header-area header-absoulate">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="logo">
                                <a href="index.php">
                                    <i class="fa-solid fa-home fa-2x"></i>
                                    <img class="mb-4" src="Images/logo.jpg" alt="image_logo" width="180" height="38">
                                </a>
                            </div>
                        </div>

                        <div class="col-md-1 text-right">
                            <span class="social-icon">
                                <a href="index.php?action=logout"><i class="color_rosef fa fa-sign-out-alt fa-2x"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <br>
        <?php
        }
        else {
            ?> 
        <?php } 
        ?>