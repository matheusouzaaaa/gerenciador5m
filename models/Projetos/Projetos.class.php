<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Projetos extends Conexao {

    public $id;
    public $nome;
    public $tb_clientes_id;
    public $excluir;

    function getTb_clientes_id()
    {
        return $this->tb_clientes_id;
    }
    
    function setTb_clientes_id($tb_clientes_id)
    {
        return $this->tb_clientes_id = $tb_clientes_id;
    }

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
        $this->tabela = "tb_projetos";
        $this->tabela_clientes = "tb_clientes";
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
            (nome, tb_clientes_id) 
            VALUES (?, ?)");
        $sql->bind_param('si', $this->nome, $this->tb_clientes_id);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare(
            "UPDATE `$this->tabela` SET nome = ?, tb_clientes_id = ? WHERE id = ?"
            );
        $sql->bind_param('sii', $this->nome, $this->tb_clientes_id, $param);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function listAll() {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT a.id, a.nome, b.nome FROM `$this->tabela` as a INNER JOIN `$this->tabela_clientes` as b ON a.tb_clientes_id = b.id ");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->nome_cliente);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ProjetosModel['id'] = $this->id;
            $ProjetosModel['nome'] = $this->nome;
            $ProjetosModel['nome_cliente'] = $this->nome_cliente;

            $lista[] = $ProjetosModel;
        }
        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT a.id, a.nome, b.id, b.nome FROM `$this->tabela` as a INNER JOIN `$this->tabela_clientes` as b ON a.tb_clientes_id = b.id WHERE a.id='$param'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->id_cliente, $this->nome_cliente);
        $sql->fetch();

        $lista = array();
        $ProjetosModel['id'] = $this->id;
        $ProjetosModel['nome'] = $this->nome;
        $ProjetosModel['id_cliente'] = $this->id_cliente;
        $ProjetosModel['nome_cliente'] = $this->nome_cliente;

        $lista[] = $ProjetosModel;

        return $lista;
    }


    public function listClientes() {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela_clientes`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ProjetosModel['id'] = $this->id;
            $ProjetosModel['nome'] = $this->nome;

            $lista[] = $ProjetosModel;
        }
        return $lista;
    }
}
