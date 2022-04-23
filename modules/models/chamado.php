<?php
require_once __DIR__ . "\..\db\banco.php";

class Chamado extends Banco{
 private $id;
 private $titulo;
 private $descricao;
 private $status;
 private $data_abertura;
 private $solicitante;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDataAbertura()
    {
        return $this->data_abertura;
    }

    /**
     * @param mixed $data_abertura
     */
    public function setDataAbertura($data_abertura): void
    {
        $this->data_abertura = $data_abertura;
    }

    /**
     * @return mixed
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * @param mixed $solicitante
     */
    public function setSolicitante($solicitante): void
    {
        $this->solicitante = $solicitante;
    }




 public function salvar() {
     $titulo = $this->getTitulo();
     $descricao = $this->getDescricao();
     $status = $this->getStatus();
     $data_abertura = $this->getDataAbertura();
     $solicitante = $this->getSolicitante();

     $query = "INSERT INTO chamados VALUES (?,?,?,?,?);";

     return $this->save($query, [$titulo, $descricao, $status, $data_abertura, $solicitante]);


 }

 public function atualizar() {
     $id = $this->getId();
     $titulo = $this->getTitulo();
     $descricao = $this->getDescricao();
     $status = $this->getStatus();
     $data_abertura = $this->getDataAbertura();
     $solicitante = $this->getSolicitante();

     $query = "UPDATE chamados SET titulo=?, descricao=?, status=?, data_abertura=?, solicitante=? WHERE id=?;";

     return $this->update($query, [$titulo, $descricao, $status, $data_abertura, $solicitante, $id]);
 }

 public function remover() {
 // logica para remover cliente do banco
 }

 public function buscarPorId($id){
     $query = "SELECT * FROM chamados WHERE id =".$id;
     return $this->select($query);

 }

 public function buscarTodos() {
     return $this->select("SELECT * FROM chamados ORDER BY id");
 }

 /**
 * ...
 * outros métodos de abstração de banco
 * ...
 *
 */
}

?>