<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */
// Define a destination
$targetFolder = '../_noticias';
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
        move_uploaded_file($tempFile, $targetFile);

        $sql = "INSERT INTO tb_noticias_fotos (tb_noticias_id, url, legenda) VALUES ('$id', '$targetFinalFile', '$legenda')";
        mysqli_query($conn, $sql);
    }
//    }
}
?>