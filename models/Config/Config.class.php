<?php

require_once MODELS . '/Conexao/Conexao.class.php';

class Config extends Conexao {

    public $id;
    public $email;
    public $telefone;
    public $cep;
    public $estado;
    public $cidade;
    public $bairro;
    public $endereco;
    public $numero;
    public $facebook;
    public $twitter;
    public $instagram;
    public $google;

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getNumero() {
        return $this->numero;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getInstagram() {
        return $this->instagram;
    }

    function getGoogle() {
        return $this->google;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    function setGoogle($google) {
        $this->google = $google;
    }

    
    public function __construct() {
        $this->Conecta();
        $this->tabela = "tb_config";

        if (!isset($_SESSION['id'])) {
            header('Location:' . HOME_URI . '/login/index/');
        }
    }

    public function update() {
        
        $this->id = '1';
        $sql = $this->mysqli->prepare(
                "UPDATE `$this->tabela` SET email = ?, telefone = ?, cep = ?, estado = ?, cidade = ?, bairro = ?, endereco = ?, numero = ?,
                facebook = ?, twitter = ?, instagram = ?, google = ?  
                WHERE id = ?"
                );
        $sql->bind_param('ssssssssssssi', 
                $this->email, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->endereco, $this->numero, 
                $this->facebook, $this->twitter, $this->instagram, $this->google, $this->id
                );
        $sql->execute();
    }

    public function listAll() {

        $this->id = '1';
        $sql = $this->mysqli->prepare("SELECT * FROM `$this->tabela` WHERE id='$this->id'");
        $sql->execute();
        $sql->bind_result(
                $this->id, $this->email, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->endereco, $this->numero,
                $this->facebook, $this->twitter, $this->instagram, $this->google
                );
        $sql->fetch();
        $lista = array();

        $ConfigModel['id'] = $this->id;
        $ConfigModel['email'] = $this->email;
        $ConfigModel['telefone'] = $this->telefone;
        $ConfigModel['cep'] = $this->cep;
        $ConfigModel['estado'] = $this->estado;
        $ConfigModel['cidade'] = $this->cidade;
        $ConfigModel['bairro'] = $this->bairro;
        $ConfigModel['endereco'] = $this->endereco;
        $ConfigModel['numero'] = $this->numero;
        $ConfigModel['facebook'] = $this->facebook;
        $ConfigModel['twitter'] = $this->twitter;
        $ConfigModel['instagram'] = $this->instagram;
        $ConfigModel['google'] = $this->google;

        $lista[] = $ConfigModel;
        return $lista;
    }

}
