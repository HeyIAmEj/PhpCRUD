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
    <script type="text/javascript">
        $(document).ready(function () {


            var filter = $(location).attr('search');
            if (filter.startsWith("?id=")) {
                var id = filter.replace("?id=", "");

                /* ENDPOINT COM ID*/
                /* ENDPOINT COM ID*/
                /* ENDPOINT COM ID*/
                $.ajax({
                    type: "GET",
                    url: "http://localhost/CRUD/chamados/" + id,
                    dataType: "json",
                    success: function (result, status, xhr) {
                        var table = "";

                        if (result.length > 0) {
                            result.forEach(result => {
                                if (result.id == undefined) {
                                    $("#message").html("<h2 class='text-center'>Usuário não encontrado</h2>");
                                } else {
                                    table = table + "<tr><th scope='row'>" + result["id"] + "</th><td>" + result["titulo"] + "</td><td>" + result["descricao"] + "</td><td>" + result["status"] + "</td><td>" + result["data_abertura"] + "</td><td>" + result["solicitante"] + "</td><td>Editar Apagar</td></tr>";
                                }
                            });
                        } else {
                            table = table + "<tr><th scope='row'>-</th><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>"
                        }
                        $("#tableContent").html(table);
                    },
                    error: function (xhr, status, error) {
                        alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                    }
                });

            } else {

                /*ENDPOINT TODOS*/
                /*ENDPOINT TODOS*/
                /*ENDPOINT TODOS*/
                $.ajax({
                    type: "GET",
                    url: "http://localhost/CRUD/chamados/todos",
                    dataType: "json",
                    success: function (result, status, xhr) {
                        var table = "";

                        if (result.length > 0) {
                            result.forEach(result => {
                                if (result.id == undefined) {
                                    $("#message").html("<h2 class='text-center'>Usuário não encontrado</h2>");
                                } else {
                                    table = table + "<tr><th scope='row'>" + result["id"] + "</th><td>" + result["titulo"] + "</td><td>" + result["descricao"] + "</td><td>" + result["status"] + "</td><td>" + result["data_abertura"] + "</td><td>" + result["solicitante"] + "</td><td><a href='#' class='alterarLink' onclick='alterar(" + result["id"] + ")'>Alterar</a></td></tr>";
                                }
                            });
                        } else {
                            table = table + "<tr><th scope='row'>-</th><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>"
                        }
                        $("#tableContent").html(table);
                    },
                    error: function (xhr, status, error) {
                        alert("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
                    }
                });
            }
            $("#message").html();

        });
    </script>
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
                        <p class="h3 nav-link active" aria-current="page">Lista de Chamados</p>
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
            <p class="h4 card-title text-center">Chamados</p>
        </div>

        <div id="message" class="card-body h-100">


        </div>

        <table class="table align-content-center justify-content-center">
            <thead class="bg-light">
            <tr>
                <th scope="col-1">#</th>
                <th scope="col-2">Titulo</th>
                <th scope="col-3">Descrição</th>
                <th scope="col-1">Status</th>
                <th scope="col-1">Data de Abertura</th>
                <th scope="col-1">Solicitante</th>
                <th scope="col-3">Ações</th>
            </tr>
            </thead>
            <tbody id="tableContent">
            </tbody>
        </table>

    </div>
</div>


<!--Alterar Modal -->
<div class="modal fade" id="alterarModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alterar Chamado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">


                <div class="row">

                    <form id="formulario_alterar" name="formulario_alterar" method="GET" action="#">

                        <div class="container mb-3 row">
                            <label for="idAlterar" class="col-4 col-form-label">Id</label>
                            <div class="col-6">
                                <input type="text" class="form-control" id="idAlterar" name="idAlterar" value="430">
                            </div>
                        </div>


                        <div class="container mb-3 row">
                            <label for="tituloAlterar" class="col-4 col-form-label">Título</label>
                            <div class="col-6">
                                <input type="text" class="form-control" id="tituloAlterar" name="tituloAlterar">
                            </div>
                        </div>

                        <div class="container mb-3 row">
                            <label for="descricaoAlterar" class="col-4 col-form-label">Descrição</label>
                            <div class="col-8">
                            <textarea class="form-control" id="descricaoAlterar" name="descricaoAlterar"
                                      style="height: 200px"></textarea>
                            </div>
                        </div>

                        <div class="container mb-3 row">
                            <label for="statusAlterar" class="col-4 col-form-label">Status</label>
                            <div class="col-6">
                                <input type="text" class="form-control text-center" id="statusAlterar"
                                       name="statusAlterar"
                                       placeholder="Aberto/Fechado">
                            </div>
                        </div>

                        <div class="container mb-3 row">
                            <label for="data_aberturaAlterar" class="col-4 col-form-label">Data de Abertura</label>
                            <div class="col-6">
                                <input type="datetime-local" class="form-control text-center" id="data_aberturaAlterar"
                                       name="data_aberturaAlterar">
                            </div>
                        </div>

                        <div class="container mb-3 row">
                            <label for="solicitanteAlterar" class="col-4 col-form-label">Solicitante</label>
                            <div class="col-6">
                                <input type="text" class="form-control text-center" id="solicitanteAlterar"
                                       name="solicitanteAlterar"
                                       placeholder="Maria/José da Silva">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button id="botao_alterar" type="submit" class="btn btn-primary">Alterar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>

                        <div id="carregando_alterar" style="display: none;"
                             class="row align-content-center align-items-center justify-content-center">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Carregando...</span>
                            </div>
                        </div>

                        <div class="justify-content-center align-items-center align-content-center row my-2">
                            <div id="alert_error_alterar" style="display:none;" class="alert alert-danger text-center" role="alert">
                            </div>

                            <div id="alert_success_alterar" style="display:none;" class="alert alert-success text-center"
                                 role="alert">
                            </div>
                        </div>
                        <p>lembrar que no get requests dos parametros os nomes mudaram </p>
                    </form>
                </div>

            </div>


        </div>
    </div>
</div>


<script type="text/javascript">
    function alterar(id) {
        $("#idAlterar").val(id);
        $('#alterarModal').modal('show');
    }
    $(document).ready(function () {
        $("#carregando_alterar").hide();



        $("#formulario_alterar").submit(function (event) {
            $('#botao_alterar').prop('disabled', true);
            $("#alert_success_alterar").html("");
            $("#alert_error_alterar").html("");


            $("#alert_success_alterar").hide();
            $("#alert_error_alterar").hide();
            $("#carregando_alterar").show();


            $.ajax({
                type: "PUT",
                method: "PUT",
                data: $("#formulario_alterar").serialize(),
                cache: false,
                dataType: "json",
                url: "http://localhost/CRUD/chamados/alterar",
                success: function (data) {

                    var success = data["success"];
                    var message = data["message"];
                    console.log("Sucesso: %s | Message: %s", success, message);
                    if (success == "true") {
                        $("#alert_success_alterar").show();
                        $("#alert_success_alterar").html("<div class='row'><h5>" + message + "</h5><a class='text-primary text-decoration-none' href='index'>Ir para Inicio</a><a class='text-primary text-decoration-none' href='ver'>Ver todos Chamados</a></div>");
                        // redirect to index after time
                    } else {
                        // append erro html
                        $("#alert_error_alterar").show();
                        $("#alert_error_alterar").html("<div class='row'><h5>" + message + "</h5><p class='text-primary'>Verifique todos os campos!</p></div>");
                    }
                },
                error: function (request, status, error) {
                    alert("Erro interno! Por favor entre em contato com o Administrador");
                    console.log(request.responseText);
                    console.log(status);
                    console.log(erro);
                }
            });
            $("#carregando_alterar").hide();
            $('#botao_alterar').prop('disabled', false);
            return false;

        });
    });
</script>
</body>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</html>