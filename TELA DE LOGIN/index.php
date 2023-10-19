<!DOCTYPE html>
<?php
require_once 'CLASSE/usuarios.php';
$u = new Usuario;
?>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="CSS/estilo.css">
    <title>Projeto Login</title>
</head>
<body>
<div id="corpo-form">
    <h1>ENTRAR</h1>
    <form method="POST">
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="senha" name="senha">
        <input type="submit" placeholder="Acessar">
        <a href="cadastrar.php" > Ainda não e incrito?  <strong>Cadastre-se</a>
    </form>
</div>
<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("projeto_login","localhost","root","");
        if($u->logar($email,$senha))
        {
            header("location: AreaPrivada.php");
        }
        else 
        {
            ?>
            <div class="msg-erro">
            Email e/ou senha estão incorretos!
            </div>
            <?php
        }
    }
}

?>
</body>
</html>