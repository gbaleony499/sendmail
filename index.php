<?php
// Vu qu'on utilisera PHPMailer, on importe ses fichiers
require_once('PHPMailer/Exception.php');
require_once('PHPMailer/PHPMailer.php');
require_once('PHPMailer/SMTP.php');

// PHPMailer est un PHP Orienté Objet
// On appelle les classes Exception et PHPMailer
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// On instancie PHPMailer
$email = new PHPMailer();

// On configure PHPMailer
// On utilise SMTP
$email->isSMTP();

// On définit le serveur SMTP
$email->Host = 'localhost';

// On définit le port du serveur
$email->Port = 1025;
// Fin de la configuration

// On essaie d'envoyer un mail
try{
    // On définit l'expéditeur
    $email->setFrom('contact@demo.fr', 'Benoit');

    // On définit le destinaire
    $email->addAddress('kouame.ksma@gmail.com', 'Bruno');

    // On définit le sujet du mail
    $email->Subject = 'Ceci est un titre' ;

    // On définit que le message sera envoyé en HTML
    $email->isHTML();

    // On définit le corps du message
    $email->Body = '<h1 style="color:red">Titre du message</h1>
                    <p>Ceci est le contenu du message</p>
                    <a href="">Lien</a>';

    // On peut définir un contenu de texte
    $email->AltBody = 'Ceci est le texte en format texte brut';

    // On envoie le mail
    $email->send();

    echo 'Le mail est envoyé';

} catch (Exception $e) {
    // Ici le mail n'est pas parti
    echo $e->errorMessage();
}