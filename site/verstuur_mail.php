<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voornaam   = htmlspecialchars($_POST['voornaam']);
    $tussen     = htmlspecialchars($_POST['tussen']);
    $achternaam = htmlspecialchars($_POST['achternaam']);
    $email      = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bericht    = htmlspecialchars($_POST['bericht']);

    $to = "mooij.lars2005@gmail.com";
    $subject = "Nieuw bericht van $voornaam";
    
    $headers  = "From: demoversion.nl <info@demoversion.nl>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Naam: $voornaam $tussen $achternaam\n";
    $body .= "Email: $email\n\n";
    $body .= "Bericht:\n$bericht\n";
    $body .= "\n--\nDit bericht is verzonden vanaf het contactformulier van de website WorldWebdesign\n\nBeantwoord dit bericht niet rechtstreeks, maar gebruik het opgegeven e-mailadres.\n\nmet vriendelijke groet,\n\nWorldWebdesign";

    if (mail($to, $subject, $body, $headers)) {
        echo "Bericht succesvol verzonden!";
    } else {
        echo "Fout bij het verzenden van de e-mail.";
        error_log("E-mail kon niet worden verzonden naar $to.", 0);
    }
}
?>
