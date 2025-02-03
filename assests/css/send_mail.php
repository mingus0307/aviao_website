<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // reCAPTCHA-Verifizierung
    $recaptcha_secret = "YOUR_GOOGLE_RECAPTCHA_SECRET_KEY"; // Ersetze dies mit deinem Secret Key
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Überprüfen der reCAPTCHA-Antwort
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $response_keys = json_decode($response, true);

    if (intval($response_keys["success"]) !== 1) {
        echo "reCAPTCHA verification failed. Please try again.";
        exit;
    }

    // Formularfelder prüfen und aufbereiten
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // E-Mail-Einstellungen
    $band_email = "aviaoband@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Neue Post von der Website, du Harzer.\n\n".
            "Name: $name\n".
            "Email: $email\n\n".
            "Message:\n$message";

    // Zusätzliche Header für die E-Mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // E-Mail senden
    if (mail($band_email, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message.";
    }
} else {
    echo "Invalid request.";
}
?>

