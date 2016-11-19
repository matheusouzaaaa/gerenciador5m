<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Usuarios extends Conexao {

    public $id;
    public $permissao;
    public $nome;
    public $email;
    public $password;
    public $cargo;
    public $telefone;
    public $tb_equipes_id;

    function getId() {
        return $this->id;
    }

    function getPermissao() {
        return $this->permissao;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getTb_equipes_id() {
        return $this->tb_equipes_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPermissao($permissao) {
        $this->permissao = $permissao;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setTb_equipes_id($tb_equipes_id) {
        $this->tb_equipes_id = $tb_equipes_id;
    }

    public function __construct() {
        $this->Conecta();

        $this->session = $_SESSION['id'];
        $this->tabela = "tb_usuarios";
        $this->tabela_equipes = "tb_equipes";

        if (!isset($_SESSION['id'])) {
            header('Location:' . HOME_URI . '/login/index/');
            exit;
        }
    }

    public function permissao() {

        $this->perm_superadmin = 'superadmin';
        $this->perm_admin = 'admin';
        $perm = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$this->session' AND permissao='$this->perm_superadmin' OR permissao='$this->perm_admin'");
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

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela`
            (permissao, nome, email, password, cargo, telefone, tb_equipes_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssi', $this->permissao, $this->nome, $this->email, $this->password, $this->cargo, $this->telefone, $this->tb_equipes_id);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET permissao = ?, nome = ?, email = ?, cargo = ?, telefone = ?, tb_equipes_id = ? WHERE id = ?");
        $sql->bind_param('sssssii', $this->permissao, $this->nome, $this->email, $this->cargo, $this->telefone, $this->tb_equipes_id, $param);
        $sql->execute();
    }

    public function updatepassword($param) {

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET password = ? WHERE id = ?");
        $sql->bind_param('si', $this->password, $param);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function listAll() {

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela`");
        $sql->execute();
        $sql->bind_result($this->id, $this->permissao, $this->nome, $this->email, $this->user, $this->password, $this->dica, $this->operador, $this->ativo);

        $lista = array();
        while ($row = $sql->fetch()) {

            $UsuariosModel['id'] = $this->id;
            $UsuariosModel['permissao'] = $this->permissao;
            $UsuariosModel['nome'] = $this->nome;
            $UsuariosModel['email'] = $this->email;
            $UsuariosModel['password'] = $this->password;
            $UsuariosModel['cargo'] = $this->cargo;
            $UsuariosModel['telefone'] = $this->telefone;
            $UsuariosModel['tb_equipes_id'] = $this->tb_equipes_id;

            $lista[] = $UsuariosModel;
        }
        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result($this->id, $this->permissao, $this->nome, $this->email, $this->password, $this->cargo, $this->telefone, $this->tb_equipes_id);
        $sql->fetch();

        $lista = array();
        $UsuariosModel['id'] = $this->id;
        $UsuariosModel['permissao'] = $this->permissao;
        $UsuariosModel['nome'] = $this->nome;
        $UsuariosModel['email'] = $this->email;
        $UsuariosModel['password'] = $this->password;
        $UsuariosModel['cargo'] = $this->cargo;
        $UsuariosModel['telefone'] = $this->telefone;
        $UsuariosModel['tb_equipes_id'] = $this->tb_equipes_id;

        $lista[] = $UsuariosModel;

        return $lista;
    }
    public function listEquipes() {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela_equipes`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);
        $sql->fetch();

        $lista = array();
        $UsuariosModel['id'] = $this->id;
        $UsuariosModel['nome'] = $this->nome;

        $lista[] = $UsuariosModel;

        return $lista;
    }

}
