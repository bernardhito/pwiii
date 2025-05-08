<?php

    
    session_start();
     
    require "Usuario.class.php";
   
    if(isset($_POST['email'])  ){

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $conec = $contato = new Usuario();
        
        if ($conec) {
            // echo "<script>
            //             alert('conecto')
            //         </script>";
            $existo=$contato->checkUser($email);
            if ($existo) {
                // echo "<script>
                //     alert('achou')
                // </script>";
                $exito = $contato->checkUserPass($email , $senha);
                if ($exito) {
                    // echo "<script>
                    //     alert('acertou a senha')
                    // </script>";
                    $id = $contato->getUserId($email);
                    // echo "<script>
                    //     alert('$id')
                    // </script>";
                    $usuario = $contato->getUser($id);
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
                    header("location:index.php");
                    
                } else {
                    echo "<script>
                        alert('Erro ao logar, senha incorreta!')
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Usuario não encontrado!')
                </script>";
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
    <title>Login</title>
</head>
<body>

    <div class="centraliza">
        <div class="formulario interna">
            <h3>Login</h3>
            <form action="" method="post">
                Email:
                <input type="text" name = "email" required class="i1">
                Senha:
                <input type="password" name = "senha" required class="i1">  
                <div class="centra">
                    <input type="submit" name = "botao" value = "Enviar Dados" class = "botao">
                    <a href="cadastrar.php">Não tem conta? <b>registre-se</b></a>
                </div>
                
            </form>
        </div>
    </div>    
</body>
</html>