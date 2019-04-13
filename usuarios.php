<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <form action="usuario_gravar.php" method="post" class="formulario">
        <h1>Cadastro de Usuários</h1>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Digite seu nome" name="name" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo de Usuário</label>
            <select class="form-control" id="tipo" name="tipo">
                <option value="1">Administrador</option>
                <option value="2">Cliente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control mask_phone" id="telefone" name="telefone" placeholder="( )     -     " required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu E-mail" required>
        </div>
        <div class="form-group">
            <label for="senha">Password</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </form>

    <?php
// Código responsável por buscar todos os usuários do banco de dados
include_once 'conexao.php';
$banco = new Conexao();

$sql = "SELECT U.*, T.DESCRICAO AS TIPO_USUARIO_DESCRICAO FROM usuarios U, tipo_usuario T WHERE T.ID = U.TIPO_USUARIO";
$usuarios = $banco->execute($sql);
?>

    <div class="listagem">
        <h1>Listagem de Usuários</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo de Usuário</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = $usuarios->fetch_object()) {?>
                <tr>
                    <th scope="row"><?php echo $usuario->ID; ?></th>
                    <td><?php echo $usuario->NOME; ?></td>
                    <td>
                        <?php echo $usuario->TIPO_USUARIO_DESCRICAO; ?>
                    </td>
                    <td><?php echo $usuario->TELEFONE; ?></td>
                    <td><?php echo $usuario->EMAIL; ?></td>
                    <td class="text-center">
                        <a href="usuario_excluir.php?id=<?php echo $usuario->ID; ?>" type="button" class="btn btn-danger" >Excluir</button>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <script src="plugins/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="plugins/jquery.mask.js"></script>
    <script>
    $('.mask_phone').mask('(99) 99999-9999');
    </script>
</body>

</html>