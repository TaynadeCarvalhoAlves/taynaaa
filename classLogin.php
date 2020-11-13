<?php

class login {

    private $usuario;
    private $senha;
    private $funcao;

    public function getusuario() {
        return $this->usuario;
    }

    public function setusuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getsenha() {
        return $this->senha;
    }

    public function setsenha($senha) {
        $this->senha = $senha;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function setFuncao($funcao){
        $this->funcao = $funcao;
    }

    public function fazerLogin($db) {

        $login = $db->query('SELECT * FROM usuarios WHERE usuario = ? AND senha = ?', array($this->getusuario(), $this->getsenha()))->FetchArray();

        if (sizeof($login) > 0) {
            session_start();
            $_SESSION['usuarioLogado'] = true;
            setcookie("idUsuario", $login['IDUsuario']);
            die("OK");
        }else{
            die("ERRO");
        }
    }
}

?>
