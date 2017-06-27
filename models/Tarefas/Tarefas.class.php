<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Tarefas extends Conexao {

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
    public $ano_entrega = "";
    public $mes_entrega = "";
    public $dia_entrega = "";
    public $quantidade;

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

    function getAno_entrega() {
        return $this->ano_entrega;
    }

    function getMes_entrega() {
        return $this->mes_entrega;
    }

    function getDia_entrega() {
        return $this->dia_entrega;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    function setDia_entrega($dia_entrega) {
        $this->dia_entrega = $dia_entrega;
    }

    function setMes_entrega($mes_entrega) {
        $this->mes_entrega = $mes_entrega;
    }

    function setAno_entrega($ano_entrega) {
        $this->ano_entrega = $ano_entrega;
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
        $this->tabela = "tb_tarefas";
        $this->tabela_users = "tb_usuarios";
        $this->tabela_tipo_tarefas = "tb_tarefas_tipo";
        $this->tabela_projetos = "tb_projetos";
        $this->tabela_comentarios = "tb_tarefas_comentarios";

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
            (titulo, descricao,data_cadastro, data_final, hora_cadastro, hora_final, status, usuario_cadastra, tb_usuarios_id, tb_tarefas_tipo_id, tb_projetos_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssiiiii', $this->titulo, $this->descricao, $this->data_cadastro, $this->data_final, $this->hora_cadastro, $this->hora_final, $this->status, $this->session, $this->tb_usuarios_id, $this->tb_tarefas_tipo_id, $this->tb_projetos_id);
        $sql->execute();
    }
    
    public function savetipo() {

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela_tipo_tarefas`
            (tipo) 
            VALUES (?)");
        $sql->bind_param('s', $this->tipo);
        $sql->execute();
    }

    public function update($param) {

        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET titulo = ?, descricao = ?, tb_usuarios_id = ? WHERE id = ?");
        $sql->bind_param('ssii', $this->titulo, $this->descricao, $this->tb_usuarios_id, $param);
        $sql->execute();
    }

    public function remove($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("DELETE FROM `$this->tabela` WHERE id = ?");
        $sql->bind_param('i', $param);
        $sql->execute();
    }

    public function listAll() {

        $session = $_SESSION['id'];

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome, e.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id "
            . "INNER JOIN `$this->tabela_users` as e on a.usuario_cadastra = e.id "
            . "WHERE a.status = '2' and a.tb_usuarios_id = '$session' order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto, $this->nome_criador);
        $sql->store_result();
        $rows = $sql->num_rows;
        // $sql->fetch();

        if ($rows === 0) {
            $this->load = load_view($controller = 'tarefas', $action = 'vazias', $mensagem, $this->view = null);
        }
        if ($rows >= 1) {
            $lista = array();
            while ($row = $sql->fetch()) {

                $PaginasModel['id'] = $this->id;
                $PaginasModel['titulo'] = $this->titulo;
                $PaginasModel['descricao'] = $this->descricao;
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
    }

    public function FiltroRelatoriosAberto($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '2' and a.tb_usuarios_id = $param order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, a.data_final, a.hora_final, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '1' and a.tb_usuarios_id = $param order by a.id desc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->data_final, $this->hora_final, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

    public function listTarefasFiltradasAbertas() {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, a.data_final, a.hora_final, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '2' and a.tb_tarefas_tipo_id = $this->tb_tarefas_tipo_id order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->data_final, $this->hora_final, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

    public function listTarefasFiltradasFechadas() {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, a.data_final, a.hora_final, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.status= '1' and a.tb_tarefas_tipo_id = $this->tb_tarefas_tipo_id order by a.id desc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->data_final, $this->hora_final, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao, a.data_cadastro, a.hora_cadastro, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.id = $param order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
            $PaginasModel['data_cadastro'] = $this->data_cadastro;
            $PaginasModel['hora_cadastro'] = $this->hora_cadastro;
            $PaginasModel['nome_usuario'] = $this->nome_usuario;
            $PaginasModel['tipo'] = $this->tipo;
            $PaginasModel['nome_projeto'] = $this->nome_projeto;

            $lista[] = $PaginasModel;
        }

        return $lista;
    }

    public function listTarefaFinalizada($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.titulo, a.descricao,  a.data_cadastro, a.hora_cadastro, a.data_final, a.hora_final, b.nome, c.tipo, d.nome "
            . "FROM `$this->tabela` as a "
            . "INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id "
            . "INNER JOIN `$this->tabela_tipo_tarefas` as c on a.tb_tarefas_tipo_id = c.id "
            . "INNER JOIN `$this->tabela_projetos` as d on a.tb_projetos_id = d.id WHERE a.id = $param order by a.id desc");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->data_cadastro, $this->hora_cadastro, $this->data_final, $this->hora_final, $this->nome_usuario, $this->tipo, $this->nome_projeto);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['titulo'] = $this->titulo;
            $PaginasModel['descricao'] = $this->descricao;
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

    public function listID($param) {

        $this->permissao();

        $sql = $this->mysqli->prepare("SELECT a.titulo, a.descricao, a.tb_usuarios_id, b.nome FROM `$this->tabela` as a inner join `$this->tabela_users` as b on a.tb_usuarios_id = b.id WHERE a.id='$param' order by a.id asc");
        $sql->execute();
        $sql->bind_result($this->titulo, $this->descricao, $this->tb_usuarios_id, $this->nome_usuario);
        $sql->fetch();

        $lista = array();
        $PaginasModel['titulo'] = $this->titulo;
        $PaginasModel['descricao'] = $this->descricao;
        $PaginasModel['tb_usuarios_id'] = $this->tb_usuarios_id;
        $PaginasModel['nome_usuario'] = $this->nome_usuario;

        $lista[] = $PaginasModel;

        return $lista;
    }

    public function listUsuarios() {

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela_users` order by nome");
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

        $sql = $this->mysqli->prepare("SELECT id, tipo FROM `$this->tabela_tipo_tarefas` order by tipo");
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

        $sql = $this->mysqli->prepare("SELECT id, nome FROM `$this->tabela_projetos` order by nome");
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

    public function finalizar($param) {
        $sql = $this->mysqli->prepare("UPDATE `$this->tabela` SET data_final = ?, hora_final= ?, dia_entrega= ?, mes_entrega= ?, ano_entrega= ?, status= ? WHERE id = ?");
        $sql->bind_param('ssiiiii', $this->data_final, $this->hora_final, $this->dia_entrega, $this->mes_entrega, $this->ano_entrega, $this->status, $param);
        $sql->execute();

        header('Location:' . HOME_URI . '/tarefas/lista/');
    }

    public function comentarTarefa($param) {

        $sql = $this->mysqli->prepare("INSERT INTO `$this->tabela_comentarios` (comentario, tb_usuarios_id, tb_tarefas_id) VALUES (?, ?, ?)");
        $sql->bind_param('sii', $this->comentario, $this->session, $this->tb_tarefas_id);
        $sql->execute();
        
        header('Location:' . HOME_URI . '/tarefas/tarefa/' . $param);
    }

    public function listComentarios($param) {

        $sql = $this->mysqli->prepare("SELECT a.id, a.comentario, b.nome FROM `$this->tabela_comentarios` as a INNER JOIN `$this->tabela_users` as b on a.tb_usuarios_id = b.id WHERE a.tb_tarefas_id='$param' order by a.id desc");
        $sql->execute();
        $sql->bind_result($this->id, $this->comentario, $this->nome_comentario);

        $lista = array();
        while ($row = $sql->fetch()) {

            $PaginasModel['id'] = $this->id;
            $PaginasModel['comentario'] = $this->comentario;
            $PaginasModel['nome_comentario'] = $this->nome_comentario;

            $lista[] = $PaginasModel;
            
        }
        
        return $lista;
        
    }

    public function listNome() {

        $sql = $this->mysqli->prepare("
            SELECT a.id, a.titulo, a.descricao, b.nome FROM `$this->tabela` AS a INNER JOIN `$this->tabela_users` AS b ON b.id = a.tb_usuarios_id
            WHERE a.nome='$this->nome' ORDER BY a.id ASC 
            ");
        $sql->execute();
        $sql->bind_result($this->id, $this->titulo, $this->descricao, $this->nome_usuario);

        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['id'] = $this->id;
            $GeralModel['titulo'] = $this->titulo;
            $GeralModel['descricao'] = $this->descricao;
            $GeralModel['nome_usuario'] = $this->nome_usuario;

            $lista[] = $GeralModel;
        }
        return $lista;
    }

    public function listGraficoTipoTarefa(){

        $sql = $this->mysqli->prepare("SELECT COUNT(*), YEAR(data_final), MONTH(data_final), DAY(data_final) FROM `$this->tabela` WHERE status = '1' and tb_tarefas_tipo_id='$this->tb_tarefas_tipo_id' GROUP BY 2,3");
        $sql->execute();
        $sql->bind_result($this->quantidade, $this->ano_entrega, $this->mes_entrega, $this->dia_entrega);


        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['quantidade'] = $this->quantidade;
            $GeralModel['ano_entrega'] = $this->ano_entrega;
            $GeralModel['mes_entrega'] = $this->mes_entrega;
            $GeralModel['dia_entrega'] = $this->dia_entrega;

            $lista[] = $GeralModel;
        }

        return $lista;

        
    }

    public function listGraficoUsuarios(){

        $sql = $this->mysqli->prepare("SELECT COUNT(*), YEAR(data_final), MONTH(data_final), DAY(data_final) FROM `$this->tabela` WHERE status = '1' and tb_usuarios_id='$this->tb_usuarios_id' GROUP BY 2,3");
        $sql->execute();
        $sql->bind_result($this->quantidade, $this->ano_entrega, $this->mes_entrega, $this->dia_entrega);


        $lista = array();
        while ($row = $sql->fetch()) {

            $GeralModel['quantidade'] = $this->quantidade;
            $GeralModel['ano_entrega'] = $this->ano_entrega;
            $GeralModel['mes_entrega'] = $this->mes_entrega;
            $GeralModel['dia_entrega'] = $this->dia_entrega;

            $lista[] = $GeralModel;
        }

        return $lista;

        
    }

}
