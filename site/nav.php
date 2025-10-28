<?php
require 'database.php';

$sql = "SELECT * FROM opties";
$stmt = $conn->prepare($sql);
$stmt->execute();
$opties = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<nav class="navbar navbar-expand-lg shadow-sm navbar-light d-flex align-items-center w-100">
    <a href="index.php"><img src="uploads/UltraHard_logo.png" class="logo" alt="UltraHard logo"></a>
    <ul class="navbar-nav d-flex flex-row justify-content-center mx-auto">
        <li class="text"><a href="index.php">HOME</a></li>
        <li class="text"><a href="pakketen.php">PAKKETTEN</a></li>
        <li class="text"><a href="about.php">ABOUT</a></li>
        <li class="text"><a href="contact.php">CONTACT</a></li>
    </ul>
    <ul class="navbar-nav d-flex flex-row">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hamburger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Account opties">
                <svg class="icon-lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                    <path d="M17 8h-1V6a4 4 0 0 0-8 0v2H7a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2zm-6 9a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm3-9H8V6a3 3 0 0 1 6 0v2z"/>
                </svg>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">LOGIN</a></li>
                <li><a class="dropdown-item" href="#">AANMELDEN</a></li>
            </ul>
        </li>
    </ul>
</nav>