<?php
header("Content-Type: application/json");

// Configuration
$from = "votre_email@example.com"; // Remplacez par votre adresse e-mail
$headers = "From: $from\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$subject = "Campagne promotionnelle - Votre titre ici";
$message = "
<html>
    <head>
        <title>Campagne Promotionnelle</title>
    </head>
    <body>
        <h1>Offre exclusive pour vous !</h1>
        <p>Découvrez nos nouvelles promotions sur notre site web.</p>
        <a href='https://www.votre-site.com'>Cliquez ici pour en profiter</a>
    </body>
</html>
";

// Adresse du destinataire
$to = "Kouame.ksma@gmail.com";

// Envoi de l'e-mail
if (mail($to, $subject, $message, $headers)) {
    echo json_encode([
        "email" => $to,
        "status" => "success",
        "message" => "E-mail envoyé avec succès"
    ]);
} else {
    echo json_encode([
        "email" => $to,
        "status" => "error",
        "message" => "Échec de l'envoi de l'e-mail"
    ]);
}
?>
