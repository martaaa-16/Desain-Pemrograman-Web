<?php include 'header.php'; ?>
<?php include 'database.php'; ?>

<section class="about">
    <h2>About Us</h2>
    <p>Our Blooms® is a floral studio dedicated to bringing joy through flower design.
        We create unique arrangements inspired by nature’s beauty and simplicity.</p>

    <img src="img/about.jpg" alt="Florist">

    <form id="contactForm" method="post" action="">
        <h3>Contact Us</h3>
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Your email" required>
        <textarea name="message" placeholder="Message" required></textarea>
        <button type="submit" name="submit">Send</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        try {
            $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :message)");
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':message' => $message
            ]);

            echo "<p class='thanks'>Thank you, $name! Your message has been saved.</p>";
        } catch (PDOException $e) {
            echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</section>

<?php include 'footer.php'; ?>