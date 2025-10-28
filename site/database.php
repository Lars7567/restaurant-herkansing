<?php
    $servername  = "mariadb";
    $username = "root";
    $password = "password";
    $dbname = "UltraHard";

    // Maak een  database connectie
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>

