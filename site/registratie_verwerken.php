<?php
ob_start();
session_start();
require 'database.php';

$gebruikersnaam = trim($_POST['gebruikersnaam']);
$email = trim($_POST['email']);
$wachtwoord = $_POST['wachtwoord'];


$hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);
$rol = 'gebruiker';

$stmt = $conn->prepare("INSERT INTO gebruiker (gebruikersnaam, email, wachtwoord, rol) 
                        VALUES (:gebruikersnaam, :email, :wachtwoord, 'gebruiker')");

$stmt->execute([
    ':gebruikersnaam' => $gebruikersnaam,
    ':email' => $email,
    ':wachtwoord' => $hashed_password
]);


header("Location: login.php");
exit;
