<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Rest Cliente</title>
</head>

<body>

    <?php if (isset($_POST['get'])) { ?>
        <div class="col-md-3 mt-4 ml-4 mb-4 border">
            <form action="getMethod.php" method="POST">
                <div class="form-group text-center">
                    <label>Nome</label>
                    <input name="nameGet" type="text" class="form-control" placeholder="Insira o nome aqui">
                    <br>
                    <button name="resGet" type="submit" class="btn btn-block btn-success mb-4">Visualizar</button>
                </div>
            </form>
        </div>
    <?php } ?>

    <?php if (isset($_POST['post'])) { ?>
        <div class="col-md-3 mt-4 ml-4 mb-4 border">
            <form action="postMethod.php" method="POST">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="namePost" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Idade</label>
                    <input name="agePost" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Ocupação</label>
                    <input name="occupationPost" type="text" class="form-control">
                </div>
                <br>
                <button name="resPost" type="submit" class="btn btn-block btn-success mb-4">Adicionar</button>
            </form>
        </div>
    <?php } ?>
    </div>

    <?php if (isset($_POST['delete'])) { ?>
        <div class="col-md-3 mt-4 ml-4 mb-4 border">
            <form action="deleteMethod.php" method="POST">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="nameDelete" type="text" class="form-control" placeholder="Insira o nome aqui">
                    <br>
                    <button name="resDel" type="submit" class="btn btn-block btn-success mb-4">Deletar</button>
                </div>
            </form>
        </div>
    <?php } ?>


    <?php if (isset($_POST['put'])) { ?>
        <div class="col-md-3 mt-4 ml-4 mb-4 border">
            <form action="putMethod.php" method="POST">
                <div class="form-group">
                    <label>Nome</label>
                    <input name="namePut" type="text" class="form-control" placeholder="Insira o nome aqui">
                    <br>
                    <button name="segundaTelaPut" type="submit" class="btn btn-block btn-success mb-4">Editar</button>
                </div>
            </form>
        </div>
    <?php }
    ?>
</body>

</html>