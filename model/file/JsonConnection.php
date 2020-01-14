<?php


class JsonConnection
{
    public $path;
    public function __construct($path)
    {
        $this->path = $path;
    }
    public function readFile()
    {
        $dataJson = file_get_contents($this->path);
        return json_decode($dataJson, true);
    }
    public function saveDataToFile($object)
    {
        $data = json_encode($object);
        file_put_contents($this->path, $data);
    }

}