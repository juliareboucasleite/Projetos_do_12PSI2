<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
    <style>
        .obrigatorio {
            color: red;
        }

        .campo {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>    
    <h1>Exercício 5 - Formulário</h1>

    <form action="exercicio5-validar.php" method="post">
        <div class="campo">
            <label for="nome">Nome<span class="obrigatorio">*</span>:</label>
            <input id="nome" name="nome" type="text" size="60" maxlength="100">
            <!-- repare que ao contrário do exercício 4, na linha acima não foi incluída a propriedade required -->
        </div>

        <div class="campo">
            <label for="Email">Email:</label>
            <input id="email" name="email" type="text" size="30" maxlength="80">
        </div>

        <div class="campo">
            <label for="nif">NIF:</label>
            <input id="nif" name="nif" type="text" size="10">
			<!-- na linha acima deveria ter sido utilizada a propriedade maxlength;
				 isto foi propositado para validar quando são enviados caracteres a mais -->
        </div>

        <div class="campo">
            <label for="quantia">Quantia a transferir:</label>
            <input id="quantia" name="quantia" type="text" size="10"> €
			<!-- na linha acima deveria ter sido utilizada a propriedade maxlength;
				 isto foi propositado para validar quando são enviados caracteres a mais -->

            <small>(quantia máxima: 9999.99 €)</small>
        </div>        

        <button type="submit">Submeter</button>

        <p><small><span class="obrigatorio">*</span> Campo obrigatório</small></p>
    </form>
</body>
</html>