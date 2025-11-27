<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Codificar Password</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main class="container">
		<h1>Codificar Password</h1>
        <p>
            Demonstração de como receber uma password em plaintext (texto normal) e codificá-la utilizando a função <code>password_hash()</code>.
        </p>

        <?php
        
            // Verificar que os dados foram enviados por POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Verificar que a password existe
                if (!empty($_POST['password']))
                {
                    $password =  htmlspecialchars($_POST['password'], ENT_QUOTES);
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                ?>

                    <div class="mt-3 alert alert-primary" role="alert">
                        Password submetida: <strong><?php echo $password; ?></strong><br>
                        Password codificada: <strong><?php echo $hash; ?></strong>
                    </div>

                <?php }
            }

        ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="password">Password:</label>
                </div>
                <div class="col-auto">
                    <input id="password" name="password" type="password" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-2">Submeter</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>