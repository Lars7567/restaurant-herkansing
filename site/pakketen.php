<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container py-5">
        <h1 class="text-center mb-5">Onze Pakketten</h1>
        <div class="row row-cols-1 row-cols-md-2 g-4 justify-content-center">
            <?php
            $count = 0;
            foreach ($opties as $optie) :
                if ($count >= 6) break; // Toon maximaal 6 pakketten
            ?>
                <div class="col">
                    <div class="card h-100 shadow hover-effect">
                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-4">
                                <h5 class="card-title fw-bold mb-3"><?php echo htmlspecialchars($optie['optie']); ?></h5>
                                <p class="card-text"><?php echo nl2br(htmlspecialchars($optie['beschrijving'])); ?></p>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="card-text h5 mb-0"><strong>€ <?php echo number_format((float)$optie['prijs'], 2, ',', '.'); ?></strong></p>
                                    <a href="detail_pagina.php?optie_id=<?php echo htmlspecialchars($optie['optie_id']); ?>" class="btn btn-primary px-4">Meer info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $count++;
            endforeach;
            ?>
        </div>
    </div>
    <div class="service container">
        <hr>
        <br>
        <p>
            Wij verlenen ook maandelijkse servicepakketten aan onze klanten. Deze pakketten omvatten regelmatige onderhoudsbeurten, systeemupdates en prioritaire ondersteuning om ervoor te zorgen dat uw apparatuur altijd optimaal functioneert. Neem contact met ons op voor meer informatie over onze servicepakketten en hoe wij u kunnen helpen uw systemen in topconditie te houden. dit kan via ons <a href="contact.php">contactpagina</a>.
        </p>
        <?php include 'footer.php'; ?>
    </div>
</body>

</html>