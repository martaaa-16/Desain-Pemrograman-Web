<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan htmlspecialchars</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="post" action="">
        <label for="input">Masukkan teks:</label>
        <input type="text" name="input" id="input" required>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        // Melindungi dari XSS dengan htmlspecialchars
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        echo "<h3>Hasil Input:</h3>";
        echo "Output: " . $input;
    }
    ?>
</body>
</html>