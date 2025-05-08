<?php
$id = $_GET['id'];
require 'Usuario.class.php';
$usuario = new Usuario();
$excluir=$usuario->deleteUser($id);
if($excluir){
    echo "<script>
        alert('Usuario excluido com sucesso!')"
    ."</script>";
    header("location:index.php");
}else{
    echo "<script>
        alert('Não foi possível excluir o usuário, tente novamente!')"
    ."</script>";
    header("location:index.php");
}