<?php

include_once "./Conexao.php";
include_once "./UsuarioModel.php";
include_once "./UsuarioDAO.php";

$usuario = new UsuarioModel();
$usuariodao = new UsuarioDAO();

$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar']))
{
    //echo "<script>alert('oi');</script>"; linha para teste
    $usuario->setNome($d['nome']);
    $usuario->setEmail($d['email']);
    $usuario->setTelefone($d['telefone']);

    if($d['senha'] === $d['confirmar'])
        {
            $usuario->setSenha($d['senha']);

        }else{
            echo "A senha e a confirmação de senha são diferentes";
        }

        if(isset($_POST['ativo']))
        {
            $usuario->setUsu_status('ativo');
        }
        if(isset($_POST['inativo']))
        {
            $usuario->setUsu_status('inativo');
        }
   
    $usuariodao->create($usuario);
    echo "Cadastro realizado com sucesso!";
}

if(isset($_POST['consultar']))
{
    //Envia somente o nome na consulta
    $usuario->setNome($_POST['nome']);

    //Pega o resultado no array
    $resultadoConsulta = array();
    $resultadoConsulta = $usuariodao->read($usuario);

    //Faz a leitura de item a item
    foreach ($resultadoConsulta as $chave => $valor) {
        echo nl2br($chave . " - " . $valor . " \n ");
    }
}

if(isset($_POST['atualizar']))
{
    $usuario->setId($_POST['id']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setTelefone($_POST['telefone']);
            
    if($_POST['senha'] === $_POST['confirmar'])
        {
            $usuario->setSenha($_POST['senha']);

        }else{
            echo "A senha e a confirmação de senha são diferentes";
        }

        if(isset($_POST['ativo']))
        {
           $usuario->setUsu_status('ativo');
        }
        if(isset($_POST['inativo']))
        {
            $usuario->setUsu_status('inativo');
        }

    $usuariodao->update($usuario);
    echo "Cadastro alterado com sucesso!";
}

if(isset($_POST['deletar']))
{
    $usuario->setId($_POST['id']);

    $usuariodao->delete($usuario);
    echo "Cadastro deletado com sucesso!";
}

?>