<!DOCTYPE html>
<html>
    <head>
        <title>
            SITE COM BANCO DE DADOS MYSQL
        </title>
    </head>
    <body>
        <p> FORMULÁRIO PARA CADASTRO </P>
        <form action="UsuarioController.php"
             method="POST">
             <label>ID:</label>
             <input type="number" name="id" value="" require />
            <br> <label>NOME:</label>
            <input type="text" name="nome" value=""
                     require />
            <br><label>E-MAIL:</label>
            <input type="email" name="email" value=""
                     require />
            <br><label>SENHA:</label>
            <input type="password" name="senha" value=""
                     require />
            <br>
            <input type="submit" name="cadastrar"
                  value="CADASTRAR">
            <input type="submit" name="atualizar"
            value="MUDAR">
        </form>
    </body>
</html>