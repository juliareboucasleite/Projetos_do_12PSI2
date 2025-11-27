<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verificar Password</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main class="container">
		<h1>Verificar Password</h1>
        <p>
            Demonstração de como receber uma password em plaintext (texto normal) e verificar se é a password correta, utilizando a função <code>password_verify()</code>.
        </p>
        <p>
            Password correta: <strong>starwars</strong> 
        </p>

        <?php
        
            // Verificar que os dados foram enviados por POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Verificar que a password existe
                if (!empty($_POST['password']))
                {
                    $passwordCorreta = "starwars";
                    $hashPasswordCorreta = password_hash($passwordCorreta, PASSWORD_DEFAULT);

                    $passwordSubmetida =  htmlspecialchars($_POST['password'], ENT_QUOTES);
                    $hashPasswordSubmetida = password_hash($passwordSubmetida, PASSWORD_DEFAULT);

                    $resultado = password_verify($passwordSubmetida, $hashPasswordCorreta);

                    if ($resultado == true)
                    {
                        $mensagem =  "A password submetida está correta";
                        $classeCss = "text-success";
                    }
                    else
                    {
                        $mensagem = "A password submetida está incorreta";
                        $classeCss = "text-danger";
                    }                   
                ?>

                    <div class="mt-3 alert alert-primary" role="alert">
                        <p>
                            Password submetida: <strong><?php echo $passwordSubmetida; ?></strong><br>
                            Hash password submetida: <strong><?php echo $hashPasswordSubmetida; ?></strong>
                        </p>
                        <p>
                            Password correta: <strong><?php echo $passwordCorreta; ?></strong><br>
                            Password codificada:  <strong><?php echo $hashPasswordCorreta; ?></strong>
                        </p>

                        <p>
                            Resultado da verificação: <strong class="<?php echo $classeCss; ?>"><?php echo $mensagem; ?></strong>
                        </p>
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