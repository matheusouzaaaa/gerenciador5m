<?php

require_once MODELS . '/Login/Login.class.php';

class LoginController extends Login {

    public function __construct() {
        $this->model = New Login();
    }

    public function index() {

        if ($_POST['submit']) {

            $this->model->setLogin($_POST['login']);
            $this->model->setPassword(secure(md5_hash($_POST['password'])));
            $this->model->autenticar($this->model);
            
        } else {

            $this->load = load_view($controller = 'login', $action = 'index', $mensagem = null, $this->view = null);
        }
    }
    
}
