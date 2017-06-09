<?php

$url = $_GET['url'];
$url = explode('/', $url);

if(empty($url[0])): $controller = 'Tarefas'; endif;

$controller = ucfirst($url[0]);
$controllerurl = ucfirst($url[0]) . 'Controller';
$action = $url[1];
$param = $url[2];
$url_padrao = HOME_URI . "/tarefas/index";


if((empty($controller)) && empty($action)): header("location: $url_padrao ");endif;


require_once 'controllers/' . $controller . "/" . $controller . '.controller' . '.php';

$acao = New $controllerurl();
$acao->$action($param);

