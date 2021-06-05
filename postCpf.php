<?php
if (isset($_POST['btnCpfPost'])) {
    $cpf = $_POST['cpfPostt'];
    $service_url = 'http://127.0.0.1:5000/cpf/' . $cpf;
    $curl = curl_init($service_url);
    $curl_post_data = array(
        'cpf' => $cpf,
    );    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
    $curl_response = curl_exec($curl);
    $teste = $curl_response;
    $teste = explode(" ", $teste);
    if ($teste[0] == '"Cpf') {
        $validaPost = false;
    } else {
        $validaPost = true;
    }
    $resultado = json_decode(curl_exec($curl));

    if($resultado == '1')
        $retorno = "CPF válido";
    else
        $retorno = "CPF inválido";
} ?>

<!DOCTYPE html>
<html lang="en">         

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>CPF</title>
</head>

<body>       

    <div class="col-md-3 mt-4 ml-4 mb-4 border">
        <input name="resultado" readonly type="text" class="form-control" value="<?php echo $retorno; ?>">
        <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
    </div>

</body>

</html>