<?php

// definir no seu códigoS
$host = "mysql.falcon5m.com.br";
$usuario = "falcon5m28";
$senha = "falcon14"; // mudar a senha para a do seu banco! :) 
$banco = "falcon5m28";    // mudar o nome para o do seu banco! :)

// incia a conexão usando o construtor da classe mysqli passando os parâmetros de conexão
//$con = new PDO($host, $usuario, $senha, $banco);
$con = new PDO("mysql:host=$host;dbname=falcon5m28", $usuario, $senha);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id_tarefa'];

$tarefa_id = $id;

$user_id = 1; // $_SESSION['user_id'];

$params = array(':user' => $tarefa_id);
$stt1 = $con->prepare('SELECT `action` FROM `tb_timer` WHERE `tb_tarefas_id` = :user ORDER BY `id` DESC LIMIT 1');
$stt1->execute($params);
$newAction = 'start';
if ($stt1->rowCount() && $stt1->fetchColumn() === 'start') {
    $newAction = 'pause';
}
$stt2 = $con->prepare('INSERT INTO `tb_timer` (`action`, `timestamp`,`tb_tarefas_id`) VALUES (:action, :time, :user )');
$params[':action'] = $newAction;
$params[':time'] = time();
$stt2->execute($params);
header('Content-Type: application/json');
echo json_encode(array(
    'running' => $newAction === 'start',
)); // para atualizar status, no caso de concorrência