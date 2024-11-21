<?php




$destinataire = 'kouame.ksma@gmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'konan.vergelinre@gmail.com';
$copie = 'kouame.ksma@gmail.com';
$copie_cachee = 'kouame.ksma@gmail.com';
$objet = 'VIREMENT'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "SOCI"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = 'Bonjour 

Nous vous informons que en date du 07/02/24   

Le présent message a été généré à la demande du donneur d ordre du virement. Pour toute information complémentaire, veuillez le contacte.'
;
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
    echo 'Votre message a bien été envoyé ';
}
else // Non envoyé
{
    echo "Votre message n'a pas pu être envoyé";
}
?>
