<?php
include_once '../Models/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Pesquisar Usuários</title>
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
            <a class="nav-link fw-bold" href="#">Pesquisar Usuários</a>
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

	<form class="pt-5" method="POST" action="">

		<!-- Name input -->
		<div class="form-outline mb-4">
			<input type="name" name="full-name" id="loginName" class="form-control" />
			<label class="form-label" for="loginName">Nome Completo</label>
		</div>

		<!-- Submit button -->
		<button name="send" type="submit" class="btn btn-primary btn-block mb-4">Pesquisar</button>
	</form>

		<?php
if (isset($_POST['send'])) {
    $name = filter_input(INPUT_POST, 'full-name', FILTER_SANITIZE_SPECIAL_CHARS);
    $result_usuario = "SELECT * FROM users WHERE full_name LIKE '%$name%'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)) {
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
}
?>

		<!-- MDB -->
		<script
		type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
		></script>
	</body>
</html>
