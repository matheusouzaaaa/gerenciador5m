<?php

//SESSION START
ob_start();
session_start();

//DESLOGAR
if (isset($_GET['acao']) && $_GET['acao'] == 'sair'):
    unset($_SESSION['id']);
    session_destroy();
    header('Location:' . HOME_URI . '/login/index/');
endif;

//FUNCÕES GLOBAIS
function dataBR($data) {
    $data = implode("/", array_reverse(explode("-", $data)));
    return $data;
}

function dataUS($data) {
    $data = implode("-", array_reverse(explode("/", $data)));
    return $data;
}

function md5_hash($string) {
    $string = md5($string);
    return $string;
}

function horaBR($string){
    $string = explode(":", $string);
    return $string[0];
}
function minBR($string){
    $string = explode(":", $string);
    return $string[1];
}

function load_view($controller, $action, $mensagem, $view, $view2, $view3, $view4, $view5, $view6) {

    require_once VIEWS . '/' . $controller . "/" . $controller . '-' . $action . '.php';
}

//function secure($string) {
//    $string = addslashes($string);
//    return $string;
//}

function secure($string) {
    $_GET = array_map('trim', $_GET);
    $_POST = array_map('trim', $_POST);
    $_COOKIE = array_map('trim', $_COOKIE);
    $_REQUEST = array_map('trim', $_REQUEST);
    if (get_magic_quotes_gpc()) {
        $_GET = array_map('stripslashes', $_GET);
        $_POST = array_map('stripslashes', $_POST);
        $_COOKIE = array_map('stripslashes', $_COOKIE);
        $_REQUEST = array_map('stripslashes', $_REQUEST);
    }
    $_GET = array_map('mysql_real_escape_string', $_GET);
    $_POST = array_map('mysql_real_escape_string', $_POST);
    $_COOKIE = array_map('mysql_real_escape_string', $_COOKIE);
    $_REQUEST = array_map('mysql_real_escape_string', $_REQUEST);

    return $string;
}

function redimensionarImagem($imagem, $largura, $altura) {
    // Verifica extens�o do arquivo
    $extensao = strrchr($imagem, '.');
    switch ($extensao) {
        case '.png':
            $funcao_cria_imagem = 'imagecreatefrompng';
            $funcao_salva_imagem = 'imagepng';

            break;
        case '.gif':
            $funcao_cria_imagem = 'imagecreatefromgif';
            $funcao_salva_imagem = 'imagegif';

            break;
        case '.jpg':
            $funcao_cria_imagem = 'imagecreatefromjpeg';
            $funcao_salva_imagem = 'imagejpeg';

            break;
    }

    // Cria um identificador para nova imagem
    $imagem_original = $funcao_cria_imagem($imagem);

    // Salva o tamanho antigo da imagem
    list($largura_antiga, $altura_antiga) = getimagesize($imagem);

    // Cria uma nova imagem com o tamanho indicado
    // Esta imagem servir� de base para a imagem a ser reduzida
    $imagem_tmp = imagecreatetruecolor($largura, $altura);

    // Faz a interpola��o da imagem base com a imagem original
    imagecopyresampled($imagem_tmp, $imagem_original, 0, 0, 0, 0, $largura, $altura, $largura_antiga, $altura_antiga);

    // Salva a nova imagem
    $resultado = $funcao_salva_imagem($imagem_tmp, "../views/_depoimentos/" . $imagem . $extensao);

    // Libera memoria
    imagedestroy($imagem_original);
    imagedestroy($imagem_tmp);

    return $resultado;
}

function url_amigavel($texto){

        $url = $texto;
        $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
        $url = trim($url, "-");
        $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
        $url = strtolower($url);
        $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
        return $url;

}
