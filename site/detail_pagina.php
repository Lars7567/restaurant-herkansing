<?php
require 'database.php';
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Optie Details - UltraHard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container mt-5">
        <?php
        if (isset($_GET['optie_id'])) {
            $optie_id = (int)$_GET['optie_id'];

            try {
                $stmt = $conn->prepare("SELECT * FROM opties WHERE optie_id = ?");
                $stmt->execute([$optie_id]);
                $optie = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($optie) {
        ?>
                    <div class="w-100 mb-4 py-4">
                        <div class="text-center mb-3">
                            <h2 class="alig"><?php echo htmlspecialchars($optie['optie']); ?></h2>
                            <p class="card-text">Het <strong><?php echo htmlspecialchars($optie['optie']); ?></strong> <?php echo htmlspecialchars($optie['beschrijving']); ?></p>
                            <p class="card-text">Inbegrepen werkzaamheden: <strong><?php echo htmlspecialchars($optie['uitleg']); ?></strong></p>
                            <p class="card-text">
                                <strong>Prijs:</strong> € <?php echo number_format($optie['prijs'], 2, ',', '.'); ?>
                            </p>
                            <h6 class="card-text"><?php echo htmlspecialchars($optie['slogan']); ?></h6>
                            <br>
                            <div class="d-flex justify-content-center gap-2 action-btns">
                                <a href="resevering.php?optie_id=<?php echo $optie_id; ?>" class="btn btn-primary detail-action-btn">
                                    Nu Reserveren
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr><br>
                    <h3 class="mb-4">Andere Opties</h3>
                    <?php
                    // Haal maximaal 3 andere opties op (exclusief de huidige)
                    try {
                        $stmtOther = $conn->prepare("SELECT * FROM opties WHERE optie_id != ? LIMIT 3");
                        $stmtOther->execute([$optie_id]);
                        $otherOptions = $stmtOther->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        $otherOptions = [];
                    }
                    ?>
                    <div class="container my-5">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            <?php foreach ($otherOptions as $other) : ?>
                                <div class="col">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title"><?php echo htmlspecialchars($other['optie']); ?></h5>
                                            <p class="card-text"><?php echo htmlspecialchars($other['beschrijving']); ?></p>
                                            <p class="card-text"><strong>€ <?php echo number_format((float)$other['prijs'], 2, ',', '.'); ?></strong></p>
                                            <div class="mt-auto">
                                                <a href="detail_pagina.php?optie_id=<?php echo htmlspecialchars($other['optie_id']); ?>" class="btn btn-primary w-100">Meer info</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
        <?php
                } else {
                    echo '<div class="alert alert-warning">Optie niet gevonden.</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger">Er is een fout opgetreden: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Geen optie ID opgegeven.</div>';
        }
        ?>
    </div>

    <?php include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
?>