<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View student home
 */
?>

<div class="margin50 col-md-12">
    <h1>
        <small>Bonjour <?php echo $forename.' '.$name.' !'?></small>
    </h1>
    <hr class="margin30">
    <h3 class="margin20">
        <a href="index.php?action=student&m=<?php echo get_last_month($m) ?>"><i class="fa-solid fa-angle-left"></i></a>&nbsp&nbsp&nbsp&nbsp&nbsp;
        <i class="fa-solid fa-calendar-alt"></i> <?php echo $month_name." ".$year ?>&nbsp&nbsp&nbsp&nbsp&nbsp;
        <a href="index.php?action=student&m=<?php echo get_next_month($m) ?>"><i class="fa-solid fa-angle-right"></i></a>
    </h3>
    <div class="content">
        <div class="row">
            <?php echo $calendar ?>
        </div>
        <div>
            
        </div>
    </div>    
</div>
            