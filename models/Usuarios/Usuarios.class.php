<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Usuarios extends Conexao {

    public $id;
    public $permissao;
    public $nome;
    public $email;
    public $user;
    public $password;
    public $dica;
    public $operador;
    public $ativo;

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

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getDica() {
        return $this->dica;
    }

    function getOperador() {
        return $this->operador;
    }

    function getAtivo() {
        return $this->ativo;
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

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDica($dica) {
        $this->dica = $dica;
    }

    function setOperador($operador) {
        $this->operador = $operador;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function __construct() {
        $this->Conecta();
        
        $this->session = $_SESSION['id'];
        $this->tabela = "tb_users";

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
            (permissao, nome, email, user, password, dica, operador, ativo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssii', $this->permissao, $this->nome, $this->email, $this->user, $this->password, $this->dica, $this->operador, $this->ativo);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET permissao = ?, nome = ?, email = ?, user = ?, operador = ?, ativo = ? WHERE id = ?");
        $sql->bind_param('ssssiii', $this->permissao, $this->nome, $this->email, $this->user, $this->operador, $this->ativo, $param);
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
            $UsuariosModel['user'] = $this->user;
            $UsuariosModel['password'] = $this->password;
            $UsuariosModel['dica'] = $this->dica;
            $UsuariosModel['operador'] = $this->operador;
            $UsuariosModel['ativo'] = $this->ativo;

            $lista[] = $UsuariosModel;
        }
        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result($this->id, $this->permissao, $this->nome, $this->email, $this->user, $this->password, $this->dica, $this->operador, $this->ativo);
        $sql->fetch();

        $lista = array();
        $UsuariosModel['id'] = $this->id;
        $UsuariosModel['permissao'] = $this->permissao;
        $UsuariosModel['nome'] = $this->nome;
        $UsuariosModel['email'] = $this->email;
        $UsuariosModel['user'] = $this->user;
        $UsuariosModel['password'] = $this->password;
        $UsuariosModel['dica'] = $this->dica;
        $UsuariosModel['operador'] = $this->operador;
        $UsuariosModel['ativo'] = $this->ativo;

        $lista[] = $UsuariosModel;

        return $lista;
    }

}
