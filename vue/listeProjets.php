<?php
$title = "";
ob_start();
//session_start();
?>
<br><br>
<h2>Liste des Projets ABI</h2>
<br>
<div class="table-container">
<table>
    <tr>
        <th>code Projet</th>
        <th>abregeProjet</th>
        <th>nom Projet</th>
        <th>type Projet</th>
        <th>action</th>
    </tr>
    <?php
   
   foreach ($projets as $projet) {
    echo "<tr>";
    echo "<td>{$projet['codeProjet']}</td>";
    echo "<td>{$projet['abrege']}</td>"; 
    echo "<td>{$projet['nomProjet']}</td>";
    echo "<td>{$projet['typeProjet']}</td>";
    
    echo "<td class='colsuppr'><a href=index.php?action=suppr&codeProjet=$projet[codeProjet]>Supprimer</a></td>";
    echo "<td class='colsuppr'><a href=index.php?action=modif&codeProjet=$projet[codeProjet]>Modifier</a></td>";
    echo "</tr>";

}
    ?>
     <tr><td id='montd' colspan='4'><a href="index.php?action=ajouter">Ajouter un Projet</a></td></tr>
</table>
</div>

<?php
$content = ob_get_clean();
include "baselayout.php";  // Inclure le baselayout avec le contenu
?>
