<?php
    require_once 'CLASSE/usuarios.php';
    $u = new Usuario;

?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="CSS/estilo.css">
    <title>Projeto Login</title>
</head>
<body>
<div id="corpo-form-cad">
    <h1>CADASTRAR</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome" maxlength="30">
        <input type="text" name="telefone"placeholder="Telefone" maxlength="14">
        <input type="email" name="email" placeholder="Usuario" maxlength="40">
        <input type="password" name="senha" placeholder="senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="confimarSenha" maxlength="15">               
        <input type="submit" placeholder="Cadastrar">
    </form>
</div>
<?php
if (isset($POST['nome']))
{
    $nome = addslashes($POST['nome']);
    $telefone = addslashes($POST['telefone']);
    $email = addslashes($POST['email']);
    $senha = addslashes($POST['senha']);
    $confimarSenha = addslashes($POST['confsenha']);
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confimarSenha))
    {
        $u->conectar("projeto_logim","localhost","root","");
        if($su->$mdgErro == "")
        {
            if($senha == $confimarSenha)
            {   
               
            $u->cadastrar($nome,$telefone,$email,$senha);
            }
            else
            {
                echo "senha e conf denha nao corresponde";
            }
        }    
        else
        {
            echo "Erro: ".$u->msgErro;
        } 

}
else
{
    echo "preencha todos campos";
} }

?>
</body>
</html>