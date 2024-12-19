<?php
require_once 'controleur/controleur.php';

try {
    if (!isset($_GET["action"])) {
        // Action par défaut
        liste_clients(); // Fonction à définir pour afficher la liste des clients
    } else {
        // Vérification de l'action demandée
        if ($_GET["action"] == "add") {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // Vérifie si tous les champs nécessaires sont fournis
                if (isset($_POST["raisonSociale"]) && isset($_POST["CA"]) && isset($_POST["effectifClient"]) && isset($_POST["idSect"])) {
                    // Validation des champs
                    $erreurs = control_form($_POST["raisonSociale"], $_POST["CA"], $_POST["effectifClient"], $_POST["idSect"]);

                    if (empty($erreurs)) {
                        // Ajouter le client s'il n'y a pas d'erreurs
                        ajouter_client(
                            $_POST["raisonSociale"], 
                            (float) $_POST["CA"], 
                            (int) $_POST["effectifClient"], 
                            (int) $_POST["idSect"]
                        );

                        // Afficher la liste des clients après ajout
                        //liste_clients();
                    } else {
                        // Affiche le formulaire avec les erreurs
                        require "vue/ajoutClient.php";
                    }
                } else {
                    // Affiche le formulaire si des champs sont manquants
                    require "vue/ajoutClient.php";
                }
            } else {
                // Affiche le formulaire d'ajout si aucune requête POST n'est reçue
                require "vue/ajoutClient.php";
            }
        } elseif ($_GET["action"] == "suppr") {
            if (isset($_GET["idClient"])) {
                // Supprimer un client
                supprimer_client((int)$_GET["idClient"]);
                //liste_clients(); // Recharge la liste après suppression
            } else {
                throw new Exception("<span style='color:red'>Aucun identifiant client n'a été envoyé</span>");
            }
        } else {
            // Si l'action est inconnue, lève une exception
            throw new Exception("<h1>Action inconnue : {$_GET['action']}</h1>");
        }
    }
} catch (Exception $e) {
    // Gestion des erreurs
    $msgErreur = $e->getMessage();
    echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
}
?>
