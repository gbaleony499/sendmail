<?php
echo "Chemin courant : " . __DIR__ . "<br>";
echo "Document Root : " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

$dataPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/datas/data.json';
if (file_exists($dataPath)) {
    echo "Fichier JSON trouvé : $dataPath";
} else {
    echo "Fichier JSON introuvable : $dataPath";
}
?>
