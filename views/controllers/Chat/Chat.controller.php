<?php

require_once MODELS . '/Chat/Chat.class.php';

class ChatController extends Chat {

    public function __construct() {
        $this->model = New Chat();
    }

    public function index() {

        if ($_POST['submit']) {
            $this->model->setData($_POST['data']);
            $this->model->setHorario($_POST['horario']);
            $this->model->setTexto($_POST['texto']);
            $this->model->save($this->model);

            header('Location:' . HOME_URI . '/chat/index/');
        } else {

            $this->view = $this->model->listAll();
            $this->load = load_view($controller = 'chat', $action = 'index', $mensagem = null, $this->view);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/chat/lista');
    }

}
