<?php
     if(isset($_POST['cadastrar'])){
     include("../conexao.php"); // Certifique-se de incluir a conexão com o banco

     $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
     $numero = mysqli_real_escape_string($conexao, $_POST['numero']);

     // if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
     //      $foto = $_FILES['foto'];

     //      // Obtém a extensão do arquivo
     //      $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

     //      // Verifica se a extensão é permitida (opcional, mas recomendável)
     //      $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
     //      if (!in_array($extensao, $extensoes_permitidas)) {
     //           echo "<script>alert('Formato de arquivo inválido! Apenas JPG, JPEG, PNG e GIF são permitidos.');</script>";
     //           exit();
     //      }

     //      // Define um novo nome único para o arquivo
     //      $novo_nome = md5(time()) . "." . $extensao;
     //      $diretorio = "images/candidatos/";

     //      // Move o arquivo para o diretório
     //      if(move_uploaded_file($foto['tmp_name'], $diretorio.$novo_nome)){
     //           // Insere no banco de dados
     //           $sql = "INSERT INTO candidatos (nome, numero, foto) VALUES ('$nome', '$numero', '$novo_nome')";
     //           $resultado = mysqli_query($conexao, $sql);

     //           if($resultado){
     //                echo "<script>alert('Candidato cadastrado com sucesso!');</script>";
     //           } else {
     //                echo "<script>alert('Erro ao cadastrar candidato!');</script>";
     //           }
     //      } else {
     //           echo "<script>alert('Erro ao fazer upload da imagem!');</script>";
     //      }
     // } else {
     //      echo "<script>alert('Nenhuma imagem foi enviada!');</script>";
     // }
     // }

     if(isset($_POST['cadastrar'])){
      
          $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
          $numero = mysqli_real_escape_string($conexao, $_POST['numero']);
      
          // Verifica se o arquivo foi enviado
          if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0){
              $foto = $_FILES['foto'];
      
              // Verifica a extensão do arquivo
              $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
              $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
      
              if (!in_array($extensao, $extensoes_permitidas)) {
                  echo "<script>alert('Formato de arquivo inválido!');</script>";
                  exit();
              }
      
              // Define um nome único para o arquivo
              $novo_nome = md5(time()) . "." . $extensao;
              $diretorio = "../images/candidatos/";
      
              // Verifica se o diretório existe e tem permissões corretas
              if (!is_dir($diretorio)) {
                  echo "<script>alert('O diretório não existe.');</script>";
                  exit();
              }
      
              // Tenta mover o arquivo
              if (move_uploaded_file($foto['tmp_name'], $diretorio . $novo_nome)) {
                  // Insere no banco de dados
                  $sql = "INSERT INTO candidatos (nome, numero, url_foto) VALUES ('$nome', '$numero', '$novo_nome')";
                  $resultado = mysqli_query($conexao, $sql);
      
                  if($resultado){
                      echo "<script>alert('Candidato cadastrado com sucesso!');</script>";
                      header("Location: /index.php"); // Redireciona para a página inicial
                      exit(); // Evita que o código continue após o redirecionamento
                  } else {
                      echo "<script>alert('Erro ao cadastrar candidato!');</script>";
                  }
              } else {
                  echo "<script>alert('Erro ao mover a imagem!');</script>";
              }
          } else {
              echo "<script>alert('Nenhuma imagem foi enviada ou ocorreu um erro no upload!');</script>";
          }
      }
      
} 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Urna Eleitoral - Uninassau</title>
     <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="cadastroStyle.css">
</head>

     <body>

          <div class="nassau">
               <div class="area-nassau">
                    <img src="../images/uninassau-logo.png" alt="Logo da Uninasau">
               </div>
          </div>
          
          <form action="cadastro.php" method="post" enctype="multipart/form-data">
               <p> Faça seu cadastro para Presidente: </p>

               <label for= "Nome do candidato"> Nome<input type="text" maxlength="50" id= "Nome" name="nome" /> </label>

               <label for= "Numero da candidatura"> Número da candidatura<input type="number" id="Numero da candidatura" name="numero" maxlength="2" /> </label>

               <label class="picture" tabindex="0">

               <input type="file" accept="" id= "picture__input" name="foto"/>

               <span class="picture__image"></span> > </label>


               <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar" />
          

          </form>
       
          <div class="btn-cadastro">
            <a href="../index.php">Cancelar Cadastro</a>
          </div>

     </body> 
</html>
