<?php

require_once MODELS . '/Mural/Mural.class.php';

class MuralController extends Mural {

    public function __construct() {
        $this->model = New Mural();
    }

    public function index() {

        if (isset($_POST['comentario-mural'])) {
            $this->model->setComentario($_POST['comentario']);
            $this->model->setSession($_SESSION['id']);
            $this->model->setData_cadastro($_POST['data_cadastro']);
            $this->model->publicarMural($this->model);

            $this->view = $this->model->listMural();
            $this->load = load_view($controller = 'mural', $action = 'index', $mensagem = null, $this->view);
        } else {
            $this->view = $this->model->listMural();
            $this->load = load_view($controller = 'mural', $action = 'index', $mensagem = null, $this->view);
        }
    }
}
