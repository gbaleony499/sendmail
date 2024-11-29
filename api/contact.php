<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = 'votre_email@example.com';
    $subject = "Nouveau message de $name";
    $body = "Nom: $name\nEmail: $email\nMessage:\n$message";

    if (mail($to, $subject, $body)) {
        echo json_encode(["status" => "success", "message" => "Message envoyé avec succès."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors de l'envoi du message."]);
    }
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo json_encode(["status" => "error", "message" => "Méthode non autorisée."]);
}
?>