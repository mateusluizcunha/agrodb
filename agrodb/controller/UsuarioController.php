<?php
include_once "./Conexao.php";
include_once "./UsuarioModel.php";
include_once "./UsuarioDAO.php";

$usuario = new UsuarioModel();
$usuariodao = new UsuarioDAO();

$d = filter_input_array(INPUT_POST);

if(isset($_POST['cadastrar'])){

    $usuario->setNome($d['nome']);
    $usuario->setEmail($d['email']);

    $usuariodao->create($usuario);

    header("Location: ../../");
} 

else if(isset($_POST['editar'])){

    $usuario->setNome($d['nome']);
    $usuario->setEmail($d['email']);

    $usuariodao->update($usuario);

    header("Location: ../../");
}

else if(isset($_GET['del'])){

    $usuario->setId($_GET['del']);

    $usuariodao->delete($usuario);

    header("Location: ../../");
}else{
    header("Location: ../../");
}