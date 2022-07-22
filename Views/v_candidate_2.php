<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View candidate step 2
 */

?>
<div class="container">
    <div class="row">
        <div class="form-check">
            <form method="post" action="index.php?action=candidate&todo=candidate2_validation" >
                <img class="mb-4" src="Images/logo.jpg" alt="" width="271" height="57">
                <h1 class="h2 mb-3 fw-normal">Candidature</h1>
                <h3 class="h4 mb-3 fw-normal">Etape 2/4</h3>
                <hr class="margin30">
                <p class="text_rose text_p">
                    Merci de renseigner toutes les informations demandées <br>
                    et valider avant de passer à l'étape suivante
                </p>
                <div class="col-md-10">
                    <label for="c_name" class="form-label">Nom</label>
                    <input type="text" class="form-control" name='c_name' placeholder="Dupont" required
                        value='<?php echo isset($_SESSION['c_name']) ? $_SESSION['c_name'] : ""?>'>
                </div>
                <div class="col-md-10">
                    <label for="c_forename" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name='c_forename' placeholder="Sarah"required
                        value='<?php echo isset($_SESSION['c_forename']) ? $_SESSION['c_forename'] : ""?>'>
                </div>
                <div class="col-md-10">
                    <label for="c_adress" class="form-label">Adresse</label>
                    <textarea type="text" class="form-control" name="c_adress" placeholder="" required>
                        <?php echo isset($_SESSION['c_adress']) ? $_SESSION['c_adress'] : ""?></textarea>
                </div>
                <div class="col-md-10">
                    <label for="c_cp" class="form-label">Code postal</label>
                    <input type="text" class="form-control" name="c_cp" placeholder="" required
                        value='<?php echo isset($_SESSION['c_cp']) ? $_SESSION['c_cp'] : ""?>'>
                </div> 
                <div class="col-md-10">
                    <label for="c_tel" class="form-label">Numéro de téléphone</label>
                    <input type="text" class="form-control" name="c_tel" placeholder="0652099935" required
                        value='<?php echo isset($_SESSION['c_tel']) ? $_SESSION['c_tel'] : ""?>'>
                </div>
                <div class="col-md-10">
                    <label for="c_date" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" name="c_date" placeholder="" required
                        value='<?php echo isset($_SESSION['c_date']) ? $_SESSION['c_date'] : ""?>'>
                </div>
                <hr class="margin20">
                <div class="col-md-6">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
                </div>
                <div class='margin20'>
                    <a href="index.php?action=candidate&todo=leave"><i class="fa-solid fa-trash-arrow-up fa-xl"></i>&nbsp;&nbsp;Quitter et supprimer toutes les données renseignées</a>
                </div>
            </form>
            <a href="index.php?action=candidate&todo=candidate1"><i class="fa-solid fa-angle-left fa-xl"></i>&nbsp;&nbsp;Etape précédente</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?action=candidate&todo=candidate3">Etape suivante&nbsp;&nbsp;<i class="fa-solid fa-angle-right fa-xl"></i></a>
            <div class="margin100"><?php // var_dump($_SESSION) ?></div>
        </div>
    </div>
</div>
