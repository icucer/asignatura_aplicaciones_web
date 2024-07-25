<?php

/* @autor Ion Cucer */

class FileUploader {
    private $target_dir;

    public function __construct($target_dir = "../assets/img/img_upload/") {
        $this->target_dir = $target_dir;
    }

    public function upload($file) {
        $target_file = $this->target_dir . basename($file["name"]);
        
        if ($this->fileExists($target_file)) {
            return "Lo siento, el archivo ya existe.";
        }

        if ($this->moveFile($file, $target_file)) {
            // Retorna la ruta relativa del archivo cargado
            return $target_file;
        } else {
            return "Lo siento, hubo un error al subir tu archivo.";
        }
    }

    private function fileExists($target_file) {
        return file_exists($target_file);
    }

    private function moveFile($file, $target_file) {
        return move_uploaded_file($file["tmp_name"], $target_file);
    }
}
?>