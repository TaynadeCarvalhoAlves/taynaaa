<?php

class setores {

    private $idSetor;
    private $nome;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getidSetor() {
        return $this->idSetor;
    }

    public function setidSetor($idSetor) {
        $this->idSetor = $idSetor;
    }

}

?>