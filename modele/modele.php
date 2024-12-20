<?php

    require("connect.php");

    // Connexion à la BDD
    function connect_db() {
        $dsn = "mysql:dbname=" . BASE . ";host=" . SERVER;
        try {
            $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
            $connexion = new PDO($dsn, USER, PASSWD, $option);
            //echo "Connexion réussie";  // Message de confirmation
        } catch (PDOException $e) {
            printf("Echec connexion : %s\n", $e->getMessage());
            exit();
        }
        return $connexion;
    }

    // Fonction connexion au site (cherche si l'utilisateur existe)
    function connexionSite($login,$password){
        $connexion = connect_db();
        $sql = "SELECT passUser  FROM `users` WHERE loginUser = :login";
        $reponse =$connexion->prepare($sql);
        $reponse->bindParam(':login',$login,PDO::PARAM_STR);
        $reponse->execute();
        $resultat = $reponse->fetch(PDO::FETCH_ASSOC);
        if ($resultat !== null && $resultat != '')  {
            $hash = password_hash($resultat['passUser'],PASSWORD_DEFAULT);
            return password_verify($password,$hash);
        } else return false;
    }
    
        
    

    

    // Création de la liste des Stagiaires
    function get_all_projets(){

        $connexion = connect_db();
        $projets = array();
        $sql = "SELECT * from projets";

        foreach ($connexion->query($sql) as $row) {
            $projets[] = $row;
        }
        return $projets;
    }

    function get_projet_by_id($codeProjet)
{

    $connexion = connect_db();
    $sql = "SELECT * from projets WHERE codeProjet = :codeProjet";
    $reponse = $connexion->prepare($sql);
    $reponse->bindParam(':id', $codeProjet, PDO::PARAM_INT);
    $reponse->execute();
    return $reponse->fetch();
}

    function delete_projet_by_id($codeProjet)
    {
        $connexion = connect_db();
        $sql = " DELETE FROM projets WHERE codeProjet = :codeProjet ";
        $reponse = $connexion->prepare($sql);
        $reponse->bindValue(":codeProjet", intval($codeProjet), PDO::PARAM_INT);
        $reponse->execute();
    }

    function insert_projet($abrege, $nomProjet, $typeProjet) {
        $connexion = connect_db();
        $sql = "INSERT INTO projets(abrege, nomProjet, typeProjet) VALUES (:abrege, :nomProjet, :typeProjet)";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':abrege', $abrege);
        $reponse->bindParam(':nomProjet', $nomProjet);
        $reponse->bindParam(':typeProjet', $typeProjet);
        $reponse->execute();
    }
    



      // Création de la liste des clients
      
      function get_all_clients(){

    $connexion = connect_db();
    $clients = array();
    $sql = "SELECT clients.idClient, clients.raisonSociale, clients.CA, clients.effectifClient, secteursActivite.activite 
            FROM clients 
            INNER JOIN secteursActivite ON clients.idSect = secteursActivite.idSect";

    foreach ($connexion->query($sql) as $row) {
        $clients[] = $row;
    }
    return $clients;
    }
    // Suppression d'un client par id
    
    function delete_client_by_id($id){
        $connexion = connect_db();

        $sql = " DELETE FROM clients WHERE idClient = :id ";
        $reponse = $connexion->prepare($sql);
        $reponse->bindValue(":id", $id, PDO::PARAM_INT);
        $reponse->execute();
    }
    // ajouter un client
    function insert_client($raisonSociale,$CA,$effectifClient,$idSect){
        $connexion = connect_db();
        $sql = "INSERT INTO clients(raisonSociale,CA,effectifClient,idSect) VALUES (:raisonSociale,:CA,:effectifClient,:idSect)";
        $reponse = $connexion->prepare($sql);
        $reponse->bindParam(':raisonSociale',$raisonSociale);
        $reponse->bindParam(':CA',$CA);
        $reponse->bindParam(':effectifClient',$effectifClient);
        $reponse->bindParam(':idSect',$idSect);
        $reponse->execute();
    }
    // detailler un client
    function  get_details_client($id){
        $connexion= connect_db();
        $sql="SELECT * FROM clients c  LEFT JOIN contacts co ON c.idClient=co.idClient
         INNER JOIN fonctions f ON f.idFonc =co.idFonc WHERE c.idClient=:id";
        $reponse=$connexion->prepare($sql);
        $reponse->bindParam(':id', $id, PDO::PARAM_INT);
        $reponse->execute();
        return $reponse->fetch(PDO::FETCH_ASSOC);
    }

?>