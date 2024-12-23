<?php
$title = "Ajouter un client";
ob_start();
?>

    <!-- Formulaire stylé avec Bootstrap -->
    <div class="container mt-4">


        <!-- Formulaire avec une largeur de 50% -->
        <form action="index.php?action=addC" method="POST" id="monform" class="needs-validation">
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
                        <select name="idSect" id="idSect" class="form-control <?php if (!empty($erreurs["idSect"])) echo 'is-invalid'; ?>">
                            <option value="">Choix de l'activité</option>
                            <?php foreach($activites as $activite):?>
                                <option value="<?= $activite['idSect']?>"
                                <?php echo (!empty($_POST['idSect']) && $_POST['idSect'] == $activite['idSect']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($activite['activite']) ?>
                                </option>
                            <?php endforeach; ?>    
                        </select>
                        <?php if (!empty($erreurs["idSect"])): ?>
                            <div class="invalid-feedback">
                                <?= $erreurs["idSect"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>
<!-- Input pour ajouter une nouvelle activité -->
                        <div class="mt-3">
                            <label for="nouvelleActivite" class="form-label">Nouvelle activité</label>
                            <input type="text" name="nouvelleActivite" id="nouvelleActivite" class="form-control"
                                value="<?php echo !empty($_POST['nouvelleActivite']) ? htmlspecialchars($_POST['nouvelleActivite']) : ''; ?>"
                                placeholder="Ajouter une nouvelle activité">
                        </div>
                    


                   
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <a href="index.php" class="btn btn-secondary">Annuler</a>
                    </div>
                </div>
            </div>
        </form>
    </div>


    


<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>