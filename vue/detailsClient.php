<?php
$title = "Détails client";
ob_start();
?>

<?php

echo $client;
  
?>
<?php
$content = ob_get_clean();
include "vue/baselayout.php";
?>