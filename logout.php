<?php
session_start();
session_destroy(); // Distrugge tutte le variabili di sessione
header("Location: index.php"); // Reindirizza alla pagina principale
exit();
?>
