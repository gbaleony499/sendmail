const fs = require('fs');
const nodemailer = require('nodemailer');

// Charger les données JSON
const dataPath = './assets/datas/data.json';
let data;
try {
    data = JSON.parse(fs.readFileSync(dataPath, 'utf8'));
} catch (error) {
    console.error('Erreur : impossible de lire ou de décoder le fichier JSON.');
    process.exit(1);
}

// Configuration du transporteur de mail
const transporter = nodemailer.createTransport({
    service: 'gmail', // Utilisation du service Gmail pour l'exemple
    auth: {
        user: process.env.EMAIL_USER, // Utilisez des variables d'environnement pour des raisons de sécurité
        pass: process.env.EMAIL_PASS, // Utilisez des variables d'environnement pour des raisons de sécurité
    }
});

const mailOptions = {
    from: '"Nom_de_expediteur" <' + process.env.EMAIL_USER + '>',
    to: 'kouame.ksma@gmail.com',
    cc: 'kouame.ksma@gmail.com',
    bcc: 'kouame.ksma@gmail.com',
    subject: 'Test',
    html: '<div style="width: 100%; text-align: center; font-weight: bold">Un Bonjour de Developpez.com !</div>'
};

// Envoi du mail
transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
        console.log('Erreur :', error);
        return {
            statusCode: 500,
            body: JSON.stringify({ message: 'Erreur lors de l\'envoi du mail', error: error.toString() })
        };
    } else {
        console.log('Votre message a bien été envoyé :', info.response);
        return {
            statusCode: 200,
            body: JSON.stringify({ message: 'Votre message a bien été envoyé', response: info.response })
        };
    }
});
