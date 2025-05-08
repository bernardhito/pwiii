<?php
session_start();
require 'Usuario.class.php';
if( isset( $_SESSION['nome'])){
    $nome = $_SESSION['nome'];
    $id = $_SESSION['id'];
}else{
    header("location:login.php");
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserTables</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Tabela de Usuarios</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Excluir</th>
            <th>Editar</th>
        </tr>
        <?php
            $usuario = new Usuario();
            $allUsers = $usuario->getAllUsers();
            foreach($allUsers as $user){
                if($user['id'] == $id){
                    $editId = $user['id'];
                    echo "<tr>";
                    echo "<td class='destaque'>".$user['nome']."</td>";
                    echo "<td class='destaque'>".$user['email']."</td>";
                    echo "<td class='destaque'>".$user['senha']."</td>";
                    echo "<td class='destaque'><a href='delete.php?id=".$user['id']."'>Excluir</a></td>";
                    echo "<td class='destaque'><a href='update.php?id=".$user['id']."'>Editar</a></td>";
                    echo "</tr>";
                }else{
                    $editId = $user['id'];
                    echo "<tr>";
                    echo "<td>".$user['nome']."</td>";
                    echo "<td>".$user['email']."</td>";
                    echo "<td>".$user['senha']."</td>";
                    echo "<td><a href='delete.php?id=".$user['id']."'>Excluir</a></td>";
                    echo "<td><a href='update.php?id=".$user['id']."'>Editar</a></td>";
                    echo "</tr>";
                }
                
            }?>
    </table>
</body>
</html>
