<?php

class Usuarios {

    private $idUsuario;
    private $nome;
    private $usuario;
    private $senha;
    private $email;
    private $idSetor;
    private $funcao;

    public function getidUsuario() {
        return $this->idUsuario;
    }

    public function setcodUsuario($cod_usuario) {
        $this->idUsuario = $cod_usuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtolower($email);
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($Usuario) {
        $this->usuario = strtolower($Usuario);
    }

    public function getidSetor() {
        return $this->idSetor;
    }

    public function setidSetor($idSetor) {
        $this->idSetor = $idSetor;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }

    public function gravaUsuario($bd){
        if($bd->query("insert into usuarios (email, idsetor, usuario, senha, nome) values (?, ?, ?, ?, ?)", 
                       $this->getemail(), $this->getidSetor(), $this->getusuario(), $this->getsenha(), $this->getnome()
        )){
            die("OK");
        }else{
            die("ERRO");
        }
        
    }

}

?>