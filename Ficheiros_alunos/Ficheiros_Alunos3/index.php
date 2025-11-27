<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferência de Fundos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"rel="stylesheet">
</head>
<body>
<main class="container mt-4 mb-4">
    <h1>Transferência de Fundos</h1>

    <form action="validar.php" method="post" class="mt-4">
    <div class="row mb-3">
        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input id="nome" name="nome" type="text" size="60" maxlength="100" class="form-control">
            <div class="form-text">Campo obrigatório</div>
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input id="email" name="email" type="email" size="30" maxlength="80" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="nif" class="col-sm-2 col-form-label">NIF</label>
        <div class="col-sm-10">
            <input id="nif" name="nif" type="text" size="10" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="quantia" class="col-sm-2 col-form-label">Quantia a transferir</label>
        <div class="col-sm-10">
            <input id="quantia" name="quantia" type="text" size="10" class="form-control">
            <div class="form-text">Quantia máxima: 9999.99 €</div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submeter</button>
</form>
    <script src="js/bootstrap.bundle.min.js"></script>  
</body>
</html>