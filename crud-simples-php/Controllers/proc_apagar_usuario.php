<?php

session_start();
include_once '../Models/conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $result_usuario = "DELETE FROM users WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "
        <div class='alert alert-primary d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
            <div>
                Usuário deletado com sucesso!
            </div>
        </div>
        ";
        header('Location: Views/tabela.php');
    } else {
        $_SESSION['msg'] = "
        <div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
            <div>
                Usuário não foi deletado com sucesso!
            </div>
        </div>
        ";
        header("Location: Views/tabela.php?id=$id");
    }
} else {
    $_SESSION['msg'] = "
        <div class='alert alert-warning d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Info:'><use xlink:href='#info-fill'></svg>
            <div>
                Necessário selecionar um usuário
            </div>
        </div>
        ";
    header("Location: Views/tabela.php?id=$id");
}
