<?php
$title = "Liste des Clients";
ob_start();
?>

<!-- <h1>Liste des clients</h1> -->

<div class="container col-lg-8 w-75">
  <table class="table ">
    <thead>
      <tr class="table-primary">
        <th>Identifiant</th>
        <th>Raison sociale</th>
        <th>CA</th>
        <th>Effectif</th>
        <th>Activité</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php
            foreach($clients as $client){
                echo "<tr >";
                echo "<td class='colid'> $client[idClient] </td>";
                echo "<td class='colid'><a href=index.php?action=detailC&id=$client[idClient]> $client[raisonSociale]</td>";
                echo "<td> $client[CA] </td>";
                echo "<td> $client[effectifClient] </td>";
                echo "<td> $client[activite] </td>";
                echo "<td class='colsuppr'><a href=index.php?action=supprC&id=$client[idClient] class='text-danger'>Supprimer</a></td>";
                echo "</tr>";
            }

        ?>
         <tr>    
            <td colspan="6" class="ajout" style="text-align:center">
                <a href="index.php?action=addC" >Ajouter un client</a>
            </td> 
        </tr>   
    </tbody>
  </table>
</div>

    
  
<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>