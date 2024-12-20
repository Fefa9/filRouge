<?php
$title = "Détails du Client";
ob_start();
?>

<div class="container">
    <!-- <h1>Détails du Client</h1> -->
    <table class="table table-striped">
        <tr>
            <th>Identifiant</th>
            <td><?= htmlspecialchars($client['idClient'] ?? 'N/A') ?></td>
        </tr>
        <tr>
            <th>Raison Sociale</th>
            <td><?= htmlspecialchars($client['raisonSociale'] ?? 'N/A') ?></td>
        </tr>
        <tr>
            <th>CA</th>
            <td><?= htmlspecialchars($client['CA'] ?? 'N/A') ?> €</td>
        </tr>
        <tr>
            <th>Effectif</th>
            <td><?= htmlspecialchars($client['effectifClient'] ?? 'N/A') ?></td>
        </tr>
        <tr>
            <th>Activité</th>
            <td><?= htmlspecialchars($client['fonction'] ?? 'N/A') ?></td>
        </tr>
    </table>
    <a href="index.php" class="btn btn-primary">Retour à la liste</a>
</div>

<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>
