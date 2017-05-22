<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Clientes extends Conexao {

    public $id;
    public $nome;
    public $excluir;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getExcluir() {
        return $this->excluir;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setExcluir($excluir) {
        $this->excluir = $excluir;
    }

    public function __construct() {

        $this->Conecta();
        
        $this->session = $_SESSION['id'];
        $this->tabela = "tb_clientes";
        $this->tabela_users = "tb_usuarios";
        
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

    public function save() {

        $this->permissao();

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela`
            (nome) 
            VALUES (?)");
        $sql->bind_param('s', $this->nome);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare(
            "UPDATE `$this->tabela` SET nome = ? WHERE id = ?"
            );
        $sql->bind_param('si', $this->nome, $param);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function removeall() {

        $this->permissao();

        foreach ($this->excluir AS $param) {
            $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
            $sql->bind_param('i', $param);
            $sql->execute();
        }
    }

    public function listAll() {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listNome() {

        $sql = $this->mysqli->prepare("SELECT id, nome= FROM `$this->tabela` WHERE nome='$this->nome'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);
        $sql->fetch();

        $lista = array();
        $ClientesModel['id'] = $this->id;
        $ClientesModel['nome'] = $this->nome;

        $lista[] = $ClientesModel;

        return $lista;
    }

}
