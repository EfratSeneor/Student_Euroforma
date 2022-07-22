<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View candidate step 3
 */

?>
<div class="container">
    <div class="row">
        <div class="form-check">
            <form method="post" action="index.php?action=candidate&todo=candidate4_validation" enctype="multipart/form-data">
                <img class="mb-4" src="Images/logo.jpg" alt="" width= "271" height="57">
                <h1 class="h2 mb-3 fw-normal">Candidature</h1>
                <h3 class="h4 mb-3 fw-normal">Etape 4/4</h3>
                <hr class="margin30">
                <p class="text_rose text_p">
                    Merci de vérifier l'exactitude des renseignements <br>
                    avant de valider l'inscription.<br>
                    <u class='text_18 text_rouge'>Toute inscription validée ne pourra plus être modifiée.</u>
                </p>
                <div class="col-md-10">
                    <p>Email : <span class='text_rose'><?php echo isset($_SESSION['c_email']) ? $_SESSION['c_email'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Nom : <span class='text_rose'><?php echo isset($_SESSION['c_name']) ? $_SESSION['c_name'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Prénom : <span class='text_rose'><?php echo isset($_SESSION['c_forename']) ? $_SESSION['c_forename'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Adresse : <span class='text_rose'><?php echo isset($_SESSION['c_adress']) ? $_SESSION['c_adress'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Code postal : <span class='text_rose'><?php echo isset($_SESSION['c_cp']) ? $_SESSION['c_cp'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Téléphone : <span class='text_rose'><?php echo isset($_SESSION['c_tel']) ? $_SESSION['c_tel'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Date de naissance : <span class='text_rose'><?php echo isset($_SESSION['c_date']) ? $_SESSION['c_date'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Parcours scolaire : <span class='text_rose'><?php echo isset($_SESSION['c_school']) ? $_SESSION['c_school'] : ""?> </span></p>
                </div>
                <div class="col-md-10">
                    <p>Parcours professionnel : <span class='text_rose'><?php echo isset($_SESSION['c_professionnal']) ? $_SESSION['c_professionnal'] : ""?> </span></p>
                </div>
                <div class="centrer col-md-10">
                        <p class="text_13 form-label">En soumettant ce formulaire, j'accepte que les<br>
                        informations saisies soient exploitées dans le
                        cadre de ma demande d'inscription.</p>
                        <input type="checkbox" class="form-control" name='c_terms' required value='1'>
                </div>
                <hr class="margin20">
                <div class="col-md-6">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
                </div>
                <div class='margin20'>
                    <a href="index.php?action=candidate&todo=leave"><i class="fa-solid fa-trash-arrow-up fa-xl"></i>&nbsp;&nbsp;Quitter et supprimer toutes les données renseignées</a>
                </div>
            </form>
            <a href="index.php?action=candidate&todo=candidate3"><i class="fa-solid fa-angle-left fa-xl"></i>&nbsp;&nbsp;Etape précédente</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?action=candidate&todo=candidate4">Etape suivante&nbsp;&nbsp;<i class="fa-solid fa-angle-right fa-xl"></i></a>
            <div class="margin30"></div>
            <p class="text_13 form-label">
                Pour connaitre et exercer vos droits, notamment de retrait <br>
                de votre consentement à l'utilisation des données collectées <br>
                par ce formulaire, veuillez consulter notre <a href="Documents/legal_notices.pdf">politique<br>
                de confidentialité.</a>
            </p>
        </div>
    </div>
</div>
