<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>CRUD - Cadastrar</title>
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
					<a class="nav-link" href="#">MDB Blog</a>
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

    <!-- <h1>Cadastrar Usuário</h1> -->

    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
?>

    <!-- <form method="POST" action="processa.php">
        <label>Nome: </label>
        <input type="text" name="full-name" placeholder="Digite o nome completo"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite o seu melhor e-mail"><br><br>

        <input type="submit" value="Cadastrar">
    </form> -->

    <!-- Pills content -->
    <div class="tab-content p-5 m-5">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
            <form class="pt-5" method="POST" action="processa.php">
                <!-- <div class="text-center mb-3">
                    <p>Entrar com:</p>
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

                <p class="text-center">ou:</p> -->

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

                <!-- 2 column grid layout -->
                <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-3 mb-md-0">
                            <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                            <label class="form-check-label" for="loginCheck"> Lembra-me </label>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex justify-content-center">
                        <!-- Simple link -->
                        <a href="#!">Esqueceu a senha?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Não tem uma conta? <a href="#!">Cadastre-se</a></p>
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