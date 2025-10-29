<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Bestellingsformulier</title>
</head>
<body class="p-4">

<?php
$producten = [
    ["product" => "Autowasbeurt", "prijs" => 29.99],
    ["product" => "Interieurreiniging", "prijs" => 49.99],
    ["product" => "Lakpolijst", "prijs" => 99.50],
    ["product" => "Volledige detailbeurt", "prijs" => 199.00],
];
?>

<div class="container mt-4">
    <h2 class="mb-3">Beschikbare Kerstbomen</h2>
    <form action="bestelling_verwerken.php" method="post">
        <div>
            <?php foreach ($producten as $index => $item): ?>
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <label class="form-label mb-0" for="product<?php echo $index; ?>">
                    <?php echo htmlspecialchars($item['product']); ?>
                    <input 
                    type="number" 
                    class="form-control w-auto" 
                    name="aantal[<?php echo $index; ?>]" 
                    id="product<?php echo $index; ?>" 
                    min="0" 
                    max="100" 
                    value="0"
                    >
                    <?php echo " €" . number_format($item['prijs'], 2, ',', '.'); ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Bestellen</button>
    </form>
</div>



</body>
</html>
