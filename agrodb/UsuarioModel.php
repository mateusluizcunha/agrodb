<?php

class UsuarioModel
{
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    private $usu_status;
    
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }

    function getNome()
    {
        return $this->nome;
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }

    function getTelefone()
    {
        return $this->telefone;
    }
    function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    function getSenha()
    {
        return $this->senha;
    }
    function setSenha($senha)
    {
        $this->senha = $senha;
    }
    
    function getUsu_status()
    {
        return $this->usu_status;
    }   
    function setUsu_status($usu_status)
    {
        $this->usu_status = $usu_status;
    }
}

?>