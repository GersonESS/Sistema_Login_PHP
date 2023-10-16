<?php
Class Usuario
{
    private $pso;
    public $msgErro = "";
    public function conectar($nome, $host, $usurio, $senha)
    {
        global $pdo; 
        try {

        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,usuario,senha);

         }  catch(PDOException $e) {
            $msErro = $e->getMessage();
         }  
    }
    public function cadastrar()
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if ($sql->rowCount() > 0)
        {
            return false;
        }
        else 
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (n:, t:, e:, s:)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",$senha);
            $sql->execute();
            return true;
        }
    }
    public function logar($email, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha =:s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        if($sql->rowCount() > 0) 
        { 
            $dado = $sql->feth();
            $_session['id_usuario'] = $dado['id_usuario'];
            return true;
        }
            else
            {
                return false;
            }
        }
    }

?>