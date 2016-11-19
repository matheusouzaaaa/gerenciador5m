<?php

require_once MODELS . '/Usuarios/Usuarios.class.php';

class UsuariosController extends Usuarios {

    public function __construct() {
        $this->model = New Usuarios();
    }

    public function lista() {

        $this->view = $this->model->listAll();
        $this->load = load_view($controller = 'usuarios', $action = 'lista', $mensagem = null, $this->view);
    }

//        require_once VIEWS . '/usuarios/usuarios-lista.php';

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setPermissao($_POST['permissao']);
            $this->model->setNome($_POST['nome']);
            $this->model->setEmail($_POST['email']);
            $this->model->setPassword(md5_hash($_POST['password']));
            $this->model->setCargo($_POST['cargo']);
            $this->model->setTelefone($_POST['telefone']);
            $this->model->setTb_equipes_id($_POST['tb_equipes_id']);
            $this->model->save($this->model);

            $mensagem = 'Usuário cadastrado com sucesso!';
            $this->view = $this->model->listEquipes();
            $this->load = load_view($controller = 'usuarios', $action = 'adicionar', $mensagem, $this->view);
        } else {
            $this->view = $this->model->listEquipes();
            $this->load = load_view($controller = 'usuarios', $action = 'adicionar', $mensagem = null, $this->view);
        }
    }

    public function editar($param) {

        if ($_POST['submit']) {

            $this->model->setPermissao($_POST['permissao']);
            $this->model->setNome($_POST['nome']);
            $this->model->setEmail($_POST['email']);
            $this->model->setPassword(md5_hash($_POST['password']));
            $this->model->setCargo($_POST['cargo']);
            $this->model->setTelefone($_POST['telefone']);
            $this->model->setTb_equipes_id($_POST['tb_equipes_id']);
            $this->model->update($param, $this->model);

            header('Location:' . HOME_URI . '/usuarios/editar/' . $param);
        }

        if ($_POST['submit-password']) {

            $this->model->setPassword(md5_hash($_POST['password']));
            $this->model->updatepassword($param, $this->model);

            header('Location:' . HOME_URI . '/usuarios/editar/' . $param);
        } else {

            $this->view = $this->model->listID($param);
            $this->load = load_view($controller = 'usuarios', $action = 'editar', $mensagem = null, $this->view);
        }
    }

    public function excluir($param) {

        $this->model->remove($param);
        header('Location:' . HOME_URI . '/usuarios/lista');
    }

}
