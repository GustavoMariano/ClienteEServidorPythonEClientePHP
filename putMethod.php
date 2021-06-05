<?php

if (isset($_POST['resPut'])) {
    $nome = $_POST['nomePut'];
    $idade = $_POST['idadePut'];
    $ocupacao = $_POST['ocupacaoPut'];
    $service_url = 'http://127.0.0.1:5000/user/' . $nome;
    $ch = curl_init($service_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    $data = array(
        'nome' => $nome,
        'idade' => $idade,
        'ocupacao' => $ocupacao
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response2 = curl_exec($ch);
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

    <title>PUT</title>
</head>

<body>
    <div class="col-md-3 mt-4 ml-4 mb-4 border">
        <?php
        if (isset($_POST['segundaTelaPut'])) { ?>
            <?php
                $nome = $_POST['namePut'];
                @$acesso = file_get_contents('http://127.0.0.1:5000/user/' . $nome);
                $retorno = json_decode($acesso);
                if ($retorno == NULL) {
                    ?>
                <h4 class="text-center">Usuário não encontrado!</h4>
                <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
            <?php } else { ?>
                <form action="putMethod.php" method="POST" >
                    <div class="form-group">
                        <label>Nome</label>
                        <input name="nomePut" readonly type="text" class="form-control" value="<?php echo $retorno->nome; ?>">
                    </div>
                    <div class="form-group">
                        <label>Idade</label>
                        <input name="idadePut" type="text" class="form-control" value="<?php echo $retorno->idade; ?>">
                    </div>
                    <div class="form-group">
                        <label>Ocupação</label>
                        <input name="ocupacaoPut" type="text" class="form-control" value="<?php echo $retorno->ocupacao; ?>">
                    </div>
                    <br>
                    <button name="resPut" type="submit" class="btn btn-block btn-success mb-4">POST</button>
                </form>
            <?php } ?>
        <?php }
        if (@$response2) { ?>
            <h4 class="text-center">Usuário alterado com sucesso!</h4>
            <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
        <?php }
        ?>
    </div>

</body>

</html>