<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View email
 */
?>

<div class="l500 margin50 col-md-12">
    <div class="modal-dialog">
        <div class="font_gris modal-content rounded-4 shadow">
            <form method="post" action="index.php?action=password&todo=reinitialize">
                <div>
                    <br><p class="margin5 text_18">
                        Saisir votre nouveau mot de passe
                    </p><br>
                </div>
                <div class="max_l300 form-group">
                    <label for="password">Mot de passe</label>
                    <input name="password" type="text" class="form-control" value="" required="">
                </div>
                <div class="max_l300 form-group">
                    <label for="password2">Confirmation</label>
                    <input name="password2" type="text" class="form-control" value="" required="">
                    <input name="id" type="hidden" class="form-control" value="<?php echo $id ?>" required="">
                    <input name="token" type="hidden" class="form-control" value="<?php echo $token ?>" required="">
                </div>
                <div class="max_l200 modal-footer flex-column border-top-0">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>