<?php
session_start();
include_once 'conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM users WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Usuários</title>
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
    <!-- <a href="cad_usuario.php">Cadastrar</a><br>
    <a href="index.php">Listar</a><br> -->
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
	<!-- Container wrapper -->
		<div class="container">
			<!-- Navbar brand -->
			<a class="navbar-brand me-2" href="https://mdbgo.com/">
			<img
				src="https://picsum.photos/1000/500/?blur"
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
					<a class="nav-link" href="#">Editar Usuário</a>
					</li>
				</ul>
				<!-- Left links -->

				<div class="d-flex align-items-center">
					<button type="button" class="btn btn-link px-3 me-2">
						<a href="tabela.php">Listagem</a>
					</button>
					<button type="button" class="btn btn-primary me-3">
						Cadastre-se Grátis
					</button>
					<a
					class="btn btn-dark px-3"
					href="https://github.com/mdbootstrap/mdb-ui-kit"
					role="button"
					><i class="fab fa-github"></i
					></a>
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
    <!-- <form method="POST" action="proc_edit_usuario.php">
        <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

        <label>Nome: </label>
        <input type="text" name="full-name" placeholder="Digite o nome completo"
            value="<?php echo $row_usuario['full_name']; ?>"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite o seu melhor e-mail"
            value="<?php echo $row_usuario['email']; ?>"><br><br>

        <input type="submit" value="Editar">
    </form> -->

    <form method="POST" action="proc_edit_usuario.php" class="m-5">
		<input type="hidden" id="form1Example1" name="id" class="form-control" value="<?php echo $row_usuario['id']; ?>" />

        <!-- Name input -->
        <div class="form-outline mb-4">
            <input type="text" id="form1Example1" name="full-name" class="form-control" value="<?php echo $row_usuario['full_name']; ?>" />
            <label class="form-label" for="form1Example1">Nome Completo</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form1Example2" name="email" class="form-control" value="<?php echo $row_usuario['email']; ?>"/>
            <label class="form-label" for="form1Example2">Email</label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>

	<!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
	></script>
</body>

</html>