<?php
// Script pour envoyer un email

$destinataire = 'kouame.ksma@gmail.com';
$expediteur = 'denis.laforce@gmail.com';
$copie = 'kouame.ksma@gmail.com';
$copie_cachee = 'kouame.ksma@gmail.com';
$objet = 'Test';
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "Reply-To: $expediteur\r\n";
$headers .= "From: \"Nom_de_expediteur\" <$expediteur>\r\n";
$headers .= "Delivered-To: $destinataire\r\n";
$headers .= "Cc: $copie\r\n";
$headers .= "Bcc: $copie_cachee\r\n";

$message = '
    <div style="width: 100%; text-align: center; font-weight: bold;">
        Un Bonjour de Developpez.com !
    </div>
';

if (mail($destinataire, $objet, $message, $headers)) {
    echo 'Votre message a bien été envoyé';
} else {
    echo "Votre message n'a pas pu être envoyé";
}
?>
