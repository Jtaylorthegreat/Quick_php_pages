<?php
require 'library_confs.php';

if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filepath = $book_queue.$fileName;
    if(!empty($fileName) && file_exists($filepath)){
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/pdf");
        header('Content-Length: ' . filesize($filepath));

        readfile($filepath);
        exit;
    }else{
        echo 'The file does not exist.';
    }
}

?>
