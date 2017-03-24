<?php

require_once MODELS . '/Projetos/Projetos.class.php';

class ProjetosController extends Projetos {

    public function __construct() {
        $this->model = New Projetos();
    }

    public function lista() {

        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'projetos', $action = 'lista', $mensagem = null, $this->view);
    }

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setNome($_POST['nome']);
            $this->model->setTb_clientes_id($_POST['tb_clientes_id']);
            $this->model->save($this->model);

            $this->view = $this->model->listClientes();

            $mensagem = 'Projeto cadastrado com sucesso!';

            $this->load = load_view($controller = 'projetos', $action = 'adicionar', $mensagem, $this->view);
        } else {
            $this->view = $this->model->listClientes();
            $this->load = load_view($controller = 'projetos', $action = 'adicionar', $mensagem = null, $this->view);
        }
    }

    public function editar($param) {

        if (isset($_POST['submit'])) {

            $this->model->setNome($_POST['nome']);
            $this->model->setTb_clientes_id($_POST['tb_clientes_id']);
            $this->model->update($param, $this->model);

            $this->view2 = $this->model->listClientes();

            header('Location:' . HOME_URI . '/projetos/editar/' . $param);
        } else {

            $this->view = $this->model->listID($param);
            $this->view2 = $this->model->listClientes();
            $this->load = load_view($controller = 'projetos', $action = 'editar', $mensagem = null, $this->view, $this->view2);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/projetos/lista');
    }
    

}
