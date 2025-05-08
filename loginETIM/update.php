<?php
    require 'Usuario.class.php';
    $usuario = new Usuario();
    $id = $_GET['id'];
    $dados = $usuario->getUser($id);

    if( isset($_POST['email']) ){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $conec = $contato = new Usuario();
        
        if ($conec) {
            $contato->updateUser($id, $nome, $email, $senha);
            header("location:index.php");
            
            
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
    <title>Update</title>
</head>
<body>

    <div class="centraliza">
        <div class="formulario interna">
            <h3>Altere os dados de <?php echo $dados['nome']?></h3>
            <form action="" method="post">
                Nome:
                <input type="text" name = "nome" required class="i1" value = "<?php echo $dados['nome'];?>">
                Email:
                <input type="text" name = "email" required class="i1" value="<?php echo $dados['email'];?>">
                Senha:
                <input type="text" name = "senha" required class="i1" value="<?php echo $dados['senha'];?>">  
                <div class="centra">
                    <input type="submit" name = "botao" value = "Enviar Dados" class = "otao">
                    <a href="index.php">Voltar</a>
                </div>
                
            </form>
        </div>
    </div>    
</body>
</html>