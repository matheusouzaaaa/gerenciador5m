<?php

require_once MODELS . '/Tarefas/Tarefas.class.php';

class TarefasController extends Tarefas {

    public function __construct() {
        $this->model = New Tarefas();
    }

    public function index() {
        
        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'tarefas', $action = 'index', $mensagem = null, $this->view);
    }

    public function lista() {

        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'tarefas', $action = 'lista', $mensagem = null, $this->view);
    }

    public function tarefa($param) {

        if (isset($_POST['finalizar'])) {
            $this->model->setData_final($_POST['data_final']);
            $this->model->setHora_final($_POST['hora_final']);
            $this->model->setStatus($_POST['status']);
            $this->model->finalizar($param, $this->model);
            
            $this->view = $this->model->listTarefa($param);
            $this->load = load_view($controller = 'tarefas', $action = 'tarefa', $mensagem = null, $this->view);
            
        } else {
            $this->view = $this->model->listTarefa($param);
            $this->load = load_view($controller = 'tarefas', $action = 'tarefa', $mensagem = null, $this->view);
        }
    }

    public function relatorios() {

        $this->view = $this->model->listUsuarios();
        $this->load = load_view($controller = 'tarefas', $action = 'relatorios', $mensagem = null, $this->view);
    }

    public function entregues($param) {
        $this->view = $this->model->FiltroRelatoriosAberto($param);
        $this->view2 = $this->model->FiltroRelatoriosFechado($param);
        $this->load = load_view($controller = 'tarefas', $action = 'entregues', $mensagem = null, $this->view, $this->view2);
    }

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setTitulo($_POST['titulo']);
            $this->model->setDescricao($_POST['descricao']);
            $this->model->setComentarios($_POST['comentarios']);
            $this->model->setData_cadastro($_POST['data_cadastro']);
            $this->model->setData_inicio($_POST['data_inicio']);
            $this->model->setData_final($_POST['data_final']);
            $this->model->setHora_cadastro($_POST['hora_cadastro']);
            $this->model->setHora_inicio($_POST['hora_inicio']);
            $this->model->setHora_final($_POST['hora_final']);
            $this->model->setStatus($_POST['status']);
            $this->model->setSession($_SESSION['id']);
            $this->model->setTb_usuarios_id($_POST['tb_usuarios_id']);
            $this->model->setTb_tarefas_tipo_id($_POST['tb_tarefas_tipo_id']);
            $this->model->setTb_projetos_id($_POST['tb_projetos_id']);
            $this->model->save($this->model);

            $mensagem = 'Tarefa cadastrada com sucesso!';

            $this->view2 = $this->model->listUsuarios();
            $this->view3 = $this->model->listTarefasTipo();
            $this->view4 = $this->model->listProjetos();

            $this->load = load_view($controller = 'tarefas', $action = 'adicionar', $mensagem, $this->view = null, $this->view2, $this->view3, $this->view4);
        } else {
            $this->view2 = $this->model->listUsuarios();
            $this->view3 = $this->model->listTarefasTipo();
            $this->view4 = $this->model->listProjetos();
            $this->load = load_view($controller = 'tarefas', $action = 'adicionar', $mensagem = null, $this->view = null, $this->view2, $this->view3, $this->view4);
        }
    }

    public function editar($param) {

        if ($_POST['submit']) {

            $this->model->setTitulo($_POST['titulo']);
            $this->model->setTexto($_POST['texto']);
            $this->model->update($param, $this->model);
            $this->mensagem = 'Tarefa atualizada com sucesso!';

            header('Location:' . HOME_URI . '/tarefas/editar/' . $param);
        } else {

            $this->view = $this->model->listID($param);

            $this->load = load_view($controller = 'tarefas', $action = 'editar', $mensagem = null, $this->view);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/tarefas/lista');
    }

}