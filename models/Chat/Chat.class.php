<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Chat extends Conexao {

    public $id;
    public $user_id;
    public $data;
    public $horario;
    public $texto;

    function getId() {
        return $this->id;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getData() {
        return $this->data;
    }

    function getHorario() {
        return $this->horario;
    }

    function getTexto() {
        return $this->texto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    public function __construct() {
        $this->Conecta();
        
        $this->session = $_SESSION['id'];
        $this->tabela = "tb_chat";
        $this->tabela_users = "tb_users";
        $this->tabela_menus = "tb_menus";

        $this->id = '15';
        $this->ativo = "1";
        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela_menus` WHERE id='$this->id' AND ativo='$this->ativo'");
        $sql->execute();
        $sql->store_result();
        $rows = $sql->num_rows;

        if ($rows === 0) {
            header('Location:' . HOME_URI . '/paginas/premium/');
        }
        if ($rows === 1) {
            return true;
        }
        if (!isset($_SESSION['id'])) {
            header('Location:' . HOME_URI . '/login/index/');
        }

        
    }

    public function permissao() {

        $this->perm_superadmin = 'superadmin';
        $this->perm_admin = 'admin';
        $perm = $this->mysqli->prepare("SELECT * FROM `$this->tabela_users` WHERE id='$this->session' AND permissao='$this->perm_superadmin' OR permissao='$this->perm_admin'");
        $perm->execute();
        $perm->store_result();
        $rows = $perm->num_rows;

        if ($rows === 0) {
            header('Location:' . HOME_URI . '/paginas/erro/');
            exit;
        }
    }

    public function permissaosalvar() {

        $this->operador = '1';
        $perm = $this->mysqli->prepare("SELECT * FROM `$this->tabela_users` WHERE id='$this->session' AND operador='$this->operador'");
        $perm->execute();
        $perm->store_result();
        $rows = $perm->num_rows;

        if ($rows === 0) {
            header('Location:' . HOME_URI . '/paginas/erro/');
            exit;
        }
    }

    public function save() {

        $this->permissao();
        $this->permissaosalvar();

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela`
            (tb_users_id, data, horario, texto) 
            VALUES (?, ?, ?, ?)");
        $sql->bind_param('isss', $_SESSION['id'], $this->data, $this->horario, $this->texto);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function listAll() {

        $sql = $this->mysqli->prepare("
            SELECT a.id, a.data, a.horario, a.texto, b.nome FROM `$this->tabela` AS a INNER JOIN `$this->tabela_users` AS b ON b.id = a.tb_users_id ORDER BY a.id DESC LIMIT 100
                ");
        $sql->execute();
        $sql->bind_result($this->id, $this->data, $this->horario, $this->texto, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ChatModel['id'] = $this->id;
            $ChatModel['data'] = $this->data;
            $ChatModel['horario'] = $this->horario;
            $ChatModel['texto'] = $this->texto;
            $ChatModel['nome'] = $this->nome;

            $lista[] = $ChatModel;
        }
        return $lista;
    }

}
