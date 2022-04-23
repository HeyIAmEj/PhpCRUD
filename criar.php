<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>CRUD</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
                        <p class="h3 nav-link active" aria-current="page">Abrir Chamado</p>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>

<div class="container my-4 h-100 w-100">
    <div id="content" class="container card h-100">

        <div class="container card-body h-100">

            <form id="formulario_criar" name="formulario_criar" method="post" action="#">

                <div class="container mb-3 row">
                    <label for="titulo" class="col-2 col-form-label">Título</label>
                    <div class="col-6">
                        <input type="text" class="form-control" id="titulo" name="titulo" requiredRemove>
                    </div>
                </div>

                <div class="container mb-3 row">
                    <label for="descricao" class="col-2 col-form-label">Descrição</label>
                    <div class="col-10">
                        <textarea class="form-control" id="descricao" name="descricao" style="height: 200px"
                                  requiredRemove></textarea>
                    </div>
                </div>

                <div class="container mb-3 row">
                    <label for="status" class="col-2 col-form-label">Status</label>
                    <div class="col-6">
                        <input type="text" class="form-control text-center" id="status" name="status"
                               placeholder="Aberto/Fechado" requiredRemove>
                    </div>
                </div>

                <div class="container mb-3 row">
                    <label for="data" class="col-2 col-form-label">Data de Abertura</label>
                    <div class="col-6">
                        <input type="datetime-local" class="form-control text-center" id="data" name="data_abertura"
                               requiredRemove>
                    </div>
                </div>

                <div class="container mb-3 row">
                    <label for="solicitante" class="col-2 col-form-label">Solicitante</label>
                    <div class="col-6">
                        <input type="text" class="form-control text-center" id="solicitante" name="solicitante"
                               placeholder="Maria/José da Silva" requiredRemove>
                    </div>
                </div>
                <div class="row"></div>
                <div class="my-5 px-4">
                    <button id="botao_enviar" type="submit"
                            class="col-12 col-form-label btn btn-md btn-primary text-center w-25">Salvar
                    </button
                </div>

                <div id="carregando" style="display: none;"
                     class="row align-content-center align-items-center justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Carregando...</span>
                    </div>
                </div>

                <div class="justify-content-center align-items-center align-content-center row my-2">
                    <div id="alert_error" style="display:none;" class="alert alert-danger text-center" role="alert">
                    </div>

                    <div id="alert_success" style="display:none;" class="alert alert-success text-center"
                         role="alert">
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#carregando").hide();



        $("#formulario_criar").submit(function (event) {
            $('#botao_enviar').prop('disabled', true);
            $("#alert_success").html("");
            $("#alert_error").html("");


            $("#alert_success").hide();
            $("#alert_error").hide();
            $("#carregando").show();


            $.ajax({
                type: "POST",
                data: $(this).serialize(),
                cache: false,
                url: "http://localhost/CRUD/chamados/criar",
                success: function (data) {
                    var success = data["success"];
                    var message = data["message"];
                    console.log("Sucesso: %s | Message: %s", success, message);
                    if (success == "true") {
                        $("#alert_success").show();
                        $("#alert_success").html("<div class='row'><h5>" + message + "</h5><a class='text-primary text-decoration-none' href='index'>Ir para Inicio</a><a class='text-primary text-decoration-none' href='ver'>Ver todos Chamados</a></div>");
                        // redirect to index after time
                    } else {
                        // append erro html
                        $("#alert_error").show();
                        $("#alert_error").html("<div class='row'><h5>" + message + "</h5><p class='text-primary'>Verifique todos os campos!</p></div>");
                    }
                },
                error: function (request, status, error) {
                    alert("Erro interno! Por favor entre em contato com o Administrador");
                    console.log(request.responseText);
                    console.log(status);
                    console.log(erro);
                }
            });
            $("#carregando").hide();
            $('#botao_enviar').prop('disabled', false);
            return false;

        });
    });
</script>

</body>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</html>