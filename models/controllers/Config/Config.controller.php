<?php

require_once MODELS . '/Config/Config.class.php';

class ConfigController extends Config {

    public function __construct() {
        $this->model = New Config();
    }

    public function lista() {

        if ($_POST['submit']) {
            
            $this->model->setEmail($_POST['email']);
            $this->model->setTelefone($_POST['telefone']);
            $this->model->setCep($_POST['cep']);
            $this->model->setEstado($_POST['estado']);
            $this->model->setCidade($_POST['cidade']);
            $this->model->setBairro($_POST['bairro']);
            $this->model->setEndereco($_POST['endereco']);
            $this->model->setNumero($_POST['numero']);
            $this->model->setFacebook($_POST['facebook']);
            $this->model->setTwitter($_POST['twitter']);
            $this->model->setInstagram($_POST['instagram']);
            $this->model->setGoogle($_POST['google']);
            $this->model->update($this->model);
            
            $mensagem = 'Configurações atualizadas com sucesso!';
            $this->view = $this->model->listAll();
            $this->load = load_view($controller = 'config', $action = 'lista', $mensagem, $this->view);
        } else {
            $this->view = $this->model->listAll();
            $this->load = load_view($controller = 'config', $action = 'lista', $mensagem = null, $this->view);
        }
    }

}
