<?php
    session_start();
     
    require "Usuario.class.php";
    if(isset($_POST['email'])  ){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $conec = $contato = new Usuario();
        
        if ($conec) {

            $existo=$contato->checkUser($email);
            if ($existo) {
                echo "<script>
                    alert('Usuario ja cadastrado!')
                </script>";
            } else {
                $exito = $contato->insertUser($nome , $email , $senha);
                if ($exito) {
                    echo "<script>
                        alert('Usuario inserido com sucesso!')
                    </script>";
                    $id = $contato->getUserId($email);
                    $usuario = $contato->getUser($id);
                    $_SESSION['nome'] = $usuario['nome'];
                    $_SESSION['id'] = $usuario['id'];
                    header("location:index.php");
                } else {
                    echo "<script>
                        alert('Erro ao CADASTRAR usuario, tente novamente mais tarde!')
                    </script>";
                }
            }
            
        } else {
            echo "<script>
                alert('Erro ao conectar com o banco de dados, Tente novamente mais tarde!')
            </script>";
        }
    }

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>

    <div class="centraliza">
        <div class="formulario interna">
            <h3>Cadastrar</h3>
            <form action="" method="post">
                Nome:
                <input type="text" name = "nome" required class="i1">
                Email:
                <input type="text" name = "email" required class="i1">
                Senha:
                <input type="password" name = "senha" required class="i1">
                <div class=centra>
                    <input type="submit" name = "botao" value = "Enviar Dados" class = "otao">
                    <a href="login.php">Já tem conta? <b>entre</b></a>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>