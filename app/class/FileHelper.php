<?php

class FileHelper
{
    public function getExtension(string $originalName)
    {
        $lastDotPosition = strrpos($originalName, ".");
        $ext = substr($originalName, $lastDotPosition);

        return $ext;
    }

    public function hasValidUploadedFile($name)
    {
        return isset($_FILES[$name])
            && $_FILES[$name]["error"] == UPLOAD_ERR_OK
            && $_FILES[$name]["size"] > 0;
    }

    public function getUploadPath(string $subfolder ="")
    {
        $path = Router::getInstance()->getWwwPath(true)."/uploads/";
        if ($subfolder)
        {
            $path .= "$subfolder/";
        }

        return $path;
    }

    public function saveUploadFile(string $name, string $baseName, string $folder)
    {
        $originalFileName = $_FILES[$name]["name"];
        $newName = $baseName.$this->getExtension($originalFileName);

        $newFullName = $this->getUploadPath($folder).$newName;
        move_uploaded_file($_FILES[$name]["tmp_name"], $newFullName);

        return $newName;
    }

    public function removeImage($filename, $folder)
    {
        $fullFileName = $this->getUploadPath($folder).$filename;
        if (file_exists($fullFileName))
        {
            unlink($fullFileName);
        }
    }
}