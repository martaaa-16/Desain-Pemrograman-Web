<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan htmlspecialchars</title>
</head>
<body>
    <h2>Form Input Email</h2>
    <form method="post" action="">
        <label for="input">Masukkan Email:</label>
        <input type="text" name="input" id="input" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        // Melindungi dari XSS dengan htmlspecialchars
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "<h3>Hasil Input:</h3>";

        // Validasi email
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:green;'>Email valid: " . $input . "</p>";
        } else {
            echo "<p style='color:red;'>Email tidak valid!</p>";
        }
    }
    ?>
</body>
</html>