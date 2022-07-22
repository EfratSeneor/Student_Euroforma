<?php

/* 
 * Project student_euroforma
 * Author : Efrat SENEOR
 * View connection
 */

?>

<div class="form-signin w-100 m-auto">
    <form method="post" action="index.php?action=connection&todo=connection_confirmation" >
    <img class="mb-4" src="Images/logo.jpg" alt="" width="271" height="57">
    <h1 class="h3 mb-3 fw-normal">Se connecter</h1>
    <hr class="margin30">
    <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Adresse email" required="">
    </div>
    <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required="">
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
    <a href="index.php?action=password&todo=request">Mot de passe oublié ?</a><br>
    <hr>
    <a class="text_18" href="index.php?action=candidate">Déposer une candidature</a>
</div>