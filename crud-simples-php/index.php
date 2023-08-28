<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>CRUD - Cadastrar Usuário</title>
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
					<a class="nav-link fw-bold" href="#">CRUD PHP + Material Bootstrap</a>
					</li>
				</ul>
				<!-- Left links -->

				<div class="d-flex align-items-center">
					<button type="button" class="btn btn-link px-3 me-2">
						<a href="Views/tabela.php">Listagem</a>
					</button>
					<button type="button" class="btn btn-link px-3 me-2">
						<a href="Views/pesquisar.php">Pesquisar</a>
					</button>
					<button type="button" class="btn btn-primary me-3">
						<a href="index.php"></a>
						Cadastrar
					</button>
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

    <!-- Pills content -->
    <div class="tab-content p-5 m-5">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

		<div class="text-center">
			<div class="card-body">
				<h1 class="card-title">Cadastrar Usuário</h1>
			</div>
		</div>

            <form class="pt-5" method="POST" action="./Controllers/processa.php">

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="name" name="full-name" id="loginName" class="form-control" />
                    <label class="form-label" for="loginName">Nome Completo</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="loginEmail" class="form-control" />
                    <label class="form-label" for="loginEmail">Email</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Cadastrar</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Já tem uma conta? <a href="#!">Entrar</a></p>
                </div>
            </form>
        </div>
    </div>
    <!-- Pills content -->

	<!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
	></script>
</body>

</html>