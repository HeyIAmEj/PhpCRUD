<?php

class ChamadoController extends BaseController
{


    /**
     * "/chamados" Endpoint - Captura todos os chamados
     */
    public function getAll()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $chamado = new Chamado();

                $arrayChamados = $chamado->buscarTodos();
                $responseData = json_encode($arrayChamados);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor entre em contato com o administrador!.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Sem suporte para este method.';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }


        // retorna saída
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK') // define que esta retornando um json (padrão api)
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function getById($id)
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        if (strtoupper($requestMethod) == 'GET') {
            try {
                $chamado = new Chamado();

                $arrayChamados = $chamado->buscarPorId($id);
                $responseData = json_encode($arrayChamados);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor entre em contato com o administrador!.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Sem suporte para este method.';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }


        // retorna saída
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK') // define que esta retornando um json (padrão api)
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }

    public function create()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $titulo = $_REQUEST["titulo"];
        $descricao = $_REQUEST["descricao"];
        $status = $_REQUEST["status"];
        $data_abertura = $_REQUEST["data_abertura"];
        $solicitante = $_REQUEST["solicitante"];


        if (strtoupper($requestMethod) == 'POST') {
            try {
                $chamado = new Chamado();
                $chamado->setTitulo($titulo);
                $chamado->setDescricao($descricao);
                $chamado->setStatus($status);
                $chamado->setDataAbertura($data_abertura);
                $chamado->setSolicitante($solicitante);

                $responseData = $chamado->salvar();

                if (json_encode($responseData["success"])) {
                    // sucess
                    $this->sendOutput(
                        json_encode($responseData),
                        array('Content-Type: application/json', 'HTTP/1.1 201 CREATED') // define que esta retornando um json (padrão api)
                    );
                } else {
                    // not sucess
                    $this->sendOutput(
                        json_encode($responseData),
                        array('Content-Type: application/json', 'HTTP/1.1 409 CONFLICT')
                    );

                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor entre em contato com o administrador!.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Metodo HTTP nao aceito para este ENDPOINT';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }


        // retorna saída
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 201 CREATED') // define que esta retornando um json (padrão api)
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                json_encode(array('Content-Type: application/json', $strErrorHeader))
            );
        }
    }

    public function alterById()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $id = $_REQUEST["idAlterar"];
        $titulo = $_REQUEST["tituloAlterar"];
        $descricao = $_REQUEST["descricaoAlterar"];
        $status = $_REQUEST["statusAlterar"];
        $data_abertura = $_REQUEST["data_aberturaAlterar"];
        $solicitante = $_REQUEST["solicitanteAlterar"];


        if (strtoupper($requestMethod) == 'PUT') {
            try {

                $chamado = new Chamado();

                $chamado->setId($id);
                $chamado->setTitulo($titulo);
                $chamado->setDescricao($descricao);
                $chamado->setStatus($status);
                $chamado->setDataAbertura($data_abertura);
                $chamado->setSolicitante($solicitante);

                $responseData = $chamado->atualizar();

                if (json_encode($responseData["success"])) {
                    // sucess
                    $this->sendOutput(
                        json_encode($responseData),
                        array('Content-Type: application/json', 'HTTP/1.1 201 CREATED') // define que esta retornando um json (padrão api)
                    );
                } else {
                    // not sucess
                    $this->sendOutput(
                        json_encode($responseData),
                        array('Content-Type: application/json', 'HTTP/1.1 409 CONFLICT')
                    );

                }
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage() . 'Algo deu errado! Por favor entre em contato com o administrador!.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Sem suporte para este method.';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }


        // retorna saída
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK') // define que esta retornando um json (padrão api)
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}