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
            $this->model->setUser($_POST['user']);
            $this->model->setEmail($_POST['email']);
            $this->model->setPassword(md5_hash($_POST['password']));
            $this->model->setDica($_POST['dica']);
            $this->model->setOperador($_POST['operador']);
            $this->model->setAtivo($_POST['ativo']);
            $this->model->save($this->model);

            $mensagem = 'Usuário cadastrado com sucesso!';

            $this->load = load_view($controller = 'usuarios', $action = 'adicionar', $mensagem, $this->view = null);
        } else {
            $this->load = load_view($controller = 'usuarios', $action = 'adicionar', $mensagem = null, $this->view = null);
        }
    }

    public function editar($param) {

        if ($_POST['submit']) {

            $this->model->setPermissao($_POST['permissao']);
            $this->model->setNome($_POST['nome']);
            $this->model->setEmail($_POST['email']);
            $this->model->setUser($_POST['user']);
            $this->model->setOperador($_POST['operador']);
            $this->model->setAtivo($_POST['ativo']);
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
