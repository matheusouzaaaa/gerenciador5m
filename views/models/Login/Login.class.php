<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Login extends Conexao {

    public $id;
    public $email;
    public $password;
    public $login;


    function getLogin()
    {
        return $this->login;
    }
    
    function setLogin($login)
    {
        return $this->login = $login;
    }

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function __construct() {
        $this->Conecta();
        $this->tabela = "tb_usuarios";
        $this->session = $_SESSION['id'];
    }

    public function autenticar() {

        $sql = $this->mysqli->prepare("SELECT id FROM `$this->tabela` WHERE login='$this->login' AND password='$this->password'");
        $sql->execute();
        $sql->bind_result($this->id);
        $sql->store_result();
        $rows = $sql->num_rows;
        $sql->fetch();

        if ($rows === 0) {
            $mensagem = "Usuário e/ou Senha incorretos!";
            $this->load = load_view($controller = 'login', $action = 'index', $mensagem, $this->view = null);
        }
        if ($rows > 0) {
            $_SESSION['id'] = $this->id;
            header('Location:' . HOME_URI . '/tarefas/index/');
        }
    }

    public function identifica() {

        $sql = $this->mysqli->prepare("SELECT nome FROM `$this->tabela` WHERE id='$this->session'");
        $sql->execute();
        $sql->bind_result($this->nome);
        $sql->fetch();

        echo ucwords($this->nome);
    }

    public function identificaid() {

        $sql = $this->mysqli->prepare("SELECT id FROM `$this->tabela` WHERE id='$this->session'");
        $sql->execute();
        $sql->bind_result($this->id);
        $sql->fetch();

        echo ($this->id);
    }

}
