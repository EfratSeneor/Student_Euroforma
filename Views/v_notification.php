<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View notification
 */

$icons = array(
    'success' => 'fa-circle-check', 
    'info' => 'fa-circle-info', 
    'warning' => 'fa-triangle-exclamation', 
    'danger' => 'fa-circle-xmark'
    );
?>
<div class="text-center alert alert-simple alert-<?php echo $type ?> text-left show">
    <span>
        <i class="fa-solid <?php echo $icons[substr($type, 0, 7)] ?>"></i>
    </span>
    <?php echo $message ?>
</div>