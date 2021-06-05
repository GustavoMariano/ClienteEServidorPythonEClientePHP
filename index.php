<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>WEB SERVICE REST </title>
</head>
<style> 
.form-group1{
    margin-left:30%;
    text-align: center;
}
.form-group{
    width:500px;
    text-align: center;
}
</style>

<body>
    <div class="form-group1">
    <form action="REST_Cliente.php" method="POST" class="col-md-3 border mt-4 ml-4 mb-4">
        <div class="form-group">
        <p class="h3 text-center mt-4">Usuário </p>
        <p class="h6 text-center mt-4">Escolha a operação desejada: </p>
            <div class="form-group text-center mt-4 mb-4">                
                <button name="post" type="submit" class="btn btn-success ">Adicionar</button>
                <button name="get" type="submit" class="btn btn-success ">Visualizar</button>                
                <button name="put" type="submit" class="btn btn-success">Editar</button>
                <button name="delete" type="submit" class="btn btn-success ">Deletar</button>
            </div>
        </div>
    </form>

    <form action="postCpf.php" method="POST" class="col-md-3 border mt-4 ml-4 mb-4">
        <div class="form-group">
        <p class="h3 text-center mt-4">CPF </p>
            <div class="form-group text-center mt-4 mb-4">       
                <input name="cpfPostt" type="text" class="form-control">
                <br>
                <button name="btnCpfPost" type="submit" class="btn btn-success ">Verificar</button>    
            </div>
        </div>
    </form>

    <form action="postOperacao.php" method="POST" class="col-md-3 border mt-4 ml-4 mb-4">
        <div class="form-group">
        <p class="h3 text-center mt-4">Operação </p>
            <div class="form-group text-center mt-4 mb-4">  
                <label>Primeiro numero</label>  
                <input name="num1Post" type="text" class="form-control">
                <br>
                <label>Operador</label>
                <select name="cbOperador">
                    <option value = "somar">somar</option>
                    <option value = "subtrair">subtrair</option>
                    <option value = "multiplicar">multiplicar</option>
                    <option value = "dividir">dividir</option>
                </select>
                <br>
                <label>Segundo numero</label>
                <input name="num2Post" type="text" class="form-control">
                <br>
                <button name="btnOperacaoPost" type="submit" class="btn btn-success ">Calcular</button>
            </div>
        </div>        
    </form>
    </div>
</body>

</html>