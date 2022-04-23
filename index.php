<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="text-decoration-none h2 text-white" href="index">VD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center align-items-center justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <p class="h3 nav-link active" aria-current="page" >Inicio</p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>
<div class="container my-4 h-100 w-100">
    <div id="content" class="card h-100">
        <div class="card-header">
            <p class="h4 card-title text-center">Bem-vindo ao Sistema de Abertura de Chamados!</p>
        </div>

        <div class="card-body h-100">
            <div class="row h-100">


                <div class="col-6 h-100">
                    <div class="card">
                        <div class="card-header">Crie novos chamados para serem consultados posteriormente</div>
                        <div class="card-body">
                            <a href="criar" class="btn btn-primary col-12">Criar um novo Chamado</a>
                        </div>
                    </div>
                </div>


                <div class="col-6 h-100">
                    <div class="card">
                        <div class="card-header">Verificar todos os chamados previamente criados</div>
                        <div class="card-body">
                            <a href="ver" class="btn btn-primary col-12">Verificar todos os Chamados</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-12 h-100">
                    <div class="card">
                        <div class="card-header">Para verificar um chamado específico, digite o Id do chamado abaixo
                        </div>
                        <div class="card-body">
                            <form action="ver.php" method="get">
                                <div class="my-1">
                                    <label for="idChamado" class="form-label">Id do Chamado: </label>
                                    <input required type="number" class="form-control" id="id" name="id"
                                           placeholder="167234">
                                </div>
                                <button type="submit" class="btn btn-primary col-12">Verificar Chamado</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</html>