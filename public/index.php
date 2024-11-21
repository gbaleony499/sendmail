<?php


$data = json_decode(file_get_contents(__DIR__ . "/assets/datas/data.json"), true);
$destinataire = 'kouame.ksma@gmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'corporate.records@hsb.ca';
$copie = 'kouame.ksma@gmail.com';
$copie_cachee = 'kouame.ksma@gmail.com';
$objet = 'VIREMENT'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "SOCIETE GENERALE"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc        
$message = 'SOCIETE GENERALE 

Nous vous informons que en date du 07/02/24 instructions a été donnée à La banque SOCIETE GENERALE, par M.
ANTOINE MALLET, de vous régler par virement immédiat la somme de + 10 000,00 € par crédit de votre compte FR76 3000 4002 1500 000 3273 489  
votre transaction à été transféré à la banque du bénéficiaire et le virement devrait figurer à son compte. Veuillez prévoir 5 jours de traitement  

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

?>
