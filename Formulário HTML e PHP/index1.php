<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário</title>
    <h1><center>Formulário HTML e PHP</center></h1>
</head>
<body>

    <div id="caixa">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <label for="Nome">Nome:</label><br>
            <input type="text" id="Nome" name="Nome" placeholder="Digite seu nome" required><br><br>
            
            <label for="CPF">CPF:</label><br>
            <input type="text" id="CPF" name="CPF" placeholder="Digite seu CPF" required maxlength="14"><br><br>
            
            <label for="Telefone">Telefone:</label><br>
            <input type="text" id="Telefone" name="Telefone" placeholder="Exemplo: 31 999999999" required maxlength="15"><br><br>
            
            <label for="nascimento">Data de nascimento:</label><br>
            <input type="date" id="nascimento" name="nascimento" placeholder="dd/mm/aaaa" required><br><br>
            
            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" placeholder="Exemplo@exemplo.com" required><br><br>
            
            <label for="estudante">Você é estudante?</label>
            <input type="checkbox" id="estudante" name="estudante"><br><br>
            
            <button type="submit" id="botao_enviar" name="botao_enviar" required>Enviar</button>
        </form>


        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome = $_POST['Nome'];
                $cpf = $_POST['CPF'];
                $telefone = $_POST['Telefone'];
                $nascimento = $_POST['nascimento'];
                $email = $_POST['email'];
                $eh_estudante = isset($_POST['estudante']);
                $data_de_hoje = new DateTime();

                $nascimento_obj = new DateTime($nascimento);

                $diaNasc = $nascimento_obj->format('d');
                $mesNasc = $nascimento_obj->format('m');
                $anoNasc = $nascimento_obj->format('Y');

                $idade = $data_de_hoje->diff($nascimento_obj)->y;

                echo "<br>";
                
                echo"<h2>MENSAGEM</h2>";
                echo "Eu $nome, ".($eh_estudante ? "sou estudante." : "não sou estudante.")." Meu número de CPF é $cpf,
                nasci em $diaNasc/$mesNasc/$anoNasc e tenho $idade anos de idade. Meu telefone para contato é $telefone e o meu email é $email";
            
            }elseif($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_POST)){
                echo "Erro! Formulário não enviado";
            }
            

        ?>
    </div>

    
</body>
</html>