<?php

namespace App\Http\Services\File;

class FileToolsService
{

    protected $file;
    protected $exclusiveDirectory;
    protected $fileDirectory;
    protected $fileName;
    protected $fileFormat;
    protected $finalFileDirectiory;
    protected $finalFileName;
    protected $fileSize;

    public function setFile($file)
    {
        $this->file = $file;
    }

    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }

    public function setExclusiveDirectory($exclusiveDirectory)
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
    }

    public function getFileDirectory()
    {
        return $this->fileDirectory;
    }

    public function setFileDirectory($fileDirectory)
    {
        $this->fileDirectory = trim($fileDirectory, '/\\');
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileSize()
    {
        return $this->fileSize;
    }

    public function setFileSize($file)
    {
        $this->fileSize = $file->getSize();
    }

    public function setCurrentFileName()
    {
        return !empty($this->fileName) ? $this->setFileName(pathinfo($this->file->getClientOriginalName()), PATHINFO_FILENAME) : false;
    }

    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    public function setFileFormat($fileFormat)
    {
        $this->fileFormat = $fileFormat;
    }

    public function getFinalFileDirectiory()
    {
        return $this->finalFileDirectiory;
    }

    public function setFinalFileDirectiory($finalFileDirectiory)
    {
        $this->finalFileDirectiory = $finalFileDirectiory;
    }

    public function getFinalFileName()
    {
        return $this->finalFileName;
    }

    public function setFinalFileName($finalFileName)
    {
        $this->finalFileName = $finalFileName;
    }

    protected function checkDirectory($fileDirectory)
    {
        if (!file_exists($fileDirectory)) {
            mkdir($fileDirectory, 0755, true);
        }
    }

    public function getFileAddress()
    {
        return $this->getFinalFileDirectiory() . DIRECTORY_SEPARATOR . $this->getFinalFileName();
    }

    protected function provider()
    {

        //set properties
        $this->getFileDirectory() ?? $this->setFileDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getFileName() ?? $this->setFileName(time());
        $this->setFileFormat(pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION));

        //set final File directory 
        $finalFileDirectory = empty($this->getExclusiveDirectory()) ? $this->getFileDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getFileDirectory();
        $this->setFinalFileDirectiory($finalFileDirectory);

        //set final File name
        $this->setFinalFileName($this->getFileName() . '.' . $this->getFileFormat());

        //check and creawte final File directory
        $this->checkDirectory($this->getFinalFileDirectiory());

    }

}

?>