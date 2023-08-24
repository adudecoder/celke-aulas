<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$dbname = 'crud_simples';

// Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

// Verificar a conexão
if (!$conn) {
    exit('Conexão falhou: '.mysqli_connect_error());
}

echo 'Conexão bem-sucedida!';
