<?php
if (isset($_POST['resPost'])) {
    $nome = $_POST['namePost'];
    $idade = $_POST['agePost'];
    $ocupacao = $_POST['occupationPost'];
    $service_url = 'http://127.0.0.1:5000/user/' . $nome;
    $curl = curl_init($service_url);
    $curl_post_data = array(
        'nome' => $nome,
        'idade' => $idade,
        'ocupacao' => $ocupacao
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
    $curl_response = curl_exec($curl);
    $teste = $curl_response;
    $teste = explode(" ", $teste);
    if ($teste[0] == '"Usu\u00e1rio') {
        $validaPost = false;
    } else {
        $validaPost = true;
    }
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

    <title>POST</title>
</head>

<body>
    <div class="col-md-3 mt-4 ml-4 mb-4 border">
        <?php
        if (@$validaPost == true) {
            ?>
            <h4 class="text-center">Cadastro realizado com Sucesso!</h4>
            <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
        <?php } elseif (isset($_POST['resPost']) && $validaPost == false) { ?>
            <h1 class="text-center">Usuário já existe!</h1>
            <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
        <?php } ?>
    </div>

</body>

</html>