<?php
if (isset($_POST['resGet'])) {
    $nome = $_POST['nameGet'];
    @$acesso = file_get_contents('http://127.0.0.1:5000/user/' . $nome);
    $retorno = json_decode($acesso);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>GET</title>
</head>

<body>
    <div class="col-md-3 mt-4 ml-4 mb-4 border">
        <?php if (@$retorno != NULL && isset($_POST['resGet'])) { ?>
            <div class="form-group text-center">
                <label>Nome</label>
                <input name="nome" readonly type="text" class="form-control" value="<?php echo $retorno->nome; ?>">
            </div>
            <div class="form-group text-center">
                <label>Idade</label>
                <input name="idade" readonly type="text" class="form-control" value="<?php echo $retorno->idade; ?>">
            </div>
            <div class="form-group text-center">
                <label>Ocupação</label>
                <input name="ocupacao" readonly type="text" class="form-control" value="<?php echo $retorno->ocupacao; ?>">
            </div>
            <a href="index.php" class=" btn btn-block btn-success mb-4">Voltar</a>

        <?php } elseif (@$retorno == NULL && isset($_POST['resGet'])) { ?>
            <h4 class="text-center">Usuário não encontrado!</h4>
            <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
        <?php } ?>
    </div>

</body>

</html>