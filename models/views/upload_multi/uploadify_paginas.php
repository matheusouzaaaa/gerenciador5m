<?php
/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */
// Define a destination
$targetFolder = '../_paginas';
$id = $_GET['id'];
$legenda = "";

include("../../bd.php");

if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $targetFolder;
    $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];
    $targetFinalFile = $_FILES['Filedata']['name'];

    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);

    if (in_array($fileParts['extension'], $fileTypes)) {

        $ext = pathinfo($targetFinalFile, PATHINFO_EXTENSION);

        if ($ext === 'jpg') {

            $numero = rand(1, 8000000);
            $nomeimg2 = $numero . '-' . $targetFinalFile;
            $imagem = $tempFile;

            $img = imagecreatefromjpeg($imagem);

            $largura_original_x = imagesx($img);
            $altura_original_y = imagesy($img);


            $valor = $largura_original_x;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_largura = $valor - ($percentual * $valor);

            $valor2 = $altura_original_y;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_altura = $valor2 - ($percentual * $valor2);

            $largura_nova = ($largura_original_x * $altura_original_y / $altura_original_y) - $porcentagem_largura;
            $altura_nova = ($altura_original_y * $largura_original_x / $largura_original_x) - $porcentagem_altura;

            $caminho = '../_paginas/' . $nomeimg2;
            $nova_imagem = imagecreatetruecolor($largura_nova, $altura_nova);
            imagecopyresampled($nova_imagem, $img, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original_x, $altura_original_y);
            imagejpeg($nova_imagem, $caminho, 90);
            imagedestroy($img);
            imagedestroy($nova_imagem);

            $sql = "INSERT INTO tb_paginas_fotos (tb_paginas_id, url, legenda) VALUES ('$id', '$nomeimg2', '$legenda')";
            mysqli_query($conn, $sql);
        }

        if ($ext === 'jpeg') {

            $numero = rand(1, 8000000);
            $nomeimg2 = $numero . '-' . $targetFinalFile;
            $imagem = $tempFile;

            $img = imagecreatefromjpeg($imagem);

            $largura_original_x = imagesx($img);
            $altura_original_y = imagesy($img);


            $valor = $largura_original_x;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_largura = $valor - ($percentual * $valor);

            $valor2 = $altura_original_y;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_altura = $valor2 - ($percentual * $valor2);

            $largura_nova = ($largura_original_x * $altura_original_y / $altura_original_y) - $porcentagem_largura;
            $altura_nova = ($altura_original_y * $largura_original_x / $largura_original_x) - $porcentagem_altura;

            $caminho = '../_paginas/' . $nomeimg2;
            $nova_imagem = imagecreatetruecolor($largura_nova, $altura_nova);
            imagecopyresampled($nova_imagem, $img, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original_x, $altura_original_y);
            imagejpeg($nova_imagem, $caminho, 90);
            imagedestroy($img);
            imagedestroy($nova_imagem);


            $sql = "INSERT INTO tb_paginas_fotos (tb_paginas_id, url, legenda) VALUES ('$id', '$nomeimg2', '$legenda')";
            mysqli_query($conn, $sql);
        }

        if ($ext === 'JPG') {

            $numero = rand(1, 8000000);
            $nomeimg2 = $numero . '-' . $targetFinalFile;
            $imagem = $tempFile;

            $img = imagecreatefromjpeg($imagem);

            $largura_original_x = imagesx($img);
            $altura_original_y = imagesy($img);


            $valor = $largura_original_x;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_largura = $valor - ($percentual * $valor);

            $valor2 = $altura_original_y;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_altura = $valor2 - ($percentual * $valor2);

            $largura_nova = ($largura_original_x * $altura_original_y / $altura_original_y) - $porcentagem_largura;
            $altura_nova = ($altura_original_y * $largura_original_x / $largura_original_x) - $porcentagem_altura;

            $caminho = 'home/falcon5m/www/projetos/estilocasarao/admin/views/_paginas/' . $nomeimg2;
            $nova_imagem = imagecreatetruecolor($largura_nova, $altura_nova);
            imagecopyresampled($nova_imagem, $img, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original_x, $altura_original_y);
            imagejpeg($nova_imagem, $caminho, 90);
            imagedestroy($img);
            imagedestroy($nova_imagem);


            $caminho = '../_paginas/' . $nomeimg2;
            mysqli_query($conn, $sql);
        }

        if ($ext === 'png') {

            $numero = rand(1, 8000000);
            $nomeimg2 = $numero . '-' . $targetFinalFile;
            $imagem = $tempFile;

            $img = imagecreatefrompng($imagem);

            $largura_original_x = imagesx($img);
            $altura_original_y = imagesy($img);


            $valor = $largura_original_x;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_largura = $valor - ($percentual * $valor);

            $valor2 = $altura_original_y;
            $percentual = 40.0 / 100.0; // 40%
            $porcentagem_altura = $valor2 - ($percentual * $valor2);

            $largura_nova = ($largura_original_x * $altura_original_y / $altura_original_y) - $porcentagem_largura;
            $altura_nova = ($altura_original_y * $largura_original_x / $largura_original_x) - $porcentagem_altura;

            $caminho = '../_paginas/' . $nomeimg2;
            $nova_imagem = imagecreatetruecolor($largura_nova, $altura_nova);
            $white = imagecolorallocate($nova_imagem, 255, 255, 255);
            imagefilledrectangle($nova_imagem, 0, 0, $largura_nova, $altura_nova, $white);
            imagecopyresampled($nova_imagem, $img, 0, 0, 0, 0, $largura_nova, $altura_nova, $largura_original_x, $altura_original_y);
            imagepng($nova_imagem, $caminho);
            imagedestroy($img);
            imagedestroy($nova_imagem);

            $sql = "INSERT INTO tb_paginas_fotos (tb_paginas_id, url, legenda) VALUES ('$id', '$nomeimg2', '$legenda')";
            mysqli_query($conn, $sql);
        }
    }
//    }
}
?>