<?php

include_once "./UsuarioModel.php";

class UsuarioDAO{
    
    public function create(UsuarioModel $usuario)
    {
        try 
        {
            $cmdSQL = "INSERT INTO usuario (nome, email, telefone, senha, usu_status) 
            VALUES (:nome, :email, :telefone, SHA2(:senha, 512), :usu_status)";

            $stmt = Conexao::getConexao()->prepare($cmdSQL);
            $stmt->bindValue(":nome", $usuario->getNome());
            $stmt->bindValue(":email", $usuario->getEmail());
            $stmt->bindValue(":telefone", $usuario->getTelefone());
            $stmt->bindValue(":senha", $usuario->getSenha());
            $stmt->bindValue(":usu_status", $usuario->getUsu_status());

            return $stmt->execute();
        } 
        catch (Exception $e) 
        {
            print "Erro ao salvar o usuario <br>" . $e . '<br>';
        }
    }

    public function read(UsuarioModel $usuario)
    {
        try 
        {
            // Filtro baseado no nome, usando like, pode passar o parametro de outra forma se achar melhor
            $sql = "SELECT * FROM usuario WHERE nome LIKE '%". $usuario->getNome() ."%'";
            $result = Conexao::getConexao()->query($sql);
            $lista = array();
            while( $linha = $result->fetch(PDO::FETCH_ASSOC ))
            {
                $lista['id'] = $linha['id'];
                $lista['nome'] = $linha['nome'];
                $lista['email'] = $linha['email'];
                $lista['telefone'] = $linha['telefone'];
                $lista['senha'] = $linha['senha'];
                $lista['status'] = $linha['usu_status'];
            }
            return $lista;
        }
        catch (Exception $e)
        {
            print "Erro ao pesquisar." . $e;
        }
    }

    public function read2()
    {        
        try 
        {
            $sql = "SELECT * FROM usuario";
            $result = Conexao::getConexao()->query($sql);
            $lista = array();
            while($linha = $result->fetch(PDO::FETCH_ASSOC))
            {
                $objUsuario = new UsuarioModel();
                $objUsuario->setId( $linha['id'] );
                $objUsuario->setNome( $linha['nome'] );
                $objUsuario->setEmail( $linha['email'] );
                $objUsuario->setTelefone( $linha['telefone'] );
                $objUsuario->setSenha( $linha['senha'] );
                $objUsuario->setUsu_status( $linha['usu_status'] );
                array_push($lista, $objUsuario);
            }
            return $lista;
        }
        catch (Exception $e)
        {
            print "Erro ao pesquisar." . $e;
        }
    }

    public function update(UsuarioModel $usuario)
    {
        try
        {
            $cmdSQL = "UPDATE usuario SET nome = :paramNome,
                                        email = :paramEmail,
                                        telefone = :paramTelefone,
                                        senha = :paramSenha,
                                        usu_status = :paramUsu_status
                        WHERE id = :paramId";
            
            $stmt = Conexao::getConexao()->prepare( $cmdSQL );

            $stmt->bindValue(":paramNome", $usuario->getNome());
            $stmt->bindValue(":paramEmail", $usuario->getEmail());
            $stmt->bindValue(":paramTelefone", $usuario->getTelefone());
            $stmt->bindValue(":paramSenha", $usuario->getSenha());
            $stmt->bindValue(":paramUsu_status", $usuario->getUsu_status());
            $stmt->bindValue(":paramId", $usuario->getId());

            return $stmt->execute();
        }
        catch (Exception $e)
        {
            print "Erro ao atualizar <br> $e <br>";
        }
    }

    public function delete(UsuarioModel $usuario)
    {
        try
        {
            $cmdSQL = "DELETE FROM usuario WHERE id = :paramId";
            
            $stmt = Conexao::getConexao()->prepare( $cmdSQL );
            $stmt->bindValue(":paramId", $usuario->getId());

            return $stmt->execute();
        }
        catch (Exception $e)
        {
            print "Erro ao deletar <br> $e <br>";
        }
    }
            
 }

 ?>