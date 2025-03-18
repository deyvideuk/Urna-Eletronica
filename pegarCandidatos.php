<?php

    include("conexao.php");

    $stmt = $conexao->prepare("SELECT * FROM candidatos ORDER BY id ASC");
    $stmt->execute();
    $result_usuarios = $stmt->get_result();

    session_start();

    while($row = $result_usuarios->fetch_assoc()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['numero'] = $row['numero'];
        $_SESSION['url_foto'] = $row['url_foto'];
    }
?>