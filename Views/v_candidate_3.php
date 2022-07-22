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
            <form method="post" action="index.php?action=candidate&todo=candidate3_validation" enctype="multipart/form-data">
                <img class="mb-4" src="Images/logo.jpg" alt="" width= "271" height="57">
                <h1 class="h2 mb-3 fw-normal">Candidature</h1>
                <h3 class="h4 mb-3 fw-normal">Etape 3/4</h3>
                <hr class="margin30">
                <p class="text_rose text_p">
                    Merci de renseigner toutes les informations demandées <br>
                    et valider avant de passer à l'étape suivante
                </p>
                <div class="col-md-10">
                    <label for="c_school" class="form-label">Parcours scolaire (établissements, diplômes, années)</label>
                    <textarea type="text" class="form-control" name="c_school" placeholder="Lycée privé / Bac STMG / 2019"required>
                        <?php echo isset($_SESSION['c_school']) ? $_SESSION['c_school'] : ""?>
                    </textarea>
                </div>
                <div class="col-md-10">
                    <label for="c_professionnal" class="form-label">Parcours professionnel (Durées, dates, entreprises, missions)</label>
                    <textarea maxlength="1000"  type="text" class="form-control" name="c_professionnal" placeholder="Stage... / janvier-juin 2021" required>
                        <?php echo isset($_SESSION['c_professionnal']) ? $_SESSION['c_professionnal'] : ""?>
                    </textarea>
                </div>
                <div class="col-md-10">
                    <label for="c_documents" class="form-label">Veuillez joindre en un seul document PDF: <br>
                        - CV<br>- Copie de pièce d'identité <br>- Copie du diplôme du baccalauréat<br>
                        - Photocopie du relevé de notes du baccalauréat
                    </label>
                    <input type="file" class="form-control" accept=".pdf" name="c_documents" required>
                </div>
                <hr class="margin20">
                <div class="col-md-6">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
                </div>
                <div class='margin20'>
                    <a href="index.php?action=candidate&todo=leave"><i class="fa-solid fa-trash-arrow-up fa-xl"></i>&nbsp;&nbsp;Quitter et supprimer toutes les données renseignées</a>
                </div>
            </form>
            <a href="index.php?action=candidate&todo=candidate2"><i class="fa-solid fa-angle-left fa-xl"></i>&nbsp;&nbsp;Etape précédente</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="index.php?action=candidate&todo=candidate4">Etape suivante&nbsp;&nbsp;<i class="fa-solid fa-angle-right fa-xl"></i></a>
            <div class="margin100"></div>
        </div>
    </div>
</div>
