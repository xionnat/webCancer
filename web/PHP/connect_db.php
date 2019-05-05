<?php

// Conecta ao BD
$conexao = new mysqli("localhost", "root", "", "ren-chon_db");

// Deu erro ao conectar?
if ($conexao->connect_error) {
  echo "Erro de Conexão!<br>".$conexao->connect_error;
}

?>