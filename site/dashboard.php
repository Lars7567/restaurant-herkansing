<?php 

ob_start();
session_start();
if (!isset($_SESSION['isIngelogd']) || $_SESSION['isIngelogd'] !== true) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="home w-100% bg-light mb-4 d-flex justify-content-center align-items-center">
        <h1>Welkom bij UltraHard</h1>
        <p>Van vuil naar schitterend – UltraHard maakt het mogelijk.</p>
    </div>

    <?php include 'tamplate_optie.php'; ?>  

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
