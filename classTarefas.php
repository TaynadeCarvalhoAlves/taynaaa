<?php

class Tarefas {

    private $idTarefa;
    private $titulo;
    private $descricao;
    private $status;
    private $observacao;
    private $idUsuario;
    private $dataInsercao;
    private $dataAtualizacao;
    private $dataFechamento;
    private $funcao;

    public function getidTarefa() {
        return $this->idTarefa;
    }

    public function setidTarefa($idTarefa) {
        $this->idTarefa = $idTarefa;
    }

    public function gettitulo() {
        return $this->titulo;
    }

    public function settitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getdescricao() {
        return $this->descricao;
    }

    public function setdescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getstatus() {
        return $this->status;
    }

    public function setstatus($status) {
        $this->status = $status;
    }

    public function getobservacao() {
        return $this->observacao;
    }

    public function setobservacao($observacao) {
        $this->observacao = $observacao;
    }

    public function getidUsuario() {
        return $this->idUsuario;
    }

    public function setidUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getdataInsercao() {
        return $this->dataInsercao;
    }

    public function setdataInsercao($dataInsercao) {
        $this->dataInsercao = $dataInsercao;
    }

    public function getdataAtualizacao() {
        return $this->dataAtualizacao;
    }

    public function setdataAtualizacao($dataAtualizacao) {
        $this->dataAtualizacao = $dataAtualizacao;
    }

    public function getdataFechamento() {
        return $this->dataFechamento;
    }

    public function setdataFechamento($dataFechamento) {
        $this->dataFechamento = $dataFechamento;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }

    public function listarTarefas($bd, $idUsuario){

        $tarefas = $bd->query('SELECT * FROM tarefas WHERE idUsuario = ?', array($idUsuario))->fetchAll();
        $html = "";
        $i = 0;
        $j = 0;
        $qtdCartoes = 3;

        while($j < sizeof($tarefas)/3){
            $html .= "<div class='row'>";
            
            while($i < (sizeof($tarefas) < $qtdCartoes ? sizeof($tarefas) : $qtdCartoes)){

                $html .= "  <div class='col-md-4'>";
                $html .= "    <div class='card' style='width: 18rem;'>";
                $html .= "      <div class='card-body'>";
                $html .= "        <h5 class='card-title'>". $tarefas[$i]['Titulo'] ."</h5>";
                $html .= "        <h6 class='card-subtitle mb-2 text-muted'>". $tarefas[$i]['Status'] ."</h6>";
                $html .= "        <p class='card-text'>". $tarefas[$i]['Descricao'] ."</p>";
                $html .= "        <a href='#' class='card-link'>Editar</a>";
                $html .= "        <a href='#' class='card-link'>Concluir</a>";
                $html .= "      </div>";
                $html .= "    </div>";
                $html .= "  </div>";
    
                $i++;
            }

            $html .= "</div><br>";
            $j++;
            if ($qtdCartoes + 3 > sizeof($tarefas)){
                $qtdCartoes += ($qtdCartoes+3)-sizeof($tarefas)-1;
            }else{
                $qtdCartoes += 3;
            }
        }

        die($html);
    }//function listarTarefas

    function gravarTarefa($bd){

        if($bd->query("insert into tarefas (titulo, descricao, status, observacao, idusuario, datainsercao, dataatualizacao, datafechamento) values (?, ?, ?, ?, ?, ?, ?, ?)", 
                       $this->gettitulo(), $this->getdescricao(), $this->getstatus(), $this->getobservacao(), $this->getidUsuario(), $this->getdataInsercao(), $this->getdataAtualizacao(), $this->getdataFechamento()
        )){
            die("OK");
        }else{
            die("ERRO");
        }
        
    }//function gravarTarefa
}




?>