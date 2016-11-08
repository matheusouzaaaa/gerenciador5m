<?php

$dominiowww = $_SERVER['SERVER_NAME'];
$dominio = str_replace('www.', '', $_SERVER['HTTP_HOST']);

$host = "mysql." . $dominio;
$user = "falcon5m28";
$pass = "falcon14";
$bd = "falcon5m28";

$conn = mysqli_connect($host, $user, $pass, $bd);

?>