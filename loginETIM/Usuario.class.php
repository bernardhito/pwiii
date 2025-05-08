<?php



class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    function getId(){
        return $this->id;
    }
    function getNome(){
        return $this->nome;
    }
    function getEmail(){
        return $this->email;
    }
    function getSenha(){
        return $this->senha;
    }

    function setNome($nome){
        $this->nome = $nome;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }

    function __construct(){
      
        $dsn    = "mysql:dbname=usuarioetimpwiii;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass);
           return true;             
        } catch (\Throwable $problema) {
            return false;
               
        } 
    }

   
    function insertUser($nome, $email, $senha){
        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s";

        $sql = $this->pdo->prepare($sql);
        
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);


        return $sql->execute();
    }

    function checkUserPass($email, $senha){
        $sql = "SELECT *FROM usuarios WHERE email = :e AND senha =:s";
        $sql = $this->pdo->prepare($sql);
        
        $sql-> bindValue(":e", $email);
        $sql-> bindValue(":s", $senha);
        $sql->execute();
        
        if( $sql->rowCount() > 0 ){
            return true;           
        }else{
            return false;
        }

    }

    
    function checkUser($email){
        $sql = "SELECT *FROM usuarios WHERE email = :e";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":e", $email);
        $sql->execute();

        if( $sql->rowCount() > 0 ){
            return true;           
        }else{
            return false;
        }

        
    }

    function getUserId($email){
        $sql = "SELECT *FROM usuarios WHERE email = :e";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":e", $email);
        $sql->execute();
        $id = $sql->fetch();
        return $id['id'];
    }
    
    function getUser($id){
        $sql = "SELECT *FROM usuarios WHERE id = :i";
        $sql = $this->pdo->prepare($sql);

        $sql-> bindValue(":i", $id);
        $sql->execute();
        return $sql->fetch();
    }
    
    function getAllUsers(){
        $sql = "SELECT *FROM usuarios";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();
        return $sql->fetchAll();
    }

    function deleteUser($id){
        $sql = "DELETE FROM usuarios WHERE id = :i";
        $sql = $this->pdo->prepare($sql);
        $sql-> bindValue(":i", $id);
        return $sql->execute();
    }

    function updateUser($id, $nome, $email, $senha){
        $sql = "UPDATE usuarios SET nome = :n, email = :e, senha = :s WHERE id = :i";
        $sql = $this->pdo->prepare($sql);
        
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);
        $sql->bindValue(":i", $id);

        return $sql->execute();
    }
}
