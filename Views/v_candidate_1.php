<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View candidate step 1
 */

?>

<div class="container">
    <div class="row">
        <div class="form-check">
            <form method="post" action="index.php?action=candidate&todo=candidate1_validation" >
                <img class="mb-4" src="Images/logo.jpg" alt="" width="271" height="57">
                <h1 class="h2 mb-3 fw-normal">Candidature</h1>
                <h3 class="h4 mb-3 fw-normal">Etape 1/4</h3>
                <hr class="margin30">
                <p class="text_rose text_p">
                    Merci de renseigner toutes les informations demandées <br>
                    et valider avant de passer à l'étape suivante
                </p>
                <div class="col-md-10">
                    <label for="c_email" class="form-label">Adresse Email</label>
                    <input type="text" class="form-control" name="c_email" placeholder="sarahdupont@gmail.com" required 
                           value='<?php echo isset($_SESSION['c_email']) ? $_SESSION['c_email'] : ""?>'>
                </div>
                <div class="col-md-10">
                    <label for="country" class="form-label">Filière</label>
                    <select class="form-control" name="c_choice" required>
                        <option value="" disabled selected>Choisir...</option>
                        <optgroup label="Informatique">
                            <option value="1" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==1 ? "selected" : ""?>>BTS Informatique 1ère année</option>
                            <option value="2" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==2 ? "selected" : ""?>>BTS Informatique 2ème année</option>
                            <option value="6" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==6 ? "selected" : ""?>>TP Concepteur développeur d'applications</option>
                        </optgroup>
                        <optgroup label="Comptabilité">
                            <option value="4" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==4 ? "selected" : ""?>>BTS Comptabilité Gestion 1ére année</option>
                            <option value="3" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==3 ? "selected" : ""?>>BTS Comptabilité Gestion 2ème année</option>
                        </optgroup>
                        <optgroup label="Petite enfance">
                            <option value="5" <?php echo isset($_SESSION['c_choice'])&& $_SESSION['c_choice']==5 ? "selected" : ""?>>CAP petite enfance</option>
                        </optgroup>
                    </select>
                </div>
                <hr class="margin20">
                <div class="col-md-4">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
                </div>
                <div class='margin20'>
                    <a href="index.php?action=candidate&todo=leave"><i class="fa-solid fa-trash-arrow-up fa-xl"></i>&nbsp;&nbsp;Quitter et supprimer toutes les données renseignées</a>
                </div>
            </form>
            <a href="index.php?action=candidate&todo=candidate1"><i class="fa-solid fa-angle-left fa-xl"></i>&nbsp;&nbsp;Etape précédente</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?action=candidate&todo=candidate2">Etape suivante&nbsp;&nbsp;<i class="fa-solid fa-angle-right fa-xl"></i></a>
            <div class="margin100"></div>
        </div>
    </div>
</div>