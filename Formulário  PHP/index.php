<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
    <h1><center>Formulário PHP</center></h1>
</head>
<body>

    <div id="formulario">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <label for="Nome">Nome:</label><br>
            <input type="text" id="Nome" name="Nome" placeholder="Digite seu nome" required><br><br>

            <label for="CPF">CPF:</label><br>
            <input type="text" id="CPF" name="CPF" placeholder="Digite seu CPF" required maxlength="14"><br><br>
            
            <label for="Telefone">Telefone:</label><br>
            <input type="text" id="Telefone" name="Telefone" placeholder="Exemplo: (31) 99999-9999" required maxlength="15"><br><br>
            
            <label for="nascimento">Data de nascimento:</label><br>
            <input type="date" id="nascimento" name="nascimento" placeholder="dd/mm/aaaa" required><br><br>
            
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" placeholder="Exemplo@exemplo.com" required><br><br>
            
            <label for="estudante">Você é estudante?</label>
            <input type="checkbox" id="estudante" name="estudante"><br><br>
            
           <center><button type="submit" id="botao_enviar" name="botao_enviar" required>Enviar</button></center>
        </form>


        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome = $_POST['Nome'];
                $cpf = $_POST['CPF'];
                $telefone = $_POST['Telefone'];
                $nascimento = $_POST['nascimento'];
                $email = $_POST['email'];
                $eh_estudante = isset($_POST['estudante']);
                if (empty($nome) || empty($cpf) || empty($telefone) || empty($nascimento)) {
                    // Exibe uma mensagem de erro
                    echo "Por favor, preencha todos os campos do formulário.";
                } else {
                    // Converte a data de nascimento em um objeto DateTime
                    $data_nascimento = new DateTime($nascimento);
                    // Obtém a data atual
                    $data_atual = new DateTime();
                    // Calcula a diferença entre a data atual e a data de nascimento
                    $diferenca = $data_atual->diff($data_nascimento);
                    // Exibe as informações do usuário e a idade calculada
                    echo "Eu, $nome, " . ($eh_estudante ? "sou estudante, " : "não sou estudante, ") . "meu CPF é $cpf, meu telefone é $telefone, eu nasci em " . date_format($data_nascimento, 'd/m/Y') . " e minha idade é " . $diferenca->y . " anos e meu email é $email";
                 }

            }
            
            

        ?>


        

    </div>
    
</body>
</html>