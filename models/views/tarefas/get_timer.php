<?php

// definir no seu código

$host = "mysql.falcon5m.com.br";
$usuario = "falcon5m28";
$senha = "falcon14"; // mudar a senha para a do seu banco! :) 
$banco = "falcon5m28";    // mudar o nome para o do seu banco! :)
//
//
// incia a conexão usando o construtor da classe mysqli passando os parâmetros de conexão
//$con = new PDO($host, $usuario, $senha, $banco);
$con = new PDO("mysql:host=$host;dbname=falcon5m28", $usuario, $senha);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_POST['id_tarefa'];

$tarefa_id = $id;
//$tarefa_id = 12;;

$user_id = 1; // $_SESSION['user_id'];

$params = array(':user' => $tarefa_id);
$stt = $con->prepare('SELECT `action`, `timestamp` FROM `tb_timer` WHERE `tb_tarefas_id` = :user ORDER BY `id`');
$stt->execute($params);
$tempos = $stt->fetchAll(PDO::FETCH_ASSOC);
$seconds = 0;
$action = 'pause'; // sempre inicia pausado
foreach ($tempos as $tempo) {
    $action = $tempo['action'];
    switch ($action) {
        case 'start':
            $seconds -= $tempo['timestamp'];
            break;
        case 'pause':
            // para evitar erro se a primeira ação for pause
            if ($seconds !== 0) {
                $seconds += $tempo['timestamp'];
            }
            break;
    }
}
if ($action === 'start') {
    $seconds += time();
}
header('Content-Type: application/json');
echo json_encode(array(
    'seconds' => $seconds,
    'running' => $action === 'start',
));
