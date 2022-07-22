<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View edit user
 */

?>

<div class="col-md-9">
    <h1>
        <i class="fa-solid fa-home-user"></i> Edit user informations
    </h1>
    <hr class="margin30">
    <div class="row">
        <div class="col-sm-6">
                <form enctype="multipart/form-data" method="POST" action="index.php?action=admin&todo=update_user">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" value="<?php echo $user_title; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input name="name" type="text" class="form-control" id="name" value="<?php echo $user_name; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="forename">Prénom</label>
                            <input name="forename" type="text" class="form-control" id="forename" value="<?php echo $user_forename; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="text" class="form-control" id="email" value="<?php echo $user_email; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="is_actif">Est actif</label>
                            <input name="is_actif" type="text" class="form-control" id="is_actif" value="<?php echo $user_is_actif; ?>"  required="">
                        </div>
                        <div class="form-group">
                            <label for="id_class">Classe</label>
                            <input name="id_class" type="text" class="form-control" id="class" value="<?php echo $user_class; ?>">
                        </div>
                        <input name="id_user_to_update" type="hidden" id="id_user_to_update" value="<?php echo $id_user_to_edit; ?>">
                        <div class="form-group text-center">
                            <input name="update_student" value="Editer" type="submit" class="btn btn-success rosef">
                        </div>
                 </form>
            </div>
        </div>