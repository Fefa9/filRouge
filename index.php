<?php
require_once 'controleur/controleur.php';

try {
    if (!isset($_GET["action"])) {
        // Action par défaut : afficher la liste des clients
        liste_clients();
    } else {
        $action = $_GET["action"];
        switch ($action) {
            case "addC":
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (isset($_POST["raisonSociale"], $_POST["CA"], $_POST["effectifClient"], $_POST["idSect"])) {
                        $erreurs = control_form(
                            $_POST["raisonSociale"], 
                            $_POST["CA"], 
                            $_POST["effectifClient"], 
                            $_POST["idSect"]
                        );

                        if (empty($erreurs)) {
                            ajouter_client(
                                $_POST["raisonSociale"], 
                                (float) $_POST["CA"], 
                                (int) $_POST["effectifClient"], 
                                (int) $_POST["idSect"]
                            );
                            //header("Location: index.php");
                            exit();
                        } else {
                            require "vue/ajoutClient.php";
                        }
                    } else {
                        require "vue/ajoutClient.php";
                    }
                } else {
                    require "vue/ajoutClient.php";
                }
                break;

            case "supprC":
                if (isset($_GET["id"])) {
                    supprimer_client($_GET["id"]);
                    //require "vue/listeClients.php";
                    // exit();
                } else {
                    throw new Exception("Aucun identifiant client n'a été envoyé.");
                }
                break;

            case "detailC":
                if (isset($_GET['id'])) {
                    $client = get_details_client((int)$_GET['id']);
                    require "vue/detailsClient.php";
                } else {
                    throw new Exception("Aucun identifiant client n'a été envoyé pour afficher les détails.");
                }
                break;

            default:
                throw new Exception("Action inconnue : $action");
        }
    }
} catch (Exception $e) {
    // Gestion des erreurs
    $msgErreur = $e->getMessage();
    echo "<div style='color:red; font-weight:bold;'>Erreur : {$msgErreur}</div>";
}
?>