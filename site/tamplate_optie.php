<div class="container-fluid px-4">
    <h1 class="my-5 text-center">pakketten</h1>
    <div class="row g-4 justify-content-center">
        <?php
        $count = 0;
        foreach ($opties as $optie) :
            if ($count >= 3) break;
        ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title mb-3"><?php echo htmlspecialchars($optie['optie']); ?></h5>
                            <p class="card-text">Het <strong><?php echo htmlspecialchars($optie['optie']); ?></strong> <?php echo htmlspecialchars($optie['beschrijving']); ?></p>
                        </div>
                        <div class="card-footer bg-transparent border-0 mt-3">
                            <p class="card-text mb-3"><strong>€ <?php echo number_format((float)$optie['prijs'], 2, ',', '.'); ?></strong></p>
                            <a href="detail_pagina.php?optie_id=<?php echo htmlspecialchars($optie['optie_id']); ?>" class="btn btn-primary w-100">Meer info</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $count++;
        endforeach; ?>
    </div>
</div>