<section class="contact-form">
    <div class="container">
        <h2>Contactez-nous</h2>
        <form action="../api/contact.php" method="POST" id="contactForm">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</section>