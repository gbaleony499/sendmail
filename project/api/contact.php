<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $response = [];

    if (!empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['message'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $mail = htmlspecialchars($_POST['mail']);
        $messageContent = htmlspecialchars($_POST['message']);

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $response['error'] = "L'adresse email n'est pas valide !";
        } else {
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"UBS BANK"<support@primfx.com>' . "\r\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\r\n";
            $header .= 'Content-Transfer-Encoding: 8bit';

            $message = "
            <html>
                <body>
                    <div align='center'>
                        <u>Nom de l'expéditeur :</u> $nom<br />
                        <u>Mail de l'expéditeur :</u> $mail<br />
                        <br />
                        " . nl2br($messageContent) . "
                        <br />
                    </div>
                </body>
            </html>";

            if (mail("kouame.ksma@gmail.com", "CONTACT - UBS", $message, $header)) {
                $response['success'] = "Votre message a bien été envoyé !";
            } else {
                $response['error'] = "Une erreur est survenue lors de l'envoi du message.";
            }
        }
    } else {
        $response['error'] = "Tous les champs doivent être complétés !";
    }

    echo json_encode($response);
    exit();
}
?>
