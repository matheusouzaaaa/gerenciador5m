<?php

require_once MODELS . '/Clientes/Clientes.class.php';

class ClientesController extends Clientes {

    public function __construct() {
        $this->model = New Clientes();
    }

    public function lista() {

        if ($_POST['submit']) {

            $this->model->setExcluir($_POST['excluir']);
            $this->model->removeall($this->model);

            header('Location:' . HOME_URI . '/clientes/lista/');
        } 
        if ($_POST['submit-nome']) {

            $this->model->setNome($_POST['nome']);
            $this->view = $this->model->listNome();
            $this->load = load_view($controller = 'clientes', $action = 'lista', $mensagem = null, $this->view);
        }
        if ($_POST['submit-email']) {

            $this->model->setEmail($_POST['email']);
            $this->view = $this->model->listEmail();
            $this->load = load_view($controller = 'clientes', $action = 'lista', $mensagem = null, $this->view);
        }
        if ($_POST['submit-estado']) {

            $this->model->setEstado($_POST['estado']);
            $this->view = $this->model->listEstado();
            $this->load = load_view($controller = 'clientes', $action = 'lista', $mensagem = null, $this->view);
        }
        else {

            $this->view = $this->model->listAll();
            $this->load = load_view($controller = 'clientes', $action = 'lista', $mensagem = null, $this->view);
        }
    }

    public function adicionar() {

        if ($_POST['submit']) {

            $this->model->setNome($_POST['nome']);
            $this->model->setEmail($_POST['email']);
            $this->model->setTipo_pessoa($_POST['tipo_pessoa']);
            $this->model->setDocumento($_POST['documento']);
            $this->model->setTelefone($_POST['telefone']);
            $this->model->setCelular($_POST['celular']);
            $this->model->setCep($_POST['cep']);
            $this->model->setEstado($_POST['estado']);
            $this->model->setCidade($_POST['cidade']);
            $this->model->setBairro($_POST['bairro']);
            $this->model->setEndereco($_POST['endereco']);
            $this->model->setNumero($_POST['numero']);
            $this->model->setObs($_POST['obs']);
            $this->model->setAnexo($_FILES['anexo']['name']);
            $this->model->setAnexo_tmp($_FILES['anexo']['tmp_name']);
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
            $this->model->setEmail($_POST['email']);
            $this->model->setTipo_pessoa($_POST['tipo_pessoa']);
            $this->model->setDocumento($_POST['documento']);
            $this->model->setTelefone($_POST['telefone']);
            $this->model->setCelular($_POST['celular']);
            $this->model->setCep($_POST['cep']);
            $this->model->setEstado($_POST['estado']);
            $this->model->setCidade($_POST['cidade']);
            $this->model->setBairro($_POST['bairro']);
            $this->model->setEndereco($_POST['endereco']);
            $this->model->setNumero($_POST['numero']);
            $this->model->setObs($_POST['obs']);
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
    
    public function fotos($param) {

        if ($_POST['submit']) {

            $this->model->setAnexo($_FILES['anexo']['name']);
            $this->model->setAnexo_tmp($_FILES['anexo']['tmp_name']);
            $this->model->updatearquivo($param, $this->model);

            header('Location:' . HOME_URI . '/clientes/fotos/' . $param);
        } else {

            $this->view = $this->model->listfotoID($param);
            $this->load = load_view($controller = 'clientes', $action = 'fotos', $mensagem = null, $this->view);
        }
    }

}
