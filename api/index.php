<?php

$dataPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/datas/data.json';

if (!file_exists($dataPath)) {
    echo "Erreur : le fichier JSON est introuvable.";
    exit;
}

$data = json_decode(file_get_contents($dataPath), true);

if ($data === null) {
    echo "Erreur : impossible de lire ou de décoder le fichier JSON.";
    exit;
}

$destinataire = 'kouame.ksma@gmail.com';
$expediteur = 'denis.laforce@gmail.com';
$copie = 'kouame.ksma@gmail.com';
$copie_cachee = 'kouame.ksma@gmail.com';
$objet = 'Test';
$headers  = 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\n";
$headers .= 'Reply-To: '.$expediteur . "\n";
$headers .= 'From: "Nom_de_expediteur"<'.$expediteur.'>' . "\n";
$headers .= 'Delivered-to: '.$destinataire . "\n";
$headers .= 'Cc: '.$copie . "\n";
$headers .= 'Bcc: '.$copie_cachee . "\n";

$message = '<div style="width: 100%; text-align: center; font-weight: bold">Un Bonjour de Developpez.com !</div>';

if (mail($destinataire, $objet, $message, $headers)) {
    echo 'Votre message a bien été envoyé';
} else {
    echo "Votre message n'a pas pu être envoyé";
}
?>
