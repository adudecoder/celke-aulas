<?php
session_start();
include_once '../Models/conexao.php';
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

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="https://mdbgo.com/">
        <img
            src="https://www.php.net//images/logos/new-php-logo.svg"
            height="16"
            alt="MDB Logo"
            loading="lazy"
            style="margin-top: -1px;"
        />
        </a>

        <!-- Toggle button -->
        <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarButtonsExample"
        aria-controls="navbarButtonsExample"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Listagem de Usuários</a>
            </li>
        </ul>
        <!-- Left links -->

        <div class="d-flex align-items-center">
            <a href="../index.php" type="button" class="btn btn-primary me-3">
                Cadastrar
            </a>
        </div>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->

    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
?>

<?php

// Receber o número da página
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

// Quantidade de resultados por página
$qnt_result_pag = 2;

// Calcular o inicio da visualização
$inicio = ($qnt_result_pag * $pagina) - $qnt_result_pag;

$result_usuarios = "SELECT * FROM users LIMIT $inicio, $qnt_result_pag";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {
    echo '<div class"d-grid gap-3">';
    echo '<ul class="list-group list-group-light p-2">';
    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
    echo '<div>';
    echo '<div class="fw-bold">'.$row_usuario['full_name'].'</div>';
    echo '<div class="text-muted">'.$row_usuario['email'].'</div>';
    echo '</div>';
    echo '<div>';
    echo "<a type='button' href='../Views/editar.php?id=".$row_usuario['id']."' class='btn btn-success me-2'>Editar</a>";
    echo "<a type='button' href='../Controllers/proc_apagar_usuario.php?id=".$row_usuario['id']."' class='btn btn-danger'>Delete</a>";
    echo '</div>';
    echo '</li><hr>';
    echo '</ul>';
    echo '</div>';
}

// Paginação - Somar a quantidade de usuários
$result_pg = 'SELECT COUNT(id) AS num_result FROM users';
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
// echo $row_pg['num_result'];

// Quantidade de paginas
$qunatidade_pg = ceil($row_pg['num_result'] / $qnt_result_pag);

// Limitar quantidades de links anterior e proximo
// Primeiro ( 1 2 ) 3 ( 4 5 ) Último
$max_links = 2;
echo '<nav aria-label="...">';
echo '<ul class="pagination">';
echo '<li class="page-item">';
echo "<a class='page-link' href='../Views/tabela.php?pagina=1'>Primeira</a>";
echo '</li>';

for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; ++$pag_ant) {
    if ($pag_ant >= 1) {
        echo "<a class='page-link' href='../Views/tabela.php?pagina=$pag_ant'>$pag_ant</a>";
    }
}

echo "$pagina";

for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; ++$pag_dep) {
    if ($pag_dep <= $qunatidade_pg) {
        echo "<a class='page-link' href='../Views/tabela.php?pagina=$pag_dep'>$pag_dep</a>";
    }
}

echo '<li class="page-item">';
echo "<a class='page-link' href='../Views/tabela.php?pagina=$qunatidade_pg'>Última</a>";
echo '</li>';
echo '</ul>';
echo '</nav>';
?>

    <!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
	></script>

</body>

</html>