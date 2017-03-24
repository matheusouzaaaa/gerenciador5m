<?php

require_once MODELS . '/Clientes/Clientes.class.php';

class ClientesController extends Clientes {

    public function __construct() {
        $this->model = New Clientes();
    }

    public function lista() {

        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'clientes', $action = 'lista', $mensagem = null, $this->view);
    }

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setNome($_POST['nome']);
            $this->model->save($this->model);

            $mensagem = 'Cliente cadastrado com sucesso!';

            $this->load = load_view($controller = 'clientes', $action = 'adicionar', $mensagem, $this->view = null);
        } else {

            $this->load = load_view($controller = 'clientes', $action = 'adicionar', $mensagem = null, $this->view = null);
        }
    }

    public function editar($param) {

        if ($_POST['submit']) {

            $this->model->setNome($_POST['nome']);
            $this->model->update($param, $this->model);

            header('Location:' . HOME_URI . '/clientes/editar/' . $param);
        } else {

            $this->view = $this->model->listID($param);
            $this->load = load_view($controller = 'clientes', $action = 'editar', $mensagem = null, $this->view);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/clientes/lista');
    }
    

}
