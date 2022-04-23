<?php

class Banco
{
    protected $connection = null;


    private function executarPreparo($query = "", $params = [])
    {
        try {
            $query_prepare = $this->connection->prepare($query);

            if ($query_prepare === false) {
                throw new Exception("Houve um erro ao tentar preparar sua requisição: " . $query);
            }

            if ($params) {
                $query_prepare->bind_param($params[0], $params[1]);
            }

            $query_prepare->execute();

            return $query_prepare;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "", $params = [])
    {
        try {
            $stmt = $this->executarPreparo($query); // retorna a query preparada, uma vez que não retornou exception
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            return $result;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }


    private function executarSave($query = "", $params = [])
    {
        try {
            $query = "INSERT INTO chamados (id, titulo, descricao, status, data_abertura, solicitante)  VALUES (NULL, ?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sssss", $titulo, $descricao, $status, $data_abertura, $solicitante);
            $titulo =  $params[0];
            $descricao = $params[1];
            $status = $params[2];
            $data_abertura = $params[3];
            $solicitante = $params[4];
            $stmt->execute();
            if ($stmt->affected_rows >= 1){
                return array('success' => 'true', 'message' => "Chamado salvo com sucesso!");
            }else{
                return array('success' => 'false', 'message' => "Não foi possível salvar este Chamado!");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function save($query = "", $params = [])
    {
        try {
            $stmt = $this->executarSave($query, $params); // retorna a query preparada, uma vez que não retornou exception
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }



    private function executarUpdate($query = "", $params = [])
    {
        try {
            $query = "UPDATE chamados SET titulo=?, descricao=?, status=?, data_abertura=?, solicitante=? WHERE id=?;";
            $stmt = $this->connection->prepare($query);
            $stmt->bind_param("sssssi", $titulo, $descricao, $status, $data_abertura, $solicitante, $id);
            $titulo =  $params[0];
            $descricao = $params[1];
            $status = $params[2];
            $data_abertura = $params[3];
            $solicitante = $params[4];
            $id = $params[5];
            $stmt->execute();
            if ($stmt->affected_rows >= 1){
                return array('success' => 'true', 'message' => "Chamado atualizado com sucesso!");
            }else{
                return array('success' => 'false', 'message' => "Nao foi possivel atualizar este Chamado!");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function update($query = "", $params = [])
    {
        try {
            $stmt = $this->executarUpdate($query, $params); // retorna a query preparada, uma vez que não retornou exception
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }


    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (mysqli_connect_errno()) {
                throw new Exception("Não foi possivel se conectar ao servidor! Por favor entre em contato com o administrador!");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
