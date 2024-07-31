<?php

namespace App\Http\Services\File;

class FileService extends FileToolsService
{

    public function moveToPublic($files)
    {
        $this->setFile($files);
        $this->provider();
        $result = $files->move(public_path($this->getFinalFileDirectiory()), $this->getFinalFileName());
        return $result ? $this->getFileAddress() : false;
    }

    public function moveToStorage($files)
    {
        $this->setFile($files);
        $this->provider();
        $result = $files->move(storage_path($this->getFinalFileDirectiory()), $this->getFinalFileName());
        return $result ? $this->getFileAddress() : false;
    }

    public function deleteFile($filePath, $storage = false)
    {
        if ($storage) {
            unlink(storage_path($filePath));
            return true;
        }
        if (file_exists($filePath)) {
            unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

}

?>