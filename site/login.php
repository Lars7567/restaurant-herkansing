<?php
session_start();

// Genereer CSRF token als die nog niet bestaat
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if user is already logged in
if (isset($_SESSION['isIngelogd']) && $_SESSION['isIngelogd'] === true) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Inloggen</title>
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-5 card-auto p-4">
        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Inloggen</h1>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php
                        echo htmlspecialchars($_SESSION['error']);
                        unset($_SESSION['error']);
                        ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php
                        echo htmlspecialchars($_SESSION['success']);
                        unset($_SESSION['success']);
                        ?>
                    </div>
                <?php endif; ?>

                <form action="login_verwerken.php" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">

                    <div class="mb-3">
                        <label for="gebruikersnaam_inloggen" class="form-label">Gebruikersnaam</label>
                        <input type="text" class="form-control" id="gebruikersnaam_inloggen" name="gebruikersnaam_inloggen" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_inloggen" class="form-label">Wachtwoord</label>
                        <input type="password" class="form-control" id="password_inloggen" name="password_inloggen" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Inloggen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>