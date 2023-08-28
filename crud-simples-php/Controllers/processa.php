<?php

session_start();
include_once '../Models/conexao.php';

$fullName = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$result_usuario = "INSERT INTO users (full_name, email, created_at) VALUES ('$fullName', '$email', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_insert_id($conn)) {
    $_SESSION['msg'] = "
        <div class='alert alert-primary d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
            <div>
                Usuário cadastrado com sucesso!
            </div>
        </div>
        ";
    header('Location: ../Views/tabela.php');
} else {
    $_SESSION['msg'] = "
        <div class='alert alert-primary d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
            <div>
                Usuário não cadastrado com sucesso!
            </div>
        </div>
        ";
    header('Location: index.php');
}
