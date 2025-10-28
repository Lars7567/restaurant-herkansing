<?php

ob_start();
session_start();

// Alleen POST-verzoeken toestaan
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error'] = "Ongeldige toegang tot de pagina.";
    header("Location: login.php");
    exit;
}

// Controleer CSRF-token
if (
    !isset($_POST['csrf_token']) ||
    !isset($_SESSION['csrf_token']) ||
    $_POST['csrf_token'] !== $_SESSION['csrf_token']
) {
    $_SESSION['error'] = "Ongeldige beveiligingstoken. Probeer opnieuw.";
    header("Location: login.php");
    exit;
}

// Controleer verplichte velden
if (empty($_POST['gebruikersnaam_inloggen']) || empty($_POST['password_inloggen'])) {
    $_SESSION['error'] = "Vul alle velden in.";
    header("Location: login.php");
    exit;
}

$gebruikersnaam = trim($_POST['gebruikersnaam_inloggen']);
$wachtwoord = $_POST['password_inloggen'];

require 'database.php';

try {
    // Zoek gebruiker op gebruikersnaam
    $stmt = $conn->prepare("
        SELECT gebruiker_id, gebruikersnaam, wachtwoord, email, rol
        FROM gebruiker
        WHERE gebruikersnaam = :gebruikersnaam
        LIMIT 1
    ");
    $stmt->execute(['gebruikersnaam' => $gebruikersnaam]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Controleer of gebruiker bestaat
    if (!$user) {
        $_SESSION['error'] = "Gebruiker niet gevonden.";
        header("Location: login.php");
        exit;
    }

    // Controleer wachtwoord
    if (!password_verify($wachtwoord, $user['wachtwoord'])) {
        $_SESSION['error'] = "Ongeldig wachtwoord.";
        header("Location: login.php");
        exit;
    }

    // Succesvol ingelogd – sessie instellen
    $_SESSION['isIngelogd'] = true;
    $_SESSION['naam'] = $user['gebruikersnaam'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['rol'] = $user['rol'];
    $_SESSION['gebruiker_id'] = $user['gebruiker_id'];

    // Vernieuw sessie ID voor extra veiligheid
    session_regenerate_id(true);

    // Nieuwe CSRF-token aanmaken
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    $_SESSION['success'] = "Welkom, " . htmlspecialchars($user['gebruikersnaam']) . "!";
    header("Location: dashboard.php");
    exit;

} catch (Exception $e) {
    error_log("Loginfout: " . $e->getMessage());
    $_SESSION['error'] = "Er is een fout opgetreden. Probeer het later opnieuw.";
    header("Location: login.php");
    exit;
}
