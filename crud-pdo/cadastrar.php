<?php
include_once 'Models/conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <?php
        // Receber os dados do formulario
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verificar se o usuario clicou no botão
if (!empty($dados['send'])) {
    // var_dump($dados);

    // Verificando se os campos não estão sendo enviados vazios
    $empty_input = false;
    $dados = array_map('trim', $dados);
    if (in_array('', $dados)) {
        $empty_input = true;
        echo '<p style="color: red">ERRO: Necessário preencher todos os campos!</p><br>';
    } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $empty_input = true;
        echo '<p style="color: red">ERRO: Necessário preencher o campo com email valido!</p><br>';
    }

    // Cadastrando os usuários
    if (!$empty_input) {
        $query_usuario = 'INSERT INTO usuarios (full_name, email) VALUES (:name, :email)';
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':name', $dados['full-name'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_usuario->execute();
        if ($cad_usuario->rowCount()) {
            echo '<p style="color: green">Usuário cadastrado com sucesso!</p><br>';
            unset($dados);
        } else {
            echo '<p style="color: red">ERRO: Usuário cadastrado com sucesso!</p><br>';
        }
    }
}

?>

    <form class="container pt-5" name="cad-usuario" method="POST" action="">
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input type="text" name="full-name" id="form3Example1" class="form-control" value="<?php
                     if (isset($dados['full-name'])) {
                         echo $dados['full-name'];
                     } ?>"/>
                    <label class="form-label" for="form3Example1">Nome Completo</label>
                </div>
            </div>
            <!-- <div class="col">
                <div class="form-outline">
                    <input type="text" id="form3Example2" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                </div>
            </div> -->
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control" value="<?php
                     if (isset($dados['email'])) {
                         echo $dados['email'];
                     } ?>"/>
            <label class="form-label" for="form3Example3">Email</label>
        </div>

        <!-- Password input -->
        <!-- <div class="form-outline mb-4">
            <input type="password" id="form3Example4" class="form-control" />
            <label class="form-label" for="form3Example4">Password</label>
        </div> -->

        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
            <label class="form-check-label" for="form2Example33">
                Inscreva-se para receber as últimas notícias
            </label>
        </div>

        <!-- Submit button -->
        <input type="submit" name="send" class="btn btn-primary btn-block mb-4" value="Cadastrar">

        <!-- Register buttons -->
        <div class="text-center">
            <p>ou cadastrar com:</p>
            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div>
    </form>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</body>

</html>