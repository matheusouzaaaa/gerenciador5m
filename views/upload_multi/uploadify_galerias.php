<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */
// Define a destination
$targetFolder = '../_galerias';
$id = $_GET['id'];
$legenda = "";

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

        include("../../bd.php");

        $sql = "INSERT INTO tb_galerias_fotos (tb_galerias_id, url, legenda) VALUES ('$id', '$targetFinalFile', '$legenda')";
        mysqli_query($conn, $sql);
    }
//    }
}
?>