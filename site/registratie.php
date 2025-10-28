<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Registreren</title>
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-5 card-auto p-4">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Registreren</h1>

                <form action="registratie_verwerken.php" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <div class="mb-3">
                        <label for="gebruikersnaam" class="form-label">Gebruikersnaam</label>
                        <input type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="wachtwoord" class="form-label">Wachtwoord</label>
                        <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" required>
                    </div>

                    <div class="mb-3">
                        <label for="wachtwoord_confirm" class="form-label">Bevestig wachtwoord</label>
                        <input type="password" class="form-control" id="wachtwoord_confirm" name="wachtwoord_confirm" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Registreren</button>
                    </div>
                </form>
                <p class="mt-3 text-center">Al een account? <a href="login.php">Inloggen</a></p>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>