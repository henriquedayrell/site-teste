<?php
session_start();

// Retrieve the user-entered captcha code
$userCaptcha = $_POST['captcha'];

// Retrieve the correct captcha code from the session
$correctCaptcha = $_SESSION['captcha_code'];

// Check if the entered code matches the correct code
if ($userCaptcha === $correctCaptcha) {
    // Captcha verification successful, proceed with registration
    // Your registration logic goes here
    header("location: ../register.php");
} else {
    // Captcha verification failed, show an error
    echo "Captcha falhou, tente novamente.";
}

// Clean up session variable
unset($_SESSION['captcha_code']);
?>
