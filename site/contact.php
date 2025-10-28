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

<div class="about w-100% bg-light mb-4 d-flex justify-content-center align-items-center">
</div>
<form action="verstuur_mail.php" method="post">
    <div class="container mt-5 card-auto p-4">
        <div class="card mx-auto card-body text-center" style="max-width: 80%;">
            <h1>Contactformulier</h1>
            <p>Voer uw gegevens in:</p>
            <div class="row justify-content-center g-2 mt-3">
                <div class="col-md-100%">
                    <input type="email" id="email" name="email" placeholder="E-mail" class="form-control">
                </div>
            </div>
            <div class="row text-center g-2">
                <div class="col-md-4 p-1 bg-white">
                    <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam" class="form-control">
                </div>
                <div class="col-md-4 p-1 bg-white">
                    <input type="text" id="tussenvoegsel" name="tussenvoegsel" placeholder="tussenvoegsel" class="form-control">
                </div>
                <div class="col-md-4 p-1 bg-white">
                    <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam" class="form-control">
                </div>
            </div>
            <div class="row justify-content-center g-2 mt-3">
                <div class="col-md-100%">
                    <textarea id="bericht" name="bericht" placeholder="Bericht" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="row justify-content-center g-2 mt-3">
                <div class="col-md-100%">
                    <button type="submit" class="btn btn-primary w-100">Verzenden</button>
                </div>
        </div>
    </div>
</form>
<br>


<?php include 'footer.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>