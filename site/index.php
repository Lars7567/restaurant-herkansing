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
    ["product" => "Kerstboom Type A: 1 - 1.5 mtr", "prijs" => 31.00],
    ["product" => "Kerstboom Type B: 1.5 - 2 mtr", "prijs" => 46.00],
    ["product" => "Kerstboom Type C: 2 - 2.5 mtr", "prijs" => 56.00],
    ["product" => "Kerstboom Type D: 2.5 - 3 mtr", "prijs" => 66.00],
    ["product" => "Kerstboom Type E: 3 mtr en hoger", "prijs" => 91.00],
];
?>
<div class="container mt-4 px-5 py-5 border rounded-3 shadow-sm bg-white">
    <h1 class="mb-3">Kerstbomen 2025</h1>
    <hr>
    <h4 class="mb-3">Beschikbare Kerstbomen</h4>

    <form action="bestelling_verwerken.php" method="post">
        <div id="producten-lijst">
            <?php foreach ($producten as $index => $item): ?>
                <div class="mb-3 d-flex align-items-center gap-3">

                    <label class="form-label mb-0 flex-grow-1" for="product<?php echo $index; ?>">
                        <?php echo htmlspecialchars($item['product']); ?>
                    </label>

                    <input 
                        type="number" 
                        class="form-control w-auto text-center aantal-input" 
                        name="aantal[<?php echo $index; ?>]" 
                        id="product<?php echo $index; ?>" 
                        min="0" 
                        max="100" 
                        value="0"
                        data-prijs="<?php echo $item['prijs']; ?>"
                        style="width: 80px;"
                    >

                    <span class="text-nowrap prijs" id="prijs<?php echo $index; ?>">
                        € <?php echo number_format(0, 2, ',', '.'); ?>
                    </span>

                    <span class="text-muted small">
                        (<?php echo "€" . number_format($item['prijs'], 2, ',', '.'); ?> / stuk)
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>

        <div class="mt-4 gap-3">
            <label for="donatie" class="form-label mb-0 flex-grow-1"><h5>Donatie</h5></label>
            <input 
                type="number" 
                class="form-control w-auto text-center" 
                id="donatie" 
                name="donatie" 
                min="0" 
                step="0.01"
                value="0"
                style="width: 100px;"
            >
        </div>

        <div class="mt-4">
            <strong>Totaal: <span id="totaal">€ 0,00</span></strong>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Bestellen</button>
    </form>
</div>

<script>
    const inputs = document.querySelectorAll('.aantal-input');
    const totaalEl = document.getElementById('totaal');
    const donatieInput = document.getElementById('donatie');

    function updatePrijzen() {
        let totaal = 0;

        inputs.forEach(input => {
            const prijs = parseFloat(input.dataset.prijs);
            const aantal = parseInt(input.value) || 0;
            const subtotaal = prijs * aantal;
            totaal += subtotaal;

            const prijsElement = document.getElementById('prijs' + input.id.replace('product', ''));
            prijsElement.textContent = '€ ' + subtotaal.toFixed(2).replace('.', ',');
        });

        const donatie = parseFloat(donatieInput.value) || 0;
        totaal += donatie;

        totaalEl.textContent = '€ ' + totaal.toFixed(2).replace('.', ',');
    }
    inputs.forEach(input => input.addEventListener('input', updatePrijzen));
    donatieInput.addEventListener('input', updatePrijzen);
</script>
</body>
</html>
