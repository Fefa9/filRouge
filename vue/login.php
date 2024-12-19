<?php
$title = "Connexion";
ob_start();
?>
<form action="../index.php?action=login" method="POST" class="mt-3" >
    <br>
    <!-- Login input -->
    <div data-mdb-input-init class="form-outline mt-3">
        <label class="form-label" for="form2Example1">Login</label>
        <input type="text" name='login' id="login" class="form-control"> 
        <span class="erreur text-danger"><?php if (!empty($erreur["login"])) {echo $erreur["login"];} ?></span>
    </span>
    </div>

    <!-- Password input -->
    <div data-mdb-input-init class="form-outline  mt-3">
        <label class="form-label" for="form2Example2">Password</label>
        <input type="password" name='password' id="password" class="form-control"> 
        <span class="erreur text-danger "><?php if (!empty($erreur["password"])) {echo $erreur["password"];} ?> </span>
    </div>
    <div>
    <span class="erreur text-danger"><?php if (!empty($erreur["erreur"])) {echo $erreur["erreur"];} ?></span>
    </div>
    <!-- Submit button -->
    <div class="mb-4 mt-3">
    <input class="btn btn-primary btn-block" type="submit" id="submit" value="Connexion">
    <input class="btn btn-primary btn-block" type="reset" id="reset" value="Annuler">
    </div>
    <!-- Register buttons -->
    <div class="text-center">
        <p><a href="#!">Inscription</a></p>
    </div>
</form>
<?php
    $content = ob_get_clean();
    include "baselayout.php";