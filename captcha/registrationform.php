
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <h2>Verificação de você não é um robô</h2>
    <form action="process_registration.php" method="post">
        <!-- Your other form fields -->

        <!-- Display the captcha image -->
        <img src="/games/captcha/captcha.php" alt="Captcha">

        <!-- Input field for the user to enter the captcha code -->
        <label for="captcha">Reescreva o numero:</label>
        <input type="text" id="captcha" name="captcha" required>

        <!-- Your submit button -->
        <button type="submit">Registrar</button>
    </form>
</body>
</html>
