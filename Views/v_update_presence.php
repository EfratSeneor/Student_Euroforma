<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View update presence
 */
?>

<div class="margin50 col-md-12">
    <div class="modal-dialog">
        <div class="font_gris modal-content rounded-4 shadow">
            <div class="modal-header border-bottom-0">
                <h3 class="texte_rose modal-title"><b><?php echo date('d/m/Y', strtotime($date)); ?></b></h3>
                <div class="col-md-12 text-right"><a href="index.php"><i class="fa-solid fa-xmark text_22 text_noir"></i></a></div>
            </div>
            <div class="modal-body py-0">
                
            </div>
            <form method="post" action="index.php?action=student&todo=update_presence">
                <p class="margin5 text_18">
                    Confirmez-vous votre présence au centre de formation pour le <?php echo date('d M Y', strtotime($date)) ?> ?
                </p><br>
                <div class="max_h40 margin5">
                    <input type="radio" id="oui" name="presence" value="1" checked>
                    <label for="oui">OUI, je serai présente.</label>
                </div>
                <div  class="max_h10 margin5">
                    <input type="radio" id="non" name="presence" value="0">
                    <label for="non">NON, je ne serai pas présente.</label>
                </div>
                <input type="hidden" id="date" name="date" value="<?php echo $date ?>">
                <div class="modal-footer flex-column border-top-0">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>