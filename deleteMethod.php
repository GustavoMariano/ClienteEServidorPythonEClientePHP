<?php
if (isset($_POST['resDel'])) {
    $nome = $_POST['nameDelete'];
    $service_url = 'http://127.0.0.1:5000/user/' . $nome;
    $ch = curl_init($service_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $curl_post_data = array(
        'nome' => $nome
    );
    $response = curl_exec($ch);
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

    <title>Delete</title>
</head>

<body>
    <div class="col-md-3 mt-4 ml-4 border">
        <?php if (@$response) { ?>
            <h4 class="text-center mt-4 ml-4 mb-4 ">Usuário removido com sucesso!</h4>
            <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
        <?php } ?>
    </div>

</body>

</html>