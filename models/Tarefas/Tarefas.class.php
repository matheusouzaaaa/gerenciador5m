<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Tarefas extends Conexao {

    public $id;
    public $titulo;
    public $descricao;
    public $comentarios;
    public $data_cadastro;
    public $data_inicio = "";
    public $data_final = "";
    public $hora_cadastro;
    public $hora_inicio = "";
    public $hora_final = "";
    public $status;
    public $tb_usuarios_id;
    public $tb_tarefas_tipo_id;
    public $tb_projetos_id;
    public $session;
    
    function getSession() {
        return $this->session;
    }

    function setSession($session) {
        $this->session = $session;
    }

    
    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getComentarios() {
        return $this->comentarios;
    }

    function getData_cadastro() {
        return $this->data_cadastro;
    }

    function getData_inicio() {
        return $this->data_inicio;
    }

    function getData_final() {
        return $this->data_final;
    }

    function getHora_cadastro() {
        return $this->hora_cadastro;
    }

    function getHora_inicio() {
        return $this->hora_inicio;
    }

    function getHora_final() {
        return $this->hora_final;
    }

    function getStatus() {
        return $this->status;
    }

    function getTb_usuarios_id() {
        return $this->tb_usuarios_id;
    }

    function getTb_tarefas_tipo_id() {
        return $this->tb_tarefas_tipo_id;
    }

    function getTb_projetos_id() {
        return $this->tb_projetos_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setComentarios($comentarios) {
        $this->comentarios = $comentarios;
    }

    function setData_cadastro($data_cadastro) {
        $this->data_cadastro = $data_cadastro;
    }

    function setData_inicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }

    function setData_final($data_final) {
        $this->data_final = $data_final;
    }

    function setHora_cadastro($hora_cadastro) {
        $this->hora_cadastro = $hora_cadastro;
    }

    function setHora_inicio($hora_inicio) {
        $this->hora_inicio = $hora_inicio;
    }

    function setHora_final($hora_final) {
        $this->hora_final = $hora_final;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setTb_usuarios_id($tb_usuarios_id) {
        $this->tb_usuarios_id = $tb_usuarios_id;
    }

    function setTb_tarefas_tipo_id($tb_tarefas_tipo_id) {
        $this->tb_tarefas_tipo_id = $tb_tarefas_tipo_id;
    }

    function setTb_projetos_id($tb_projetos_id) {
        $this->tb_projetos_id = $tb_projetos_id;
    }

    public function __construct() {
        $this->Conecta();

        $this->session = $_SESSION['id'];
        $this->tabela = "tb_tarefas";
        $this->tabela_users = "tb_usuarios";
        $this->tabela_tipo_tarefas = "tb_tarefas_tipo";
        $this->tabela_projetos = "tb_projetos";

        if (!isset($_SESSION['id'])) {
            header('Location:' . HOME_URI . '/login/index/');
            exit;
        }
    }

    public function permissao() {

        $this->perm_admin = 'admin';
        $perm = $this->mysqli->prepare("SELECT * FROM `$this->tabela_users` WHERE id='$this->session' AND permissao='$this->perm_admin'");
        $perm->execute();
        $perm->store_result();
        $rows = $perm->num_rows;

        if ($rows === 0) {
            header('Location:' . HOME_URI . '/tarefas/erro/');
            exit;
        }
    }

    public function save() {

        $this->permissao();
        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela`
            (titulo, descricao, comentarios, data_cadastro, data_final, hora_cadastro, hora_final, status, usuario_cadastra, tb_usuarios_id, tb_tarefas_tipo_id, tb_projetos_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('sssssssiiiii', $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->data_final, $this->hora_cadastro, $this->hora_final, $this->status, $this->session, $this->tb_usuarios_id, $this->tb_tarefas_tipo_id, $this->tb_projetos_id);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET titulo = ?, texto = ? WHERE id = ?");
        $sql->bind_param('ssi', $this->titulo, $this->texto, $param);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function listAll() {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.comentarios, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome, e.nome "
                . "FROM `$this->tabela` as a "
                . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
                . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
                . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id "
                . "INNER JOIN `$this->tabela_users` as e on a.usuario_cadastra = e.id "
                . "WHERE a.status = '2' and a.tb_usuarios_id = ".$this->session);
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto, $this->nome_criador);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['comentarios'] = $this->comentarios;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;
            $PaginasModel['nome_criador'] = $this->nome_criador;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }

    public function FiltroRelatoriosAberto($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.comentarios, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
                . "FROM `$this->tabela` as a "
                . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
                . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
                . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '2' and a.tb_usuarios_id = $param");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['comentarios'] = $this->comentarios;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }
    public function FiltroRelatoriosFechado($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.comentarios, a.data_cadastro, a.hora_cadastro, a.data_final, a.hora_final, b.nome, c.tipo, d.nome "
                . "FROM `$this->tabela` as a "
                . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
                . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
                . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '1' and a.tb_usuarios_id = $param");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->hora_cadastro, $this->data_final, $this->hora_final, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['comentarios'] = $this->comentarios;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['data_final'] = $this->data_final;
            $PaginasModel['hora_final'] = $this->hora_final;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }

    public function listRelatorios() {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.comentarios, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
                . "FROM `$this->tabela` as a "
                . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
                . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
                . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['comentarios'] = $this->comentarios;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }

    public function listTarefa($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.comentarios, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
                . "FROM `$this->tabela` as a "
                . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
                . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
                . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.id = $param");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->comentarios, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['comentarios'] = $this->comentarios;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT titulo, texto FROM `$this->tabela` WHERE id='$param'");
        $sql->execute();
        $sql->bind_result($this->titulo, $this->texto);
        $sql->fetch();

        $lista = array();
        $PaginasModel['titulo'] = $this->titulo;
        $PaginasModel['texto'] = $this->texto;

        $lista[] = $PaginasModel;

        return $lista;
    }

    public function listUsuarios() {

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela_users`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['id'] = $this->id;
            $GeralModel['nome'] = $this->nome;

            $lista[] = $GeralModel;
        }
        return $lista;
    }

    public function listTarefasTipo() {

        $sql = $this->mysqli->prepare("SELECT id, tipo FROM `$this->tabela_tipo_tarefas`");
        $sql->execute();
        $sql->bind_result($this->id, $this->tipo);

        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['id'] = $this->id;
            $GeralModel['tipo'] = $this->tipo;

            $lista[] = $GeralModel;
        }
        return $lista;
    }

    public function listProjetos() {

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela_projetos`");
        $sql->execute();
        $sql->bind_result($this->id, $this->nome);

        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['id'] = $this->id;
            $GeralModel['nome'] = $this->nome;

            $lista[] = $GeralModel;
        }
        return $lista;
    }
    
    public function finalizar($param){
        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET data_final = ?, hora_final= ?, status= ? WHERE id = ?");
        $sql->bind_param('ssii', $this->data_final, $this->hora_final, $this->status, $param);
        $sql->execute();
        
        header('Location:' . HOME_URI . '/tarefas/lista/');
    }

}