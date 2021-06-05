<?php
if (isset($_POST['btnOperacaoPost'])) {
    $num1 = $_POST['num1Post'];
    $operador = $_POST['cbOperador'];
    $num2 = $_POST['num2Post'];
    $service_url = 'http://127.0.0.1:5000/operacao/' . $operador;
    $curl = curl_init($service_url);
    $curl_post_data = array(        
        'num1' => $num1,
        'operador' => $operador,
        'num2' => $num2,
    );    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
    $curl_response = curl_exec($curl);
    $teste = $curl_response;
    $teste = explode(" ", $teste);

    $resultado = json_decode(curl_exec($curl));

    if ($teste[0] == '"Operacao') {
        $validaPost = false;
    } else {
        $validaPost = true;
    }
    
} ?>

<!DOCTYPE html>
<html lang="en">         

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Resultado</title>
</head>

<body>       

    <div class="col-md-3 mt-4 ml-4 mb-4 border">
        <input name="resultado" readonly type="text" class="form-control" value="<?php echo  $resultado; ?>">
        <a href="index.php" class="btn btn-block btn-success mb-4">Voltar</a>
    </div>

</body>

</html>