<?php 

ob_start();
session_start();

?>
<?php
require 'database.php';

// Haal de optie_id uit de URL
$optie_id = isset($_GET['optie_id']) ? (int)$_GET['optie_id'] : null;

// Haal de optie-informatie op uit de database
$optie = null;
if ($optie_id) {
    $stmt = $conn->prepare("SELECT * FROM opties WHERE optie_id = ?");
    $stmt->execute([$optie_id]);
    $optie = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="reservering w-100% bg-light mb-4 d-flex justify-content-center align-items-center">
        <h1>Reservering pagina</h1>
        <p>Reserveer hier uw dienst bij UltraHard.</p>
    </div>
    <div>
        <form action="">
            <div class="container mt-5 card-auto p-4">
                <div class="card mx-auto card-body text-center" style="max-width: 80%;">
                    <h1>Reserveringsformulier</h1>
                    <p>Vul uw gegevens in om een reservering te maken:</p>
                    <div class="row justify-content-center g-2 mt-3">
                        <div class="col-md-100%">
                            <input type="text" id="naam" name="naam" placeholder="Naam" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-center g-2 mt-3">
                        <div class="col-md-100%">
                            <input type="email" id="email" name="email" placeholder="E-mail" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-center g-2 mt-3">
                        <div class="col-md-100%">
                            <input type="date" id="datum" name="datum" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-center g-2 mt-3">
                        <div class="col-md-100%">
                            <div class="input-group">
                                <input type="text" id="optie" name="optie" class="form-control" 
                                    value="<?php echo $optie ? htmlspecialchars($optie['optie']) : ''; ?>" 
                                    readonly>
                                <span class="input-group-text">€ <?php echo $optie ? number_format($optie['prijs'], 2, ',', '.') : '0,00'; ?></span>
                            </div>
                            <input type="hidden" name="optie_id" value="<?php echo $optie_id; ?>">
                            <input type="hidden" name="prijs" value="<?php echo $optie ? $optie['prijs'] : ''; ?>">
                        </div>
                    </div>
                    <div class="row justify-content-center g-2 mt-3">
                        <div class="col-md-100%">
                            <button type="submit" class="btn btn-primary w-100">Reserveren</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php include 'footer.php'; ?>\
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>