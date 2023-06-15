<?php

class UsuarioDAO{
    
    public function create(UsuarioModel $usuario)
    {
        try 
        {
            $sql = "INSERT INTO usuario (nome, email) VALUES (:nome, :email)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());

            return $p_sql->execute();
        } 
        catch (Exception $e) 
        {
            print "Erro ao salvar o usuario <br>" . $e . '<br>';
        }
    }

    public function read()
    {
        try 
        {
            $sql = "SELECT * FROM usuario order by nome asc";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $lst) 
            {
                $f_lista[] = $this->listaUsuarios($lst);
            }
            return $f_lista;
        }
        catch (Exception $e)
        {
            print "Erro ao pesquisar." . $e;
        }
    }
     
    public function update(Usuario $usuario)
    {
        try
        {
            $sql = "UPDATE usuario set nome=:nome, email=:email WHERE id = :id";
            
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":nome", $usuario->getNome());
            $p_sql->bindValue(":email", $usuario->getEmail());

            return $p_sql->execute();
        }
        catch (Exception $e)
        {
            print "Erro ao atualizar <br> $e <br>";
        }
    }
    public function delete(Usuario $usuario)
    {
        try
        {
            $sql = "DELETE FROM usuario WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $usuario->getId());
            return $p_sql->execute();
        }
        catch (Exception $e)
        {
            echo "Erro ao Excluir <br> $e <br>";
        }
    }
    private function listaUsuarios($row)
    {
        $usuario = new Usuario();
        $usuario->setId($row['id']);
        $usuario->setNome($row['nome']);
        $usuario->setEmail($row['email']);

        return $usuario;
    }
 }

 ?>