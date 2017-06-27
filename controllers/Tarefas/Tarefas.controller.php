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

    public function vazias() {

        $this->load = load_view($controller = 'tarefas', $action = 'index', $mensagem = null, $this->view = null);
    }

    public function graficos() {

        if ($_POST['submit-tipo-tarefa']) {

            $this->model->setTb_tarefas_tipo_id($_POST['tb_tarefas_tipo_id']);
            $this->view = $this->model->listTarefasTipo();
            $this->view2 = $this->model->listUsuarios();
            $this->view3 = $this->model->listGraficoTipoTarefa();
            $this->load = load_view($controller = 'tarefas', $action = 'graficos', $mensagem = null,$this->view, $this->view2, $this->view3);
        }
        if ($_POST['submit-usuario']) {

            $this->model->setTb_usuarios_id($_POST['tb_usuario_id']);
            $this->view = $this->model->listTarefasTipo();
            $this->view2 = $this->model->listUsuarios();
            $this->view4 = $this->model->listGraficoUsuarios();
            $this->load = load_view($controller = 'tarefas', $action = 'graficos', $mensagem = null,$this->view, $this->view2, $this->view3 = null, $this->view4);

        } else {
            $this->view = $this->model->listTarefasTipo();
            $this->view2 = $this->model->listUsuarios();
            $this->load = load_view($controller = 'tarefas', $action = 'graficos', $mensagem = null, $this->view, $this->view2);
        }
    }

    public function lista() {

        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'tarefas', $action = 'lista', $mensagem = null, $this->view);
    }

    public function finalizada($param) {

        $this->view = $this->model->listTarefaFinalizada($param);
        $this->view2 = $this->model->listComentarios($param);
        $this->load = load_view($controller = 'tarefas', $action = 'finalizada', $mensagem = null, $this->view, $this->view2);
    }

    public function tarefa($param) {

        if (isset($_POST['finalizar'])) {
            $this->model->setData_final($_POST['data_final']);
            $this->model->setHora_final($_POST['hora_final']);
            $this->model->setAno_entrega($_POST['ano_entrega']);
            $this->model->setMes_entrega($_POST['mes_entrega']);
            $this->model->setDia_entrega($_POST['dia_entrega']);
            $this->model->setStatus($_POST['status']);
            $this->model->finalizar($param, $this->model);

            $this->view = $this->model->listTarefa($param);
            $this->view2 = $this->model->listComentarios($param);
            $this->load = load_view($controller = 'tarefas', $action = 'tarefa', $mensagem = null, $this->view, $this->view2);
        }
        if (isset($_POST['comentario-tarefa'])) {
            $this->model->setComentario($_POST['comentario']);
            $this->model->setSession($_SESSION['id']);
            $this->model->setTb_tarefas_id($_POST['tb_tarefas_id']);
            $this->model->comentarTarefa($param, $this->model);

            $this->view = $this->model->listTarefa($param);
            $this->view2 = $this->model->listComentarios($param);
            $this->load = load_view($controller = 'tarefas', $action = 'tarefa', $mensagem = null, $this->view, $this->view2);
        } else {
            $this->view = $this->model->listTarefa($param);
            $this->view2 = $this->model->listComentarios($param);
            $this->load = load_view($controller = 'tarefas', $action = 'tarefa', $mensagem = null, $this->view, $this->view2);
        }
    }

    public function relatorios() {

        $this->view = $this->model->listUsuarios();
        $this->load = load_view($controller = 'tarefas', $action = 'relatorios', $mensagem = null, $this->view);
    }

    public function entregues($param) {

        if ($_POST['submit-tipo-tarefa']) {

            $this->model->setTb_tarefas_tipo_id($_POST['tb_tarefas_tipo_id']);
            $this->view = $this->model->listTarefasFiltradasAbertas();
            $this->view2 = $this->model->listTarefasFiltradasFechadas();
            $this->view3 = $this->model->listTarefasTipo();
            $this->load = load_view($controller = 'tarefas', $action = 'entregues', $mensagem = null,$this->view, $this->view2, $this->view3);
        } else {

            $this->view = $this->model->FiltroRelatoriosAberto($param);
            $this->view2 = $this->model->FiltroRelatoriosFechado($param);
            $this->view3 = $this->model->listTarefasTipo();
            $this->load = load_view($controller = 'tarefas', $action = 'entregues', $mensagem = null, $this->view, $this->view2, $this->view3);
        }


    }

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setTitulo($_POST['titulo']);
            $this->model->setDescricao($_POST['descricao']);
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

        if ($_POST['acao-editar-tarefa']) {

            $this->model->setTitulo($_POST['titulo']);
            $this->model->setDescricao($_POST['descricao']);
            $this->model->setTb_usuarios_id($_POST['tb_usuarios_id']);
            $this->model->update($param, $this->model);
            $this->mensagem = 'Tarefa atualizada com sucesso!';

            header('Location:' . HOME_URI . '/tarefas/editar/' . $param);
        } else {

            $this->view = $this->model->listID($param);
            $this->view2 = $this->model->listUsuarios();

            $this->load = load_view($controller = 'tarefas', $action = 'editar', $mensagem = null, $this->view, $this->view2);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/tarefas/lista');
    }

    public function tipo() {
        if ($_POST['submit-tipo']) {

            $this->model->setTipo($_POST['tipo']);
            $this->model->savetipo($this->model);

            $mensagem = 'Tipo de tarefa cadastrada com sucesso!';

            $this->load = load_view($controller = 'tarefas', $action = 'tipo', $mensagem, $this->view = null);
        } else {
            $this->load = load_view($controller = 'tarefas', $action = 'tipo', $mensagem = null, $this->view = null);
        }
    }

}
