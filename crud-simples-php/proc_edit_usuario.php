<?php

session_start();
include_once 'conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// echo "Nome: $nome <br>";
// echo "E-mail: $email <br>";

$result_usuario = "UPDATE users SET full_name='$nome', email='$email', updated_at=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)) {
    $_SESSION['msg'] = "
    <div class='alert alert-primary d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
        <div>
            Usuário Editado com sucesso!
        </div>
    </div>
    ";
    header('Location: tabela.php');
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
    header("Location: editar.php?id=$id");
}
