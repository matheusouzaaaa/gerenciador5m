<?php

require_once MODELS . '/Chat/Chat.class.php';

class ChatController extends Chat {

    public function __construct() {
        $this->model = New Chat();
    }

    public function index() {

        // $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'chat', $action = 'index', $mensagem = null, $this->view = null);
    }

}
