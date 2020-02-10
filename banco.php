<?php
define('HOST', 'localhost');
define('USUARIO', 'vipgol_login');
define('SENHA', '994118baskara');
define('DB', 'vipgol_login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');