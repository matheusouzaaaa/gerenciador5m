<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Clientes extends Conexao {

    public $id;
    public $nome;
    public $email;
    public $tipo_pessoa;
    public $documento;
    public $telefone;
    public $celular;
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $endereco;
    public $numero;
    public $obs;
    public $anexo;
    public $anexo_tmp;
    public $excluir;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTipo_pessoa() {
        return $this->tipo_pessoa;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCelular() {
        return $this->celular;
    }

    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function getObs() {
        return $this->obs;
    }

    function getAnexo() {
        return $this->anexo;
    }

    function getAnexo_tmp() {
        return $this->anexo_tmp;
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

    function setEmail($email) {
        $this->email = $email;
    }

    function setTipo_pessoa($tipo_pessoa) {
        $this->tipo_pessoa = $tipo_pessoa;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }

    function setAnexo($anexo) {
        $this->anexo = $anexo;
    }

    function setAnexo_tmp($anexo_tmp) {
        $this->anexo_tmp = $anexo_tmp;
    }

    function setExcluir($excluir) {
        $this->excluir = $excluir;
    }

    public function __construct() {
        
        $this->Conecta();
        
        $this->session = $_SESSION['id'];
        $this->tabela = "tb_clientes";
        $this->tabela_menus = "tb_menus";
        $this->tabela_users = "tb_users";

        $this->id = '10';
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

    public function save() {

        $this->permissao();

        $numero = rand(1, 8000000);
        $this->anexo_final = $numero . "-" . $this->anexo;

        move_uploaded_file($this->anexo_tmp, "views/_clientes/" . $this->anexo_final);

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela`
            (nome, email, tipo_pessoa, documento, telefone, celular, cep, estado, cidade, bairro, endereco, numero, obs, anexo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssssssssss', $this->nome, $this->email, $this->tipo_pessoa, $this->documento, $this->telefone, $this->celular, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->endereco, $this->numero, $this->obs, $this->anexo_final
        );
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare(
                "UPDATE `$this->tabela` SET nome = ?, email = ?, tipo_pessoa = ?, documento = ?, telefone = ?, celular = ?,
                cep = ?, estado = ?, cidade = ?, bairro = ?, endereco = ?, numero = ?, obs = ?
                WHERE id = ?"
        );
        $sql->bind_param('sssssssssssssi', $this->nome, $this->email, $this->tipo_pessoa, $this->documento, $this->telefone, $this->celular, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->endereco, $this->numero, $this->obs, $param
        );
        $sql->execute();
    }

    public function updatearquivo($param) {

        $numero = rand(1, 8000000);
        $this->anexo_final = $numero . "-" . $this->anexo;

        move_uploaded_file($this->anexo_tmp, "views/_clientes/" . $this->anexo_final);

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET anexo = ? WHERE id = ?");
        $sql->bind_param('si', $this->anexo_final, $param);
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

        $sql = $this->mysqli->prepare("SELECT id, nome, email, tipo_pessoa, telefone, celular FROM `$this->tabela`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->email, $this->tipo_pessoa, $this->telefone, $this->celular);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;
            $ClientesModel['email'] = $this->email;
            $ClientesModel['tipo_pessoa'] = $this->tipo_pessoa;
            $ClientesModel['telefone'] = $this->telefone;
            $ClientesModel['celular'] = $this->celular;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listNome() {

        $sql = $this->mysqli->prepare("SELECT id, nome, email, tipo_pessoa, telefone, celular FROM `$this->tabela` WHERE nome='$this->nome'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->email, $this->tipo_pessoa, $this->telefone, $this->celular);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;
            $ClientesModel['email'] = $this->email;
            $ClientesModel['tipo_pessoa'] = $this->tipo_pessoa;
            $ClientesModel['telefone'] = $this->telefone;
            $ClientesModel['celular'] = $this->celular;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listEmail() {


        $sql = $this->mysqli->prepare("SELECT id, nome, email, tipo_pessoa, telefone, celular FROM `$this->tabela` WHERE email='$this->email'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->email, $this->tipo_pessoa, $this->telefone, $this->celular);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;
            $ClientesModel['email'] = $this->email;
            $ClientesModel['tipo_pessoa'] = $this->tipo_pessoa;
            $ClientesModel['telefone'] = $this->telefone;
            $ClientesModel['celular'] = $this->celular;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listEstado() {

        $sql = $this->mysqli->prepare("SELECT id, nome, email, tipo_pessoa, telefone, celular FROM `$this->tabela` WHERE estado='$this->estado'");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome, $this->email, $this->tipo_pessoa, $this->telefone, $this->celular);

        $lista = array();
        while ($row = $sql->fetch()) {

            $ClientesModel['id'] = $this->id;
            $ClientesModel['nome'] = $this->nome;
            $ClientesModel['email'] = $this->email;
            $ClientesModel['tipo_pessoa'] = $this->tipo_pessoa;
            $ClientesModel['telefone'] = $this->telefone;
            $ClientesModel['celular'] = $this->celular;

            $lista[] = $ClientesModel;
        }
        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result(
                $this->id, $this->nome, $this->email, $this->tipo_pessoa, $this->documento, $this->telefone, $this->celular, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->endereco, $this->numero, $this->obs, $this->anexo
        );
        $sql->fetch();

        $lista = array();
        $ClientesModel['id'] = $this->id;
        $ClientesModel['nome'] = $this->nome;
        $ClientesModel['email'] = $this->email;
        $ClientesModel['tipo_pessoa'] = $this->tipo_pessoa;
        $ClientesModel['documento'] = $this->documento;
        $ClientesModel['telefone'] = $this->telefone;
        $ClientesModel['celular'] = $this->celular;
        $ClientesModel['cep'] = $this->cep;
        $ClientesModel['estado'] = $this->estado;
        $ClientesModel['cidade'] = $this->cidade;
        $ClientesModel['bairro'] = $this->bairro;
        $ClientesModel['endereco'] = $this->endereco;
        $ClientesModel['numero'] = $this->numero;
        $ClientesModel['obs'] = $this->obs;
        $ClientesModel['anexo'] = $this->anexo;

        $lista[] = $ClientesModel;

        return $lista;
    }

    public function listfotoID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT anexo FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result($this->anexo);
        $sql->fetch();

        $lista = array();
        $ClientesModel['anexo'] = $this->anexo;

        $lista[] = $ClientesModel;

        return $lista;
    }

}
