<?php
$title = "Ajouter un client";
ob_start();
?>

    <!-- Formulaire stylé avec Bootstrap -->
    <div class="container mt-4">
        <h2 class="text-center mb-4">Veuillez remplir les champs</h2>


        <!-- Formulaire avec une largeur de 50% -->
        <form action="index.php?action=add" method="POST" id="monform" class="needs-validation">
            <div class="row justify-content-center">
                <div class="col-md-6"> <!-- Définit la largeur à 50% (col-md-6) de ma page -->
                    
                



<!-- Champ pour raisonSociale -->
                    <div class="mb-3">
                        <label for="raisonSociale " class="form-label">Raison sociale</label>
                        <input type="text" class="form-control <?php if (!empty($erreurs["raisonSociale"])) echo 'is-invalid'; ?>" 
                            name="raisonSociale" id="raisonSociale" 
                            value="<?php echo !empty($_POST["raisonSociale"]) ? ($_POST["raisonSociale"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["raisonSociale"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["raisonSociale"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Champ pour CA -->
                    <div class="mb-3">
                        <label for="CA" class="form-label">CA</label>
                        <input type="number" class="form-control <?php if (!empty($erreurs["CA"])) echo 'is-invalid'; ?>" 
                            name="CA" id="CA" 
                            value="<?php echo !empty($_POST["CA"]) ? ($_POST["CA"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["CA"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["CA"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Champ pour effectifClient -->
                    <div class="mb-3">
                        <label for="effectifClient" class="form-label">Effectif</label>
                        <input type="number" class="form-control <?php if (!empty($erreurs["effectifClient"])) echo 'is-invalid'; ?>" 
                            name="effectifClient" id="effectifClient" 
                            value="<?php echo !empty($_POST["effectifClient"]) ? ($_POST["effectifClient"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["effectifClient"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["effectifClient"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>

<!-- Champ pour idSect -->
                    <div class="mb-3">
                        <label for="idSect " class="form-label">Activité</label>
                        <input type="number" class="form-control <?php if (!empty($erreurs["idSect"])) echo 'is-invalid'; ?>" 
                            name="idSect" id="idSect" 
                            value="<?php echo !empty($_POST["idSect"]) ? ($_POST["idSect"]) : ''; ?>" 
                            autocomplete="off">
                        <?php if (!empty($erreurs["idSect"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["idSect"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <!-- Boutons d'action -->
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    


<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>