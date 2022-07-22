<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View email
 */
?>

<div class="margin50 col-md-12">
    <div class="modal-dialog">
        <div class="font_gris modal-content rounded-4 shadow">
            <form method="post" action="index.php?action=password&todo=send_email">
                <div>
                    <br><p class="margin5 text_18">
                        Merci de saisir votre adresse email.
                        Vous recevrez un lien de réinitialisation de mot de passe.
                    </p><br>
                </div>
                <div class="max_l300 form-group">
                    <label for="email">Email</label>
                    <input name="email" type="text" class="form-control" id="title" value="" required="">
                </div>
                <div class="max_l200 modal-footer flex-column border-top-0">
                    <button type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>