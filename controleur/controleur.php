<?php

include 'modele/modele.php';
    
    function liste_projets(){
        $projets = get_all_projets();


        require "vue/listeProjets.php";
    }

    function ajouter_projet($abrege, $nomProjet, $typeProjet) {
        // Appel de la fonction renommée dans le modèle
        insert_projet($abrege, $nomProjet, $typeProjet);
    
        // Recharge la liste des projets après l'ajout
        $projets = get_all_projets();
    
        // Affiche la liste des projets dans la vue
        require "vue/listeProjets.php";
    }

    function supprimer_projet($codeProjet){

        delete_projet_by_id($codeProjet);
        $projets = get_all_projets();
        require "vue/listeProjets.php";
    
    }
    
    //Fonction de controle de  connexion au Site
    function controleConnexion($login,$password){

        $connexion = connexionSite($login,$password);
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($login)){
            $tErreurs['login'] = "Champ vide";
        }
        if (empty($password)){
            $tErreurs['password'] = "Champ vide";
        }
        if(empty($tErreurs)) {
            if($connexion === false){
                $tErreurs['erreur'] = 'Utilisateur inconnu ou mot de passe incorrect';
                return $tErreurs;
            }
        } else 
        return $tErreurs;
    }

    

    function control_form_fields($abrege, $nomProjet, $typeProjet) {
        $tErreurs = []; // initialise le tableau d'erreurs
        if (empty($abrege)) {// je teste le champ prenom
            $tErreurs['abrege'] = "Il faut remplir le champ prenom.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $abrege)) {// perg_match expression reguliere
            $tErreurs['abrege'] = "Le champ abrege doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        if (empty( $nomProjet)) {
            $tErreurs['nomProjet'] = "Il faut remplir le champ nomProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $nomProjet)) {
            $tErreurs['nomProjet'] = "Le nomProjet doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        if (empty( $typeProjet)) {
            $tErreurs['typeProjet'] = "Il faut remplir le champ typeProjet.";
        } elseif (!preg_match("/^[a-zA-Z-]{2,}$/", $typeProjet)) {
            $tErreurs['typeProjet'] = "Le typeProjet doit comporter au moins 2 caractères alphabétiques sans chiffres.";
        }
        return $tErreurs; // elle me retourne un tableau d'erreurs qui fera un element de test dans mon routeur index.php
    }

    function liste_clients(){
        $clients = get_all_clients();
        require "vue/listeClients.php";
    }

    function supprimer_client($id){

        delete_client_by_id($id);
        $clients = get_all_clients();
        require "vue/listeClients.php";

    }

    function ajouter_client($raisonSociale,$CA,$effectifClient,$idSect){

        insert_client($raisonSociale,$CA,$effectifClient,$idSect);
        $clients = get_all_clients();
        require "vue/listeClients.php";
    }

    function control_form($raisonSociale, $CA, $effectifClient, $idSect) {
        $tErreurs = [];
    
        if (empty(trim($raisonSociale))) {
            $tErreurs["raisonSociale"] = "La raison sociale est obligatoire.";
        } elseif (raison_sociale_existe($raisonSociale)) {
            $tErreurs["raisonSociale"] = "Cette raison sociale existe déjà.";
        }
        if ($CA <= 0) {
            $tErreurs["CA"] = "Le CA doit être un nombre positif.";
        }
        if ($effectifClient <= 0) {
            $tErreurs["effectifClient"] = "L'effectif doit être un nombre positif.";
        }
        if ($idSect <= 0) {
            $tErreurs["idSect"] = "Le secteur d'activité est obligatoire.";
        }
    
        return $tErreurs;
    }

    function detailler_client($id){
        $client=get_details_client($id);
        require "vue/detailsClient.php";
    }


    function ajouter_nouvelle_activite($nouvelleActivite){
        insert_nouvelle_activite($nouvelleActivite);
    }

    // function accueil(){
    //    require 'vue/login.php';
    // }
        
?>











