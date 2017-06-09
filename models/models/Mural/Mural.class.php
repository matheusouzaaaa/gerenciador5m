<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Mural extends Conexao {

    public $id;
    public $tipo;
    public $titulo;
    public $descricao;
    public $comentario;
    public $data_cadastro;
    public $data_inicio = "";
    public $data_final = "";
    public $hora_cadastro;
    public $hora_inicio = "";
    public $hora_final = "";
    public $status;
    public $tb_usuarios_id;
    public $tb_tarefas_tipo_id;
    public $tb_tarefas_id;
    public $tb_projetos_id;
    public $session;

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getComentario() {
        return $this->comentario;
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

    function getTb_tarefas_id() {
        return $this->tb_tarefas_id;
    }

    function getTb_projetos_id() {
        return $this->tb_projetos_id;
    }

    function getSession() {
        return $this->session;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
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

    function setTb_tarefas_id($tb_tarefas_id) {
        $this->tb_tarefas_id = $tb_tarefas_id;
    }

    function setTb_projetos_id($tb_projetos_id) {
        $this->tb_projetos_id = $tb_projetos_id;
    }

    function setSession($session) {
        $this->session = $session;
    }

    
    public function __construct() {
        $this->Conecta();

        $this->session = $_SESSION['id'];
        $this->tabela = "tb_mural";
        $this->tabela_users = "tb_usuarios";

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


    public function publicarMural() {

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela` (comentario, data_cadastro, tb_usuarios_id) VALUES (?, ?, ?)");
        $sql->bind_param('ssi', $this->comentario, $this->data_cadastro, $this->session);
        $sql->execute();
        
        header('Location:' . HOME_URI . '/mural/index/');
    }

    public function listMural() {

        $sql = $this->mysqli->prepare("SELECT a.id, a.comentario, a.data_cadastro, b.nome FROM `$this->tabela` as a INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id order by a.id desc");
        $sql->execute();
        $sql->bind_result($this->id, $this->comentario, $this->data_cadastro, $this->nome_comentario);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['comentario'] = $this->comentario;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['nome_comentario'] = $this->nome_comentario;

            $lista[] = $PaginasModel;
            
        }
        
        return $lista;
        
    }

}
