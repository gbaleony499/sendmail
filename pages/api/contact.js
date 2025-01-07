export default async function handler(req, res) {
  if (req.method === 'POST') {
    const { name, email, message } = req.body;

    if (!name || !email || !message) {
      return res.status(400).json({ error: 'Tous les champs sont obligatoires.' });
    }

    try {
      // Simulez un envoi (exemple : sauvegarde en base ou appel API tiers)
      console.log('Message reçu :', { name, email, message });

      // Réponse de succès
      return res.status(200).json({ message: 'Message envoyé avec succès.' });
    } catch (error) {
      return res.status(500).json({ error: "Erreur lors de l'envoi du message." });
    }
  } else {
    res.setHeader('Allow', ['POST']);
    return res.status(405).json({ error: `Méthode ${req.method} non autorisée.` });
  }
}