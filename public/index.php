<?php
// Test basique pour vérifier le déploiement sur Vercel
echo "<h1>Test Vercel PHP</h1>";
echo "<p>Félicitations ! Votre application PHP fonctionne sur Vercel.</p>";

// Informations supplémentaires
echo "<h2>Informations de Debug</h2>";
echo "<p>Chemin courant : " . __DIR__ . "</p>";
echo "<p>Document Root : " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
?>
