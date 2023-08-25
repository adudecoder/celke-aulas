<?php
session_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Listagem de Usuários</title>
    <!-- Font Awesome -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
	rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	rel="stylesheet"
	/>
	<!-- MDB -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
	rel="stylesheet"
	/>

</head>

<body>

    <a href="index.php">Cadastrar</a><br>
    <a href="listar.php">Listar</a><br>
    <h1>Listar Usuários</h1>

    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

$qnt_result_pag = 2;

// Calcular o inicio da visualização
$inicio = ($qnt_result_pag * $pagina) - $qnt_result_pag;

$result_usuarios = "SELECT * FROM users LIMIT $inicio, $qnt_result_pag";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
    echo 'ID: '.$row_usuario['id'].'<br>';
    echo 'Nome Completo: '.$row_usuario['full_name'].'<br>';
    echo 'Email: '.$row_usuario['email'].'<br><hr>';
}

// Paginação - Somar a quantidade de usuários
$result_pg = 'SELECT COUNT(id) AS num_result FROM users';
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
// echo $row_pg['num_result'];

// Quantidade de paginas
$qunatidade_pg = ceil($row_pg['num_result'] / $qnt_result_pag);

// Limitar quantidades de links anterior e proximo
$max_links = 2;
echo "<a href='listar.php?pagina=1'>Anterior</a>";

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; ++$pag_ant) {
    if ($pag_ant >= 1) {
        echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a>";
    }
}

echo "$pagina";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; ++$pag_dep) {
    if ($pag_dep <= $qunatidade_pg) {
        echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a>";
    }
}

echo "<a href='listar.php?pagina=$qunatidade_pg'>Proxima</a>";
?>


    <!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
	></script>

</body>

</html>